<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostTest extends TestCase
{
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
     * Test submitting a new joke stores it in session and redirects.
     */
    public function test_user_can_submit_joke_to_session(): void
    {
        $response = $this->post('/posts', [
            'title' => 'Why dark mode?',
            'content' => 'Because light attracts bugs!',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Post created successfully!');
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
