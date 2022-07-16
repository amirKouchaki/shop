<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create(['email' => 'amir@gmail.com']);
        \App\Models\User::factory(10)->create([
            'super_id' => $user->id
        ]);
        $products = [
            [
            "id" => 1,
            "name" => "laptop",
            "user_id" => 1,
            "price" => "200.32",
            "in_stock" => 173,
            "slug" => "laptop",
            "avatar" => "products/avatars/VsQuuAjbTpBvgKRtH4XeicXv0Ne7uVqieNIAQBMg.jpg",
            "currency" => "rial",
            "created_at" => "2022-07-16T11:33:54.000000Z",
            "updated_at" => "2022-07-16T11:53:34.000000Z",
            ],
            [
            "id" => 2,
            "name" => "perfume",
            "user_id" => 1,
            "price" => "14.00",
            "in_stock" => 130,
            "slug" => "perfume_1",
            "avatar" => "products/avatars/yLUpKsdfb3BkuvSDFcxjv71Jf1XWDQmeyu7qfHt9.jpg",
            "currency" => "dollar",
            "created_at" => "2022-07-16T11:35:29.000000Z",
            "updated_at" => "2022-07-16T11:35:29.000000Z",
            ],
            [
            "id" => 3,
            "name" => "battery",
            "user_id" => 1,
            "price" => "9.21",
            "in_stock" => 1310,
            "slug" => "battery",
            "avatar" => "products/avatars/bNsq2m5oCl2vmM3g1MD45pwI47Gu9Z0xZrcV66de.jpg",
            "currency" => "rial",
            "created_at" => "2022-07-16T13:43:45.000000Z",
            "updated_at" => "2022-07-16T13:43:45.000000Z",
            ],
            [
            "id" => 4,
            "name" => "guitar",
            "user_id" => 1,
            "price" => "200.32",
            "in_stock" => 3,
            "slug" => "guitar",
            "avatar" => "products/avatars/v7tCLG5ZYOqp417AjH7QRGDcdNAXwALRBUriuB8q.jpg",
            "currency" => "rial",
            "created_at" => "2022-07-16T13:51:39.000000Z",
            "updated_at" => "2022-07-16T13:51:39.000000Z",
            ],
            [
            "id" => 5,
            "name" => "socks",
            "user_id" => 1,
            "price" => "51.00",
            "in_stock" => 131,
            "slug" => "socks",
            "avatar" => "products/avatars/dCYlODTsDDYgmR694yjdW4YETHtSbOKIAhJggRCp.jpg",
            "currency" => "rial",
            "created_at" => "2022-07-16T13:56:35.000000Z",
            "updated_at" => "2022-07-16T13:56:35.000000Z",
            ],
            [
            "id" => 6,
            "name" => "bag",
            "user_id" => 1,
            "price" => "514.00",
            "in_stock" => 4143,
            "slug" => "bag",
            "avatar" => "products/avatars/aUJ7lRbSXMESBx0ICqBBPa8g7imOA1YtVltF1Khw.jpg",
            "currency" => "rial",
            "created_at" => "2022-07-16T13:57:49.000000Z",
            "updated_at" => "2022-07-16T13:57:49.000000Z",
            ],
        ];
        foreach($products as $product){
            Product::create($product);
        }

        Customer::factory(10)->create();
        
   
    }
}
