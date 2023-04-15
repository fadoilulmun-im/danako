<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $data = [
                [
                    'id' => 1,
                    'role_id' => 1,
                    'name' => 'Admin',
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => '123456',
                ]
            ];

            DB::transaction(function () use($data) {
                foreach($data as $item) {
                    User::updateOrCreate(['id' => $item['id']], [
                        'role_id' => $item['role_id'],
                        'name' => $item['name'],
                        'username' => $item['username'],
                        'email' => $item['email'],
                        'password' => bcrypt($item['password']),
                    ]);
                }
            });
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
