<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->truncate();
        $data = [
            ['name' => 'tops', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'pants', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Jackets', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Shoes', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('categories')->insert($data);
    }
}
