<?php

use App\Enum\TableEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create(TableEnum::CMS_LAYOUTS, function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->enum('menu_type', ['simple', 'mega_menu'])->default('simple');
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->longText('header')->nullable();
            $table->longText('footer')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained(TableEnum::USERS);
            $table->foreignId('updated_by')->nullable()->constrained(TableEnum::USERS);
            $table->foreignId('deleted_by')->nullable()->constrained(TableEnum::USERS);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists(TableEnum::CMS_LAYOUTS);
    }
};
