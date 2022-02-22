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
        Schema::create('business_forms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('company_name')->comment('nama perusahaan');
            $table->string('since')->comment('tahun berdiri');
            $table->foreignUuid('business_type_id')->comment('jenis usaha')->constrained('params')->onUpdate('cascade');
            $table->foreignUuid('business_fields_id')->comment('bidang usaha')->constrained('params')->onUpdate('cascade');
            $table->foreignUuid('industry_id')->constrained('params')->onUpdate('cascade');
            $table->string('main_product');
            $table->string('capital')->comment('modal usaha');
            $table->string('annual_turnover')->comment('omzet pertahun');
            $table->string('total_employee')->comment('jumlah karyawan');
            $table->text('company_description')->comment('deskripsi perusahaan');
            $table->foreignId('province_id')->constrained('provinces')->onUpdate('cascade');
            $table->foreignId('city_id')->constrained('cities')->onUpdate('cascade');
            $table->text('address');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->integer('postal_code')->comment('kode pos');
            $table->string('company_image')->comment('foto tempat usaha');
            $table->string('contact_name')->comment('nama kontak');
            $table->string('nik');
            $table->string('phone');
            $table->string('email');
            $table->string('website')->nullable()->comment('website atau sosial media');
            $table->foreignUuid('business_activity_id')->constrained('params')->onUpdate('cascade');

            $table->string('company_npwp')->nullable()->comment('npwp perusahaan');
            $table->string('company_akta')->nullable()->comment('akta perusahaan');
            $table->string('nib')->nullable();
            $table->string('director_ktp')->nullable()->comment('ktp direktur');
            $table->string('sk_kemenkumham')->nullable();
            
            $table->string('npwp')->nullable();
            $table->string('ktp')->nullable();
            $table->string('photo_with_ktp')->nullable()->comment('foto dengan ktp');
            
            $table->string('product_certificate')->nullable();
            $table->boolean('product_information');

            $table->string('status_ukm');

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
        Schema::dropIfExists('business_forms');
    }
};
