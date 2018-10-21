<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_vendor = Role::where('name', 'vendor')->first();
        $role_client = Role::where('name', 'client')->first();

        $user = new User();
        $user->name = 'Administrator';
        $user->email = 'admin@email.com';
        $user->password = bcrypt('123456');
        $user->role_id = $role_admin->id;
        $user->save();

        $user = new User();
        $user->name = 'Vendor';
        $user->email = 'vendor@email.com';
        $user->password = bcrypt('123456');
        $user->role_id = $role_vendor->id;
        $user->save();
        for ($i = 0; $i < 10; $i++) {
            $user->products()->save(factory(App\Product::class)->make());
        }

        $user = new User();
        $user->name = 'Client';
        $user->email = 'client@email.com';
        $user->password = bcrypt('123456');
        $user->role_id = $role_client->id;
        $user->save();
    }
}
