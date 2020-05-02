<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama' => 'Kasir',
                'telp' => '081234567890',
                'username' => 'kasir',
                'password' => bcrypt('kasir'),
                'is_kasir' => '1',
            ],
            [
                'nama' => 'User',
                'telp' => '087763123321',
                'username' => 'manager',
                'password' => bcrypt('manager'),
                'is_kasir' => '0',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
