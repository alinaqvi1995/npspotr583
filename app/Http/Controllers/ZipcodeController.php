<?php

namespace App\Http\Controllers;

use App\Models\Zipcode;
use Illuminate\Http\Request;

class ZipcodeController extends Controller
{
    public function searchByZipcode(Request $request)
    {
        $query = $request->input('q');
        $results = Zipcode::where('zipcode', 'like', "%{$query}%")
            ->limit(10)
            ->get(['zipcode', 'city', 'state']);

        return response()->json($this->formatResults($results));
    }

    public function searchByCity(Request $request)
    {
        $query = $request->input('q');
        $results = Zipcode::where('city', 'like', "%{$query}%")
            ->limit(10)
            ->get(['zipcode', 'city', 'state']);

        return response()->json($this->formatResults($results));
    }

    public function searchByState(Request $request)
    {
        $query = $request->input('q');
        $results = Zipcode::where('state', 'like', "%{$query}%")
            ->orWhere('statefull', 'like', "%{$query}%")
            ->limit(10)
            ->get(['zipcode', 'city', 'state']);

        return response()->json($this->formatResults($results));
    }

    public function searchByLocation(Request $request)
    {
        $query = $request->input('q');
        $results = Zipcode::where('zipcode', 'like', "%{$query}%")
            ->orWhere('city', 'like', "%{$query}%")
            ->orWhere('state', 'like', "%{$query}%")
            ->limit(10)
            ->distinct()
            ->get(['zipcode', 'city', 'state']);

        return response()->json($this->formatResults($results));
    }

    private function formatResults($results)
    {
        return $results->map(function ($item) {
            $label = "{$item->city}, {$item->state}, {$item->zipcode}";
            return [
                'label' => $label,
                'value' => $label,
                'city'  => $item->city,
                'state' => $item->state,
                'zip'   => $item->zipcode,
            ];
        });
    }
}
