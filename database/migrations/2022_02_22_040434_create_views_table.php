<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement("DROP VIEW IF EXISTS vw_total_business_form_by_province");
        DB::statement("
            CREATE VIEW vw_total_business_form_by_province AS
            SELECT 
                a.id, 
                a.province, 
                COUNT(b.province_id) as total
            FROM provinces a
            LEFT JOIN business_forms b ON a.id = b.province_id
            GROUP BY a.id
        ");

        DB::statement("DROP VIEW IF EXISTS vw_total_business_form_by_business_type");
        DB::statement("
            CREATE VIEW vw_total_business_form_by_business_type AS
            SELECT  
                a.id,
                a.param,
                a.order,
                COUNT(b.business_type_id) as total
            FROM params a
            LEFT JOIN business_forms b ON a.id = b.business_type_id
            WHERE a.category = 'business_type'
            GROUP BY a.id
        ");

        DB::statement("DROP VIEW IF EXISTS vw_total_business_form_by_business_fields");
        DB::statement("
            CREATE VIEW vw_total_business_form_by_business_fields AS
            SELECT  
                a.id,
                a.param,
                a.order,
                COUNT(b.business_fields_id) as total
            FROM params a
            LEFT JOIN business_forms b ON a.id = b.business_fields_id
            WHERE a.category = 'business_fields'
            GROUP BY a.id;
        ");

        DB::statement("DROP VIEW IF EXISTS vw_total_business_form_by_industry");
        DB::statement("
            CREATE VIEW vw_total_business_form_by_industry AS
            SELECT  
                a.id,
                a.param,
                a.order,
                COUNT(b.industry_id) as total
            FROM params a
            LEFT JOIN business_forms b ON a.id = b.industry_id
            WHERE a.category = 'industry'
            GROUP BY a.id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('views');
    }
};