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
        Schema::create('order_has_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->float('price')->default(0.00);
            $table->float('sale_price')->nullable();
            $table->integer('quantity')->default(0);

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
        Schema::dropIfExists('order_has_products');
        Schema::enableForeignKeyConstraints();
    }
};
