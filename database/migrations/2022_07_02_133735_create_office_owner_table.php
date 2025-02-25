<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(TableEnum::OFFICE_OWNER, function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id')->nullable()->constrained(TableEnum::OFFICES);
            $table->foreignId('user_id')->nullable()->constrained(TableEnum::USERS);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists(TableEnum::OFFICE_OWNER);
    }
};
