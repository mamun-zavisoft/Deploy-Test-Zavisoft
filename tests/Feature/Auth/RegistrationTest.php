<?php

use App\Models\User;

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    // FIX: user should be logged in after registration
    $this->assertAuthenticated();

    $response->assertRedirect(route('dashboard', false));
});
