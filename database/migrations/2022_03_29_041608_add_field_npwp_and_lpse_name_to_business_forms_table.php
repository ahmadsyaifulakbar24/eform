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
            $table->string('field_npwp')->after('nik');
            $table->string('lpse_name')->nullable()->after('account_lpse');
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
            $table->dropColumn('field_npwp')->after('nik');
            $table->dropColumn('lpse_name')->nullable()->after('account_lpse');
        });
    }
};
