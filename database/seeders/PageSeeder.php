<?php

namespace Database\Seeders;

use App\Enum\AccessTypeEnum;
use App\Enum\TableEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table(TableEnum::CMS_PAGES)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table(TableEnum::CMS_PAGES)->insert([
            [
                'layout_id' => '1',
                'name' => 'Home',
                'code' => 'home',
                'order' => '1',
                'page_title' => 'Strategic Plan for doing Things.',
                'page_description' => 'With INCUAPP, we’ve helped startups scale their business.',
                'page_keyword' => '',
                'active' => true,
                'banner_image' => '/uploads/home-page-banner.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'layout_id' => '2',
                'name' => 'About Us',
                'code' => 'about-us',
                'order' => '2',
                'page_title' => 'about us',
                'page_description' => 'This is related to about us',
                'page_keyword' => '',
                'active' => true,
                'banner_image' => '/uploads/about-us.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'layout_id' => '2',
                'name' => 'Our Startup',
                'code' => 'startup',
                'order' => '3',
                'page_title' => 'Our Startups',
                'page_description' => 'Our Startups Include ' . implode(',', AccessTypeEnum::getTranslationKeys()),
                'page_keyword' => implode(',', AccessTypeEnum::getValues()),
                'active' => true,
                'banner_image' => '/uploads/startup.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'layout_id' => '2',
                'name' => 'Event',
                'code' => 'event',
                'order' => '4',
                'page_title' => 'Event',
                'page_description' => 'This Is Related To event ',
                'page_keyword' => '',
                'active' => true,
                'banner_image' => '/uploads/startup.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'layout_id' => '2',
                'name' => 'News',
                'code' => 'news',
                'order' => '5',
                'page_title' => 'News',
                'page_description' => 'Related to News',
                'page_keyword' => '',
                'active' => true,
                'banner_image' => '/uploads/news.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'layout_id' => '2',
                'name' => 'Plan',
                'code' => 'plan',
                'order' => '6',
                'page_title' => 'Startup Plans',
                'page_description' => 'Startup Plans',
                'page_keyword' => '',
                'active' => true,
                'banner_image' => '/uploads/plan-page-banner.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'layout_id' => '2',
                'name' => 'Contact Us',
                'code' => 'contact-us',
                'order' => '7',
                'page_title' => 'Contact Us',
                'page_description' => 'This Is Related To Contact Us',
                'page_keyword' => '',
                'active' => true,
                'banner_image' => '/uploads/contact.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'layout_id' => '3',
                'name' => 'Login',
                'code' => 'login',
                'order' => '8',
                'page_title' => 'Start managing now',
                'page_description' => 'Stop struggling with common tasks and focus on the real choke points. Discover a full featured HR management platform.',
                'page_keyword' => 'login',
                'active' => true,
                'banner_image' => '/uploads/startup.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
