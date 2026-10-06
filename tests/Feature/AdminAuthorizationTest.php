<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_jamaah_cannot_open_package_management(): void
    {
        $user = User::factory()->create(['role' => 'jamaah']);

        $this->actingAs($user)
            ->get(route('admin.packages'))
            ->assertForbidden();
    }

    public function test_admin_can_open_package_management(): void
    {
        $admin = User::factory()->unverified()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get(route('admin.packages'))
            ->assertOk();
    }
}
