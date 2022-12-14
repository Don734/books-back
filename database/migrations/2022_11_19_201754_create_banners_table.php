<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image_url')->nullable();
            $table->string('url');
            $table->text('banner_text')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_advert')->default(false);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('banners');
        Schema::enableForeignKeyConstraints();
    }
};
