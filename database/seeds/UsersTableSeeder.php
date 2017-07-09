<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();

        User::insert($users->toArray());

        $user = User::find(1);
        $user->name = 'snail';
        $user->email = 'my24251325@gmail.com';
        $user->password = bcrypt('asdasd');
        $user->is_admin = true;
        $user->activated = true;
        $user->save();
    }
}
