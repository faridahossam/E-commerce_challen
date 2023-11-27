<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->truncate();
        $data = [
            ['category_id'=> '1', 'item_type' =>'T-shirt','country_id'=> '1', 'weight'=>'0.2' ,'price'=>'30.99' ,'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['category_id'=> '1', 'item_type' =>'Blouse', 'country_id'=> '2', 'weight'=>'0.3' ,'price'=>'10.99' , 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['category_id'=> '2', 'item_type' =>'Pants', 'country_id'=> '2', 'weight'=>'0.9' ,'price'=>'64.99' , 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['category_id'=> '2', 'item_type' =>'Sweatpants', 'country_id'=> '3', 'weight'=>'1.1' ,'price'=>'84.99' ,  'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['category_id'=> '3', 'item_type' =>'Jacket', 'country_id'=> '1', 'weight'=>'2.2' ,'price'=>'199.99', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['category_id'=> '4', 'item_type' =>'Shoes', 'country_id'=> '3', 'weight'=>'1.3' ,'price'=>'79.99' ,  'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            
        ];
        DB::table('products')->insert($data);
    }
}
