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
                COUNT(b.province_id) as total,
                IFNULL(c.total_product, 0) as total_product
            FROM provinces a
            LEFT JOIN business_forms b ON a.id = b.province_id
            LEFT JOIN (SELECT products.business_form_id, COUNT(*) as total_product FROM products) as c ON c.business_form_id = b.id
            GROUP BY a.id;
        ");

        DB::statement("DROP VIEW IF EXISTS vw_total_business_form_by_business_type");
        DB::statement("
            CREATE VIEW vw_total_business_form_by_business_type AS
            SELECT  
                a.id,
                a.param,
                a.order,
                COUNT(b.business_type_id) as total,
                IFNULL(c.total_product, 0) as total_product
            FROM params a
            LEFT JOIN business_forms b ON a.id = b.business_type_id
            LEFT JOIN (SELECT products.business_form_id, COUNT(*) as total_product FROM products) as c ON c.business_form_id = b.id
            WHERE a.category = 'business_type'
            GROUP BY a.id;
        ");

        DB::statement("DROP VIEW IF EXISTS vw_total_business_form_by_business_fields");
        DB::statement("
            CREATE VIEW vw_total_business_form_by_business_fields AS
            SELECT  
                a.id,
                a.param,
                a.order,
                COUNT(b.business_fields_id) as total,
                IFNULL(c.total_product, 0) as total_product
            FROM params a
            LEFT JOIN business_forms b ON a.id = b.business_fields_id
            LEFT JOIN (SELECT products.business_form_id, COUNT(*) as total_product FROM products) as c ON c.business_form_id = b.id
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
                COUNT(b.industry_id) as total,
                IFNULL(c.total_product, 0) as total_product
            FROM params a
            LEFT JOIN business_forms b ON a.id = b.industry_id
            LEFT JOIN (SELECT products.business_form_id, COUNT(*) as total_product FROM products) as c ON c.business_form_id = b.id
            WHERE a.category = 'industry'
            GROUP BY a.id;
        ");

        DB::statement("DROP VIEW IF EXISTS vw_total_business_form_by_annual_turnover");
        DB::statement("
            CREATE VIEW vw_total_business_form_by_annual_turnover AS
            SELECT 
                a.param, 
                a.order,
                COUNT(b.annual_turnover) as total,
                IFNULL(c.total_product, 0) as total_product
            FROM params a
            LEFT JOIN business_forms b ON a.param = b.annual_turnover
            LEFT JOIN (SELECT products.business_form_id, COUNT(*) as total_product FROM products) as c ON c.business_form_id = b.id
            WHERE a.category = 'annual_turnover'
            GROUP BY a.param;
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
