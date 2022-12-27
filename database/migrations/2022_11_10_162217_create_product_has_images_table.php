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
        Schema::create('product_has_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->nullableMorphs('userable');

            $table->string('url')->nullable();
            $table->string('link')->nullable();
            $table->string('ext')->nullable();
            $table->double('size')->nullable();
            $table->string('name')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
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
        Schema::dropIfExists('product_has_images');
        Schema::enableForeignKeyConstraints();
    }
};
