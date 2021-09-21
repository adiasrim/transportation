<?php

namespace Tests\Feature\Authentication;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_login_user()
    {
        $this->postJson(route('auth.login'), [
            'name'     => 'Mirsaid Akhmedov',
            'email'    => 'akhmedovmirik@gmail.com',
            'password' => '123123'
        ])->assertOk();

        $this->assertAuthenticatedAs(User::first());
    }
}
