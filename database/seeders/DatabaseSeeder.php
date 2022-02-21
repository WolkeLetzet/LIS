<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        Role::create(['name'=>'admin']);
        $admin=User::create([
            'name'=>'Claudio',
            'email'=>'claudio@mail.com',
            'password'=>Hash::make('123456789'),
        ]);
        $admin->assignRole('admin');
        \App\Models\Article::factory(40)->has(\App\Models\File::factory()->count(rand(1,4)))->create();
        
    }
}
