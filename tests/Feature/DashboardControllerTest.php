<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    public function testIndex()
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'TestUSer';
        $response = $this->be($user)->get(route('dashboard'));
        $response->assertStatus(200);
    }
}
