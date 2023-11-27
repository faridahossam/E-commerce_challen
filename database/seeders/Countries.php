<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class Countries extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //
        DB::table('countries')->truncate();
        $data = [
            ['name'=> 'US', 'shipping_rate'=> '2' , 'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name'=> 'UK', 'shipping_rate'=> '3',  'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name'=> 'CN', 'shipping_rate'=> '2',  'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ];
        DB::table('countries')->insert($data);
    }
}
