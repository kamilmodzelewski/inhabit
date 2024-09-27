<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\ShortUrl;
use Tests\TestCase;

class UrlShortenerTest extends TestCase
{
    public function testShortenUrlFailed()
    {
        $response = $this->post('/api/shorten', ['original_url' => 'https://googleblablabla.com']);
        $response->assertStatus(302); // 302 is the status code for redirection cause of failed validation
    }

    public function testShortenUrlSuccess()
    {
        $response = $this->post('/api/shorten', ['original_url' => 'https://google.com']);
        $response->assertStatus(200);
        $this->assertDatabaseHas(ShortUrl::class, ['original_url' => 'https://google.com']);
    }
}
