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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('business_form_id')->constrained('business_forms')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('sku')->nullable();
            $table->string('front_image');
            $table->string('side_image');
            $table->string('top_image');
            $table->string('back_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
