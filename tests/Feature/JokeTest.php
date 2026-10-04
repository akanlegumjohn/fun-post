<?php

namespace Tests\Feature;

use App\Models\Joke;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JokeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the home page renders jokes list successfully.
     */
    public function test_user_can_view_home_page(): void
    {
        Joke::create([
            'title' => 'Why Java developers wear glasses?',
            'content' => 'Because they do not C#!',
            'joke_owner' => 'System Admin',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Welcome back');
        $response->assertSee('Why Java developers wear glasses?');
    }

    /**
     * Test submitting a new joke stores it in the database and redirects.
     */
    public function test_user_can_create_joke_in_database(): void
    {
        $response = $this->post('/jokes', [
            'title' => 'Why dark mode?',
            'content' => 'Because light attracts bugs!',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Joke created successfully!');

        $this->assertDatabaseHas('jokes', [
            'title' => 'Why dark mode?',
            'content' => 'Because light attracts bugs!',
            'joke_owner' => 'System Admin',
        ]);
    }

    /**
     * Test user can view a single joke details page.
     */
    public function test_user_can_view_single_joke(): void
    {
        $joke = Joke::create([
            'title' => 'Hardware definition',
            'content' => 'The part of a computer you can kick.',
            'joke_owner' => 'System Admin',
        ]);

        $response = $this->get('/jokes/'.$joke->id);

        $response->assertStatus(200);
        $response->assertSee('Hardware definition');
        $response->assertSee('The part of a computer you can kick.');
    }

    /**
     * Test user can view the edit joke form page.
     */
    public function test_user_can_view_edit_joke_page(): void
    {
        $joke = Joke::create([
            'title' => 'Recursion joke',
            'content' => 'To understand recursion, you must first understand recursion.',
            'joke_owner' => 'System Admin',
        ]);

        $response = $this->get('/jokes/'.$joke->id.'/edit');

        $response->assertStatus(200);
        $response->assertSee('Edit Joke');
        $response->assertSee('Recursion joke');
        $response->assertSee('To understand recursion, you must first understand recursion.');
    }

    /**
     * Test user can update a joke in the database via PUT.
     */
    public function test_user_can_update_joke_in_database(): void
    {
        $joke = Joke::create([
            'title' => 'Initial Title',
            'content' => 'Initial Content',
            'joke_owner' => 'System Admin',
        ]);

        $response = $this->put('/jokes/'.$joke->id, [
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ]);

        $response->assertRedirect('/jokes/'.$joke->id);
        $response->assertSessionHas('success', 'Joke updated successfully!');

        $this->assertDatabaseHas('jokes', [
            'id' => $joke->id,
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ]);
    }

    /**
     * Test user can delete a joke from the database via DELETE.
     */
    public function test_user_can_delete_joke_from_database(): void
    {
        $joke = Joke::create([
            'title' => 'To be deleted',
            'content' => 'Delete me please',
            'joke_owner' => 'System Admin',
        ]);

        $response = $this->delete('/jokes/'.$joke->id);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Joke deleted successfully!');

        $this->assertDatabaseMissing('jokes', [
            'id' => $joke->id,
        ]);
    }

    /**
     * Test the FAQ page is accessible.
     */
    public function test_user_can_view_faq_page(): void
    {
        $response = $this->get('/faq');

        $response->assertStatus(200);
        $response->assertSee('Frequently Asked Questions');
    }
}
