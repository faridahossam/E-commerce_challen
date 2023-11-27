<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class Offers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         //
         DB::table('offers')->truncate();
         $data = [
             ['item_id'=> '6', 'discount_value'=> '10' ,'shipping_fees_discount' =>'0','min_pieces_purchase'=>'0','min_pieces_purchase_type'=>'0','description'=>'10% off shoes','status'=>'valid' , 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
             ['item_id'=> '5', 'discount_value'=> '50' ,'shipping_fees_discount' =>'0','min_pieces_purchase'=>'2','min_pieces_purchase_type'=>'1','description'=>'50% off jacket','status'=>'valid' , 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
             ['item_id'=> '0', 'discount_value'=> '0' ,'shipping_fees_discount' =>'10','min_pieces_purchase'=>'2','min_pieces_purchase_type'=>'0','description'=>'$10 of shipping','status'=>'valid' , 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
         ];
         DB::table('offers')->insert($data);
    }
}
