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

        // if ($user->isAdmin() && !$search) {
        //     // apply status filtering
        //     $this->applyStatusFilter($query, $user->isAdmin(), $requestedStatus);
        // }

        // if (!$user->isAdmin()) {
        //     // apply status filtering
        //     $this->applyStatusFilter($query, $user->isAdmin(), $requestedStatus);
        // }

        if (!($search && $column === 'order')) {
            if ($user->isAdmin() && !$search) {
                $this->applyStatusFilter($query, true, $requestedStatus);
            }

            if (!$user->isAdmin()) {
                $this->applyStatusFilter($query, false, $requestedStatus);
            }
        }
        
        // apply search
        if ($search) {
            $this->applySearchFilter($query, $search, $column);
        }
        
        $quotes = $query->paginate(20)->withQueryString();
        $statusToChange = Quote::changeStatus($requestedStatus);

        return compact('quotes', 'statusToChange');
    }

    private function applyStatusFilter(Builder $query, bool $isAdmin, string $requestedStatus): void
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if ($isAdmin) {
            // dd($query->where('id', 'like', "%74038%")->get()->toArray());
            $query->where('status', $requestedStatus);
            return;
        }

        $allowedPermissions = $user->allPermissions()
            ->filter(fn($perm) => str_starts_with($perm->slug, 'view-quotes-'))
            ->pluck('slug')
            ->toArray();

        // $allowedStatuses = collect($allowedPermissions)
        //     ->map(fn($slug) => Str::title(str_replace('view-quotes-', '', $slug)))
        //     ->toArray();

        $allowedStatuses = collect($allowedPermissions)
            ->map(fn($slug) => Str::title(str_replace('-', ' ', str_replace('view-quotes-', '', $slug))))
            ->toArray();

        if (empty($allowedStatuses)) {
            $query->whereRaw('0=1');
            return;
        }

        $query->whereIn('status', $allowedStatuses);

        if (in_array($requestedStatus, $allowedStatuses)) {
            $query->where('status', $requestedStatus);
        } else {
            $query->whereRaw('0=1');
        }

        // dd($allowedPermissions, $allowedStatuses);
    }

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
                    $normalizedSearch = preg_replace('/\D+/', '', $search);
                    $q->whereRaw("REPLACE(REPLACE(REPLACE(REPLACE(customer_phone, ' ', ''), '-', ''), '(', ''), ')', '') LIKE ?", ["%$normalizedSearch%"]);
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
                    $q->where('id', 'like', "%{$search}%")
                        ->orWhere('customer_name', 'like', "%{$search}%")
                        ->orWhere('customer_email', 'like', "%{$search}%")
                        ->orWhere('customer_phone', 'like', "%{$search}%")
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
        
        if (Auth::user()->email == 'Huzaifa@gmail.com') {
            dd($query->get()->toArray(), $search, $column);
            // dd($query->where('id', 'like', "%{$search}%")->get()->toArray());
        }
    }
}
