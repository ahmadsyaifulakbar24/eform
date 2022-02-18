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
        Schema::create('file_manegers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('business_form_id')->constrained('business_forms')->onUpdate('cascade')->onDelete('cascade');
            $table->string('path');
            $table->string('file_name');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_manegers');
    }
};
