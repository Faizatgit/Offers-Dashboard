<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferApiController extends Controller
{
    public function index(Request $request)
    {
        $apiKey = $request->header('X-API-KEY');

        if ($apiKey !== env('API_KEY')) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }

        $offers = Offer::where('active', 1)
            ->where('expiry_date', '>=', now()->toDateString())
            ->latest()
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $offers
        ]);
    }
}
