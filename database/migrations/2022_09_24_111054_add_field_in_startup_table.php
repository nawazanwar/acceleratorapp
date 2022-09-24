<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::table(TableEnum::BA, function (Blueprint $table) {
            if (!Schema::hasColumn(TableEnum::BA, 'map_address')) {
                $table->string('map_address')->after('id')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'map_latitude')) {
                $table->string('map_latitude')->after('map_address')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'map_longitude')) {
                $table->string('map_longitude')->after('map_latitude')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'about_us')) {
                $table->string('about_us')->after('map_longitude')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'instagram')) {
                $table->string('instagram')->after('about_us')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'facebook')) {
                $table->string('facebook')->after('instagram')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'twitter')) {
                $table->string('twitter')->after('facebook')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'youtube')) {
                $table->string('youtube')->after('twitter')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'linkedIn')) {
                $table->string('linkedIn')->after('youtube')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'whatsapp')) {
                $table->string('whatsapp')->after('linkedIn')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'office_start_time')) {
                $table->json('office_start_time')->after('whatsapp')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::BA, 'office_end_time')) {
                $table->json('office_end_time')->after('office_start_time')->nullable();
            }
        });
        Schema::table(TableEnum::FREELANCERS, function (Blueprint $table) {
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'map_address')) {
                $table->string('map_address')->after('id')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'map_latitude')) {
                $table->string('map_latitude')->after('map_address')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'map_longitude')) {
                $table->string('map_longitude')->after('map_latitude')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'about_us')) {
                $table->string('about_us')->after('map_longitude')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'instagram')) {
                $table->string('instagram')->after('about_us')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'facebook')) {
                $table->string('facebook')->after('instagram')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'twitter')) {
                $table->string('twitter')->after('facebook')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'youtube')) {
                $table->string('youtube')->after('twitter')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'linkedIn')) {
                $table->string('linkedIn')->after('youtube')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'whatsapp')) {
                $table->string('whatsapp')->after('linkedIn')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'office_start_time')) {
                $table->json('office_start_time')->after('whatsapp')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::FREELANCERS, 'office_end_time')) {
                $table->json('office_end_time')->after('office_start_time')->nullable();
            }
        });
        Schema::table(TableEnum::MENTORS, function (Blueprint $table) {
            if (!Schema::hasColumn(TableEnum::MENTORS, 'map_address')) {
                $table->string('map_address')->after('id')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'map_latitude')) {
                $table->string('map_latitude')->after('map_address')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'map_longitude')) {
                $table->string('map_longitude')->after('map_latitude')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'about_us')) {
                $table->string('about_us')->after('map_longitude')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'instagram')) {
                $table->string('instagram')->after('about_us')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'facebook')) {
                $table->string('facebook')->after('instagram')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'twitter')) {
                $table->string('twitter')->after('facebook')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'youtube')) {
                $table->string('youtube')->after('twitter')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'linkedIn')) {
                $table->string('linkedIn')->after('youtube')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'whatsapp')) {
                $table->string('whatsapp')->after('linkedIn')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'office_start_time')) {
                $table->json('office_start_time')->after('whatsapp')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::MENTORS, 'office_end_time')) {
                $table->json('office_end_time')->after('office_start_time')->nullable();
            }
        });
        Schema::table(TableEnum::CUSTOMERS, function (Blueprint $table) {
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'map_address')) {
                $table->string('map_address')->after('id')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'map_latitude')) {
                $table->string('map_latitude')->after('map_address')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'map_longitude')) {
                $table->string('map_longitude')->after('map_latitude')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'about_us')) {
                $table->string('about_us')->after('map_longitude')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'instagram')) {
                $table->string('instagram')->after('about_us')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'facebook')) {
                $table->string('facebook')->after('instagram')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'twitter')) {
                $table->string('twitter')->after('facebook')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'youtube')) {
                $table->string('youtube')->after('twitter')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'linkedIn')) {
                $table->string('linkedIn')->after('youtube')->nullable();
            }
            if (!Schema::hasColumn(TableEnum::CUSTOMERS, 'whatsapp')) {
                $table->string('whatsapp')->after('linkedIn')->nullable();
            }
        });
    }


    public function down()
    {
    }
};
