<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        $profiles = [
            [
                'user_id' => 1,
                'postcode' => '100-0001',
                'address' => '東京都千代田区千代田1-1',
                'building' => '皇居マンション101',
                'icon' => null,
            ],
            [
                'user_id' => 2,
                'postcode' => '150-0001',
                'address' => '東京都渋谷区渋谷2-2-2',
                'building' => '渋谷タワー202',
                'icon' => null,
            ],
            [
                'user_id' => 3,
                'postcode' => '530-0001',
                'address' => '大阪府大阪市北区梅田3-3-3',
                'building' => '梅田レジデンス303',
                'icon' => null,
            ],
        ];

        foreach ($profiles as $profile) {
            Profile::create($profile);
        }
    }
}
