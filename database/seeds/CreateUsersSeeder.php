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
                'jabatan' => 'Kasir',
            ],
            [
                'nama' => 'Manager',
                'telp' => '087763123321',
                'username' => 'manager',
                'password' => bcrypt('manager'),
                'jabatan' => 'Manager',
            ],
            [
                'nama' => 'Dapur',
                'telp' => '087763321321',
                'username' => 'dapur',
                'password' => bcrypt('dapur'),
                'jabatan' => 'Dapur',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
