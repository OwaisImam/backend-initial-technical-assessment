<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{GuestbookEntry, User};
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $userB = User::create([
            'email'        => 'user-a@example.com',
            'password'     => Hash::make('user-a'),
            'display_name' => 'RocketMan',
            'real_name'    => 'Melon Dusk',
        ]);

        $userA = User::create([
            'email'        => 'user-b@example.com',
            'password'     => Hash::make('user-b'),
            'display_name' => 'TheBez',
            'real_name'    => 'Beff Jezos',
        ]);

        GuestbookEntry::create([
            'title'                  => 'This is really amazing',
            'content'                => 'Much better than Amazon',
            'user_id' => $userA->id
        ]);

        GuestbookEntry::create([
            'title'                  => 'Wow.',
            'content'                => 'This is so great that it sends me to space',
            'user_id' => $userB->id
        ]);
    }
}