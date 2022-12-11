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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('barcode')->unique();
            $table->string('size')->nullable();
            $table->string('age')->nullable();
            $table->string('binding')->nullable();
            $table->string('cover_link')->nullable();
            $table->float('price')->default(0.00);
            $table->float('sale_price')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('page_count')->nullable();
            $table->integer('year')->nullable();
            $table->integer('weight')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_recommend')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
};
