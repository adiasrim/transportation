<?php

namespace Tests\Feature\Transportation;

use App\Models\Transportation;
use Tests\TestCase;

class StoreTransportationTest extends TestCase
{
    public function test_store_transportation()
    {
        $data = [
            'origins'  => 'New York',
            'destinations' => 'Chicago',
            'mass'      => '500'
        ];
        $this->postJson(route('transportation.store'), $data)->assertCreated();

        $this->assertDatabaseHas('transportations', $data);
    }
}
