<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
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
                    'name' => 'admin',
                ],
                [
                    'id' => 2,
                    'name' => 'user',
                ],
            ];

            DB::transaction(function () use($data) {
                foreach($data as $item) {
                    Role::updateOrCreate(['id' => $item['id']], $item);
                }
            });
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
