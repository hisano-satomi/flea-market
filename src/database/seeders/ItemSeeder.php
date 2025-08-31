<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'user_id' => 1,
                'img' => 'sample1.jpg',
                'condition_id' => 1,
                'itemcategory_id' => 1,
                'name' => 'ダミー時計',
                'brand' => 'DummyBrand',
                'description' => '高級ダミー時計です。',
                'price' => 12000,
            ],
            [
                'user_id' => 1,
                'img' => 'sample2.jpg',
                'condition_id' => 2,
                'itemcategory_id' => 2,
                'name' => 'ダミーバッグ',
                'brand' => 'DummyBagCo',
                'description' => 'おしゃれなダミーバッグ。',
                'price' => 8000,
            ],
            [
                'user_id' => 2,
                'img' => 'sample3.jpg',
                'condition_id' => 1,
                'itemcategory_id' => 3,
                'name' => 'ダミーシューズ',
                'brand' => 'DummyShoes',
                'description' => '履き心地抜群のダミーシューズ。',
                'price' => 5000,
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
