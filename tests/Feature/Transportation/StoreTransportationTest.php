<?php

namespace Tests\Feature\Transportation;

use App\Models\Transportation;
use Tests\TestCase;

class StoreTransportationTest extends TestCase
{
    public function test_store_transportation()
    {
        $data = [
            'latitude'  => 1,
            'longitude' => 2,
            'mass'      => 5
        ];
        $this->postJson(route('transportation.store'), $data)->assertCreated();

        $this->assertDatabaseCount('transportations', 1);
    }
}
