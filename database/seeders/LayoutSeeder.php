<?php

namespace Database\Seeders;

use App\Enum\TableEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayoutSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table(TableEnum::CMS_LAYOUTS)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table(TableEnum::CMS_LAYOUTS)->insert([
            [
                'name' => 'home',
                'menu_type' => 'Simple',
                'header_logo'=>'uploads/header_logo.png',
                'footer_logo'=>'uploads/footer_logo.png',
                'active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name' => 'page',
                'menu_type' => 'Simple',
                'header_logo'=>'uploads/header_logo.png',
                'footer_logo'=>'uploads/footer_logo.png',
                'active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'name' => 'auth',
                'menu_type' => 'Simple',
                'header_logo'=>'uploads/header_logo.png',
                'footer_logo'=>'uploads/footer_logo.png',
                'active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
