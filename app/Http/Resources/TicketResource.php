<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $flight_list = [];
        foreach ($this->resource[0]->data->flightList->departure as $flight) {
            $flight_list[] = [
                'id' => $flight->id,
                'availableSeats' => $flight->availableSeats,
                'departureDatetime' => $flight->departureDatetime,
                'arrivalDatetime' => $flight->arrivalDatetime,
                'departureAirport' => $flight->departureAirport,
                'arrivalAirport' => $flight->arrivalAirport,
                'duration' => $flight->duration,
                'fares' => $flight->fares,
                'baggageInfo' => $flight->baggageInfo,
                'viewPrice' => $flight->viewPrice,
                'viewBaggage' => $flight->viewBaggage,
            ];
        }
        return $flight_list;
        // return [
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ];
        return parent::toArray($this->resource);
    }
}
