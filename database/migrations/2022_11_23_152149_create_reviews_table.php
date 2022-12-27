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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('answerable_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string("name");
            $table->string("email");
            $table->double("rating", 3, 2);
            $table->text("comment")->nullable();
            $table->text('answer')->nullable();
            $table->timestamp("answered_at")->nullable();
            $table->timestamp("activated_at")->nullable();
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
        Schema::dropIfExists('reviews');
        Schema::enableForeignKeyConstraints();
    }
};
