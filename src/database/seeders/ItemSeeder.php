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
                'img' => 'items/Armani+Mens+Clock.jpg',
                'condition_id' => 1,
                'name' => '腕時計',
                'brand' => 'Rolax',
                'description' => 'スタイリッシュなデザインのメンズ腕時計',
                'price' => 15000,
            ],
            [
                'user_id' => 1,
                'img' => 'items/HDD+Hard+Disk.jpg',
                'condition_id' => 2,
                'name' => 'HDD',
                'brand' => '西芝',
                'description' => '高速で信頼性の高いハードディスク',
                'price' => 5000,
            ],
            [
                'user_id' => 1,
                'img' => 'items/iLoveIMG+d.jpg',
                'condition_id' => 3,
                'name' => '玉ねぎ3束',
                'brand' => 'なし',
                'description' => '新鮮な玉ねぎ3束のセット',
                'price' => 300,
            ],
            [
                'user_id' => 1,
                'img' => 'items/Leather+Shoes+Product+Photo.jpg',
                'condition_id' => 4,
                'name' => '革靴',
                'brand' => '',
                'description' => 'クラシックなデザインの革靴',
                'price' => 4000,
            ],
            [
                'user_id' => 1,
                'img' => 'items/Living+Room+Laptop.jpg',
                'condition_id' => 1,
                'name' => 'ノートPC',
                'brand' => '',
                'description' => '高性能なノートパソコン',
                'price' => 45000,
            ],
            [
                'user_id' => 1,
                'img' => 'items/Music+Mic+4632231.jpg',
                'condition_id' => 2,
                'name' => 'マイク',
                'brand' => 'なし',
                'description' => '高音質のレコーディング用マイク',
                'price' => 8000,
            ],
            [
                'user_id' => 1,
                'img' => 'items/Purse+fashion+pocket.jpg',
                'condition_id' => 3,
                'name' => 'ショルダーバッグ',
                'brand' => '',
                'description' => 'おしゃれなショルダーバッグ',
                'price' => 3500,
            ],
            [
                'user_id' => 1,
                'img' => 'items/Tumbler+souvenir.jpg',
                'condition_id' => 4,
                'name' => 'タンブラー',
                'brand' => 'なし',
                'description' => '使いやすいタンブラー',
                'price' => 500,
            ],
            [
                'user_id' => 1,
                'img' => 'items/Waitress+with+Coffee+Grinder.jpg',
                'condition_id' => 1,
                'name' => 'コーヒーミル',
                'brand' => 'Starbacks',
                'description' => '手動のコーヒーミル',
                'price' => 4000,
            ],
            [
                'user_id' => 1,
                'img' => 'items/外出メイクアップセット.jpg',
                'condition_id' => 2,
                'name' => 'メイクセット',
                'brand' => '',
                'description' => '便利なメイクアップセット',
                'price' => 2500,
            ]
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
