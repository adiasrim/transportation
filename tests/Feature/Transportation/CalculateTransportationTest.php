<?php

namespace Tests\Feature\Transportation;

use App\Models\Transportation;
use Http;
use Tests\TestCase;

class CalculateTransportationTest extends TestCase
{
    public function test_calculate_transportation()
    {
        $transportation = Transportation::first();

        $this->getJson(route('transportation.show', $transportation))
            ->assertOk();
    }
}
