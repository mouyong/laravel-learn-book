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

        // 生成假数据时，禁用隐藏字段
        (new User)->setHidden([]);
        User::insert($users->toArray());

        $user = User::find(1);
        $user->name = 'test';
        $user->email = 'asd@asd.com';
        $user->password = bcrypt('asdasd');
        $user->is_admin = true;
        $user->activated = true;
        $user->save();
    }
}
