<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run() {
        $role = Role::where('name', 'super-admin')->firstOrFail();
        $moderatorRole = Role::where('name', 'moderator')->firstOrFail();
        $developerRole = Role::where('name', 'developer')->firstOrFail();

        User::create([
            'name'           => 'Super Admin',
            'email'          => 'super-admin@admin.com',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
            'role_id'        => $role->id,
        ]);

        User::create([
            'name'           => 'Moderator',
            'email'          => 'moderator@admin.com',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
            'role_id'        => $moderatorRole->id,
        ]);

        User::create([
            'name'           => 'Developer',
            'email'          => 'developer@admin.com',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
            'role_id'        => $developerRole->id,
        ]);
    }
}
