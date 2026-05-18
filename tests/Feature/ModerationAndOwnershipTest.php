<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Tip;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModerationAndOwnershipTest extends TestCase
{
    use RefreshDatabase;

    public function test_expert_can_delete_own_tip(): void
    {
        $expert = User::factory()->create(['role' => 'expert', 'is_validated' => true]);
        $tip = Tip::create([
            'user_id' => $expert->id,
            'title' => 'My Tip',
            'content' => 'Tip Content',
            'location_tag' => 'indoor'
        ]);

        $response = $this->actingAs($expert)->delete(route('expert.tips.destroy', $tip));

        $response->assertRedirect(route('expert.dashboard'));
        $this->assertDatabaseMissing('tips', ['id' => $tip->id]);
    }

    public function test_expert_cannot_delete_other_expert_tip(): void
    {
        $expert1 = User::factory()->create(['role' => 'expert', 'is_validated' => true]);
        $expert2 = User::factory()->create(['role' => 'expert', 'is_validated' => true]);
        $tip = Tip::create([
            'user_id' => $expert1->id,
            'title' => 'Expert 1 Tip',
            'content' => 'Content',
            'location_tag' => 'indoor'
        ]);

        $response = $this->actingAs($expert2)->delete(route('expert.tips.destroy', $tip));

        $response->assertStatus(403);
        $this->assertDatabaseHas('tips', ['id' => $tip->id]);
    }

    public function test_provider_can_delete_own_service(): void
    {
        $provider = User::factory()->create(['role' => 'provider', 'is_validated' => true]);
        $service = Service::create([
            'user_id' => $provider->id,
            'title' => 'My Service',
            'description' => 'Description',
            'price' => '100',
            'contact_email' => 'provider@example.com'
        ]);

        $response = $this->actingAs($provider)->delete(route('provider.services.destroy', $service));

        $response->assertRedirect(route('provider.dashboard'));
        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }

    public function test_provider_cannot_delete_other_provider_service(): void
    {
        $provider1 = User::factory()->create(['role' => 'provider', 'is_validated' => true]);
        $provider2 = User::factory()->create(['role' => 'provider', 'is_validated' => true]);
        $service = Service::create([
            'user_id' => $provider1->id,
            'title' => 'Provider 1 Service',
            'description' => 'Description',
            'price' => '100',
            'contact_email' => 'provider1@example.com'
        ]);

        $response = $this->actingAs($provider2)->delete(route('provider.services.destroy', $service));

        $response->assertStatus(403);
        $this->assertDatabaseHas('services', ['id' => $service->id]);
    }

    public function test_admin_can_delete_any_tip(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $expert = User::factory()->create(['role' => 'expert', 'is_validated' => true]);
        $tip = Tip::create([
            'user_id' => $expert->id,
            'title' => 'Expert Tip',
            'content' => 'Content',
            'location_tag' => 'indoor'
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.tips.destroy', $tip));

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseMissing('tips', ['id' => $tip->id]);
    }

    public function test_admin_can_delete_any_service(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $provider = User::factory()->create(['role' => 'provider', 'is_validated' => true]);
        $service = Service::create([
            'user_id' => $provider->id,
            'title' => 'Provider Service',
            'description' => 'Description',
            'price' => '100',
            'contact_email' => 'provider@example.com'
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.services.destroy', $service));

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }

    public function test_user_cannot_delete_tips_or_services(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $expert = User::factory()->create(['role' => 'expert', 'is_validated' => true]);
        $tip = Tip::create([
            'user_id' => $expert->id,
            'title' => 'Expert Tip',
            'content' => 'Content',
            'location_tag' => 'indoor'
        ]);

        $provider = User::factory()->create(['role' => 'provider', 'is_validated' => true]);
        $service = Service::create([
            'user_id' => $provider->id,
            'title' => 'Provider Service',
            'description' => 'Description',
            'price' => '100',
            'contact_email' => 'provider@example.com'
        ]);

        // Attempting to delete expert tip as normal user
        $response1 = $this->actingAs($user)->delete(route('expert.tips.destroy', $tip));
        $response1->assertStatus(403);

        // Attempting to delete service as normal user
        $response2 = $this->actingAs($user)->delete(route('provider.services.destroy', $service));
        $response2->assertStatus(403);

        // Attempting admin tip delete as normal user
        $response3 = $this->actingAs($user)->delete(route('admin.tips.destroy', $tip));
        $response3->assertStatus(403);

        // Attempting admin service delete as normal user
        $response4 = $this->actingAs($user)->delete(route('admin.services.destroy', $service));
        $response4->assertStatus(403);
    }
}
