<?php

namespace App\Services;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class QuoteService
{
    public function getQuotes(string $status, ?string $search = null, ?string $column = null)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        $requestedStatus = Str::title(str_replace('-', ' ', $status));

        $query = Quote::with(['vehicles.images', 'pickupLocation', 'deliveryLocation'])
            ->orderBy('created_at', 'desc');

        // -------------------------------------------------------
        // ADMIN LOGIC
        // -------------------------------------------------------
        if ($user->isAdmin()) {

            // Admin = no restrictions except the "status page" when not searching
            if (!$search) {
                $query->where('status', $requestedStatus);
            }

        } else {

            // ---------------------------------------------------
            // NON-ADMIN LOGIC
            // ---------------------------------------------------

            if ($search) {

                // On search: allow ALL statuses the user is permitted to see
                $allowedStatuses = $this->getAllowedStatuses($user);

                // Debug: What statuses user can access
                logger()->info("User allowed statuses (search mode):", $allowedStatuses);

                if (empty($allowedStatuses)) {
                    $query->whereRaw('0=1');
                } else {
                    $query->whereIn('status', $allowedStatuses);
                }

            } else {

                // No search: strictly follow page status (e.g. /quotes/in-progress)
                $this->applyStatusFilter($query, $requestedStatus);
            }
        }

        // -------------------------------------------------------
        // SEARCH FILTER
        // -------------------------------------------------------
        if ($search) {
            $this->applySearchFilter($query, $search, $column);
        }

        // -------------------------------------------------------
        // FINAL RESULTS
        // -------------------------------------------------------
        $quotes = $query->paginate(20)->withQueryString();
        $statusToChange = Quote::changeStatus($requestedStatus);

        return compact('quotes', 'statusToChange');
    }


    // ===============================================================
    // STATUS FILTER FOR NON-ADMIN NORMAL PAGE VIEW (NO SEARCH)
    // ===============================================================
    private function applyStatusFilter(Builder $query, string $requestedStatus): void
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        $allowedStatuses = $this->getAllowedStatuses($user);

        // Debug logs:
        logger()->info("Allowed statuses for user:", $allowedStatuses);
        logger()->info("Requested status:", [$requestedStatus]);

        // No permissions → empty result
        if (empty($allowedStatuses)) {
            $query->whereRaw('0=1');
            return;
        }

        // User trying to access a status page they are NOT allowed to see
        if (!in_array($requestedStatus, $allowedStatuses)) {
            $query->whereRaw('0=1');
            return;
        }

        // OK → Apply page status
        $query->where('status', $requestedStatus);
    }


    // ===============================================================
    // GET ALLOWED STATUSES FROM PERMISSIONS
    // ===============================================================
    private function getAllowedStatuses($user): array
    {
        $allowedPermissions = $user->allPermissions()
            ->filter(fn($perm) => str_starts_with($perm->slug, 'view-quotes-'))
            ->pluck('slug')
            ->toArray();

        // Debug: show raw permission slugs
        logger()->info("User permission slugs:", $allowedPermissions);

        $statuses = collect($allowedPermissions)
            ->map(function ($slug) {
                $clean = str_replace('view-quotes-', '', $slug);
                $clean = str_replace('-', ' ', $clean);
                return Str::title($clean);
            })
            ->toArray();

        // Debug: converted statuses
        logger()->info("Converted allowed quote statuses:", $statuses);

        return $statuses;
    }


    // ===============================================================
    // SEARCH FILTER
    // ===============================================================
    private function applySearchFilter(Builder $query, string $search, ?string $column): void
    {
        $query->where(function ($q) use ($search, $column) {

            switch ($column) {

                case 'order':
                    $q->where('id', 'like', "%{$search}%");
                    break;

                case 'customer':
                    $q->where('customer_name', 'like', "%{$search}%")
                        ->orWhere('customer_email', 'like', "%{$search}%");
                    break;

                case 'customer_phone':
                    $normalized = preg_replace('/\D+/', '', $search);
                    $q->whereRaw(
                        "REPLACE(REPLACE(REPLACE(REPLACE(customer_phone,' ',''),'-',''),'(',''),')','') LIKE ?",
                        ["%$normalized%"]
                    );
                    break;

                case 'vehicles':
                    $q->whereHas('vehicles', function ($v) use ($search) {
                        $v->where('make', 'like', "%{$search}%")
                            ->orWhere('model', 'like', "%{$search}%")
                            ->orWhere('year', 'like', "%{$search}%");
                    });
                    break;

                case 'pickup':
                    $q->whereHas('pickupLocation', function ($loc) use ($search) {
                        $loc->where('city', 'like', "%{$search}%")
                            ->orWhere('state', 'like', "%{$search}%")
                            ->orWhere('zip', 'like', "%{$search}%");
                    });
                    break;

                case 'delivery':
                    $q->whereHas('deliveryLocation', function ($loc) use ($search) {
                        $loc->where('city', 'like', "%{$search}%")
                            ->orWhere('state', 'like', "%{$search}%")
                            ->orWhere('zip', 'like', "%{$search}%");
                    });
                    break;

                default:
                    $normalized = preg_replace('/\D+/', '', $search);

                    $q->where('id', 'like', "%{$search}%")
                        ->orWhere('customer_name', 'like', "%{$search}%")
                        ->orWhere('customer_email', 'like', "%{$search}%")
                        ->orWhereRaw(
                            "REPLACE(REPLACE(REPLACE(REPLACE(customer_phone,' ',''),'-',''),'(',''),')','') LIKE ?",
                            ["%$normalized%"]
                        )
                        ->orWhereHas('vehicles', function ($v) use ($search) {
                            $v->where('make', 'like', "%{$search}%")
                                ->orWhere('model', 'like', "%{$search}%")
                                ->orWhere('year', 'like', "%{$search}%");
                        })
                        ->orWhereHas('pickupLocation', function ($loc) use ($search) {
                            $loc->where('city', 'like', "%{$search}%")
                                ->orWhere('state', 'like', "%{$search}%")
                                ->orWhere('zip', 'like', "%{$search}%");
                        })
                        ->orWhereHas('deliveryLocation', function ($loc) use ($search) {
                            $loc->where('city', 'like', "%{$search}%")
                                ->orWhere('state', 'like', "%{$search}%")
                                ->orWhere('zip', 'like', "%{$search}%");
                        });
            }
        });
    }
}
