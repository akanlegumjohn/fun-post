<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the home page renders successfully.
     */
    public function test_user_can_view_home_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Welcome back');
    }

    /**
     * Test submitting a new joke stores it in the database and redirects.
     */
    public function test_user_can_create_post_in_database(): void
    {
        $response = $this->post('/posts', [
            'title' => 'Why dark mode?',
            'content' => 'Because light attracts bugs!',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Post created successfully!');

        $this->assertDatabaseHas('posts', [
            'title' => 'Why dark mode?',
            'content' => 'Because light attracts bugs!',
            'post_owner' => 'System Admin',
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
