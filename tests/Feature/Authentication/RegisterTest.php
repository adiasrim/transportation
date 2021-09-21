<?php

namespace Tests\Feature\Authentication;

use App\Models\User;
use Arr;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_register_user()
    {
        $data = [
            'name' => 'Mirik',
            'email' => 'mirik@gmail.com',
            'password' => '123123'
        ];

        $this->postJson(route('auth.register', $data))
            ->assertCreated();

        $this->assertCredentials(Arr::only($data, ['email', 'password']));
    }
}
