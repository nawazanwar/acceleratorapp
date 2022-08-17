<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(TableEnum::FREELANCER_SERVICE, function (Blueprint $table) {
            $table->id();
            $table->foreignId('freelancer_id')->nullable()->constrained(TableEnum::FREELANCERS);
            $table->foreignId('service_id')->nullable()->constrained(TableEnum::SERVICES);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(TableEnum::FREELANCER_SERVICE);
    }
};
