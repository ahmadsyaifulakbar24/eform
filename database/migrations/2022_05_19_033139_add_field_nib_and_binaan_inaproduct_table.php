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
        Schema::table('business_forms', function (Blueprint $table) {
            $table->string('field_nib')->nullable()->after('nib');
            $table->string('binaan_inaproduct')->nullable()->after('registered_lkpp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_forms', function (Blueprint $table) {
            $table->dropColumn('field_nib')->nullable()->after('nib');
            $table->dropColumn('binaan_inaproduct')->nullable()->after('registered_lkpp');
        });
    }
};
