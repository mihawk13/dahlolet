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
                'nama' => 'Admin',
                'telp' => '087763123321',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'jabatan' => 'Admin',
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
