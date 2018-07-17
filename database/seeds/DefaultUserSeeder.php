<?php

use Illuminate\Database\Seeder;
use App\User;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            (new User([
                'email' => 'admin@gmail.com',
                'password' => bcrypt('asdasd'),
                'name' => 'Default user',
            ]))->save();
        }
    }
}
