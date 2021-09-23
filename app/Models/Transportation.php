<?php

namespace App\Models;

use Http;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;

    const KG_KM = 10; // ruble

    protected static $unguarded = true;

    protected $casts = [
        'mass' => 'integer'
    ];

    /**
     * Return cost of transportation
     *
     * @return float
     */
    public function calculate(): float
    {
        $distance_in_meter = $distance = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'key'          => 'AIzaSyDxczA6T86uhMRV4W30sLOwZd78-2Hmodw',
            'origins'      => $this->origins,
            'destinations' => $this->destinations,
        ])->json('rows.0.elements.0.distance.value');

        return $this->mass / ($distance_in_meter / 1000) * self::KG_KM;
    }
}
