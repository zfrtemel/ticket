<?php

namespace App\Http\Controllers;

use App\Http\Classes\RequestAPI;
use App\Http\Requests\FlightTicketRequest;
use App\Http\Resources\TicketResource;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use http\Message\Body;

class TicketController extends Controller
{

    function ticket(FlightTicketRequest $request)
    {
        // Extract the passengers data
        $passengers = $request->input('passengers');
        $adt = $passengers['ADT'];
        $chd = $passengers['CHD'] ?? 0;
        $inf = $passengers['INF'] ?? 0;
        // Check if the total number of passengers is valid
        if ($adt + $chd > 7) {
            return response()->json([
                'error' => 'The total number of ADT and CHD passengers cannot be more than 7.'
            ], 422);
        }
        if ($inf > $adt) {
            return response()->json([
                'error' => 'The number of INF passengers cannot be more than the number of ADT passengers.'
            ], 422);
        }


        $request_api = app(RequestAPI::class);
        return new TicketResource([
            json_decode($request_api->request('POST', env('REQUEST_API_URI'), [
                'origin' => $request->input('origin'),
                'destination' => $request->input('destination'),
                'departure_date' => $request->input('departure_date'),
                'return_date' => $request->input('return_date'),
                'passengers[ADT]' => 1,
            ]))
            //   ,... buraya devamı eklenebilir  
        ], 200);
    }
}
