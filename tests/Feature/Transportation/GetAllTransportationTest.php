<?php

namespace Tests\Feature\Transportation;

use App\Models\Transportation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAllTransportationTest extends TestCase
{
    public function test_get_all_transportations()
    {
        $this->getJson(route('transportation.index'))
            ->assertOk();
    }
}
