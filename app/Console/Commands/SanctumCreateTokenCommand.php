<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SanctumCreateTokenCommand extends Command
{
    protected $signature = 'sanctum:create-token';

    protected $description = 'Command description';

    public function handle(): void
    {
        $user = User::first();

        if (! $user){
            $this->error('No user found! Please seed database.');
            return;
        }

        $token = $user->createToken('pokemon');

        $this->info("Your new token is: {$token->plainTextToken}");
    }
}
