<?php

namespace Database\Seeders;

use App\Models\CampaignCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CampaignCategorySeeder extends Seeder
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
                    'name' => 'Bencana alam',
                ]
            ];

            DB::transaction(function () use($data) {
                foreach($data as $item) {
                    CampaignCategory::updateOrCreate(['id' => $item['id']], [
                        'name' => $item['name'],
                    ]);
                }
            });
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
