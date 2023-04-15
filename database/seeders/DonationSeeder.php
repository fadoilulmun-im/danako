<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
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
                    'campaign_id' => 1,
                    'amount_donations' => 15000.00,
                    'hope' => 'Semoga cepat pulih',
                ]
            ];

            DB::transaction(function () use($data) {
                foreach($data as $item) {
                    Donation::updateOrCreate(['id' => $item['id']], [
                        'user_id' => $item['user_id'],
                        'campaign_id' => $item['campaign_id'],
                        'amount_donations' => $item['amount_donations'],
                        'hope' => $item['hope'],
                    ]);
                }
            });
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
