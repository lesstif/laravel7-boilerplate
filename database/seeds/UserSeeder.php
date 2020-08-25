<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'super user1',
                'email' => 'lesstif@gmail.com',
            ],
            [
                'name' => 'super user2',
                'email' => 'root@example.com',
            ],
        ];

        foreach ($admins as $admin) {
            $admin['password'] = bcrypt('password');
            $admin['remember_token'] = Str::random(10);

            $u = User::create($admin);
            $u->assignRole(\App\Helpers\RoleNameConstant::$ROLE_SUPER_ADMIN);
        }


        factory(User::class, 37)->create();
    }
}
