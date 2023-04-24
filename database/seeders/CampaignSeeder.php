<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
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
                    'user_id' => 1,
                    'category_id' => 1,
                    'title' => 'Merapi Erupsi',
                    'description' => 'Kawasan magelang turut terdampak letusan gunung merapi',
                    'target_amount' => 500000.00,
                    'slug' => 'sajsffjafk',
                    'img_path' => 'zfkgjdgsgad',
                    'receiver' => 'Pak Yahya',
                    'purpose' => 'Membeli kebutuhan pokok ditempat pengungsian',
                    'address_receiver' => 'jalan durian runtuh, magelang',
                    'detail_usage_of_funds' => 'membeli sembako Rp 5.000.000',
                    'start_date' => '2023-04-01',
                    'end_date' => '2023-05-01',
                ]
            ];

            DB::transaction(function () use($data) {
                foreach($data as $item) {
                    Campaign::updateOrCreate(['id' => $item['id']], [
                        'user_id' => $item['user_id'],
                        'category_id' => $item['category_id'],
                        'title' => $item['title'],
                        'description' => $item['description'],
                        'target_amount' => $item['target_amount'],
                        'slug' => $item['slug'],
                        'img_path' => $item['img_path'],
                        'receiver' => $item['receiver'],
                        'purpose' => $item['purpose'],
                        'address_receiver' => $item['address_receiver'],
                        'detail_usage_of_funds' => $item['detail_usage_of_funds'],
                        'start_date' => $item['start_date'],
                        'end_date' => $item['end_date'],
                    ]);
                }
            });
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
