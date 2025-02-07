<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Log;

class AuthenticationEventListener
{
    public function handle(Authenticated $event)
    {
        Log::info('Authenticated user (event listener):', $event->user->toArray());
    }
}