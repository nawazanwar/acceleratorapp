<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(TableEnum::CUSTOMERS, function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained(TableEnum::USERS);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists(TableEnum::CUSTOMERS);
    }
};
