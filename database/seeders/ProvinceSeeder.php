<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province = DB::table('provinces');
        
        $province->insert([
            'id' => 1,
            'province' => 'Pusat'
        ]);

        $province->insert([
            'id' => 11,
            'province' => 'Aceh'
        ]);

        $province->insert([
            'id' => 12,
            'province' => 'Sumatera Utara'
        ]);

        $province->insert([
            'id' => 13,
            'province' => 'Sumatera Barat'
        ]);

        $province->insert([
            'id' => 14,
            'province' => 'Riau'
        ]);

        $province->insert([
            'id' => 15,
            'province' => 'Jambi'
        ]);

        $province->insert([
            'id' => 16,
            'province' => 'Sumatera Selatan'
        ]);

        $province->insert([
            'id' => 17,
            'province' => 'Bengkulu'
        ]);

        $province->insert([
            'id' => 18,
            'province' => 'Lampung'
        ]);

        $province->insert([
            'id' => 19,
            'province' => 'Bangka Belitung'
        ]);

        $province->insert([
            'id' => 21,
            'province' => 'Kepulauan Riau'
        ]);

        $province->insert([
            'id' => 31,
            'province' => 'D.K.I. Jakarta'
        ]);

        $province->insert([
            'id' => 32,
            'province' => 'Jawa Barat'
        ]);

        $province->insert([
            'id' => 33,
            'province' => 'Jawa Tengah'
        ]);

        $province->insert([
            'id' => 34,
            'province' => 'D.I. Yogyakarta'
        ]);

        $province->insert([
            'id' => 35,
            'province' => 'Jawa Timur'
        ]);

        $province->insert([
            'id' => 36,
            'province' => 'Banten'
        ]);

        $province->insert([
            'id' => 51,
            'province' => 'Bali'
        ]);

        $province->insert([
            'id' => 52,
            'province' => 'Nusa Tenggara Barat'
        ]);

        $province->insert([
            'id' => 53,
            'province' => 'Nusa Tenggara Timur'
        ]);

        $province->insert([
            'id' => 61,
            'province' => 'Kalimantan Barat'
        ]);

        $province->insert([
            'id' => 62,
            'province' => 'Kalimantan Tengah'
        ]);

        $province->insert([
            'id' => 63,
            'province' => 'Kalimantan Selatan'
        ]);

        $province->insert([
            'id' => 64,
            'province' => 'Kalimantan Timur'
        ]);

        $province->insert([
            'id' => 65,
            'province' => 'Kalimantan Utara'
        ]);

        $province->insert([
            'id' => 71,
            'province' => 'Sulawesi Utara'
        ]);

        $province->insert([
            'id' => 72,
            'province' => 'Sulawesi Tengah'
        ]);

        $province->insert([
            'id' => 73,
            'province' => 'Sulawesi Selatan'
        ]);

        $province->insert([
            'id' => 74,
            'province' => 'Sulawesi Tenggara'
        ]);

        $province->insert([
            'id' => 75,
            'province' => 'Gorontalo'
        ]);

        $province->insert([
            'id' => 76,
            'province' => 'Sulawesi Barat'
        ]);

        $province->insert([
            'id' => 81,
            'province' => 'Maluku'
        ]);

        $province->insert([
            'id' => 82,
            'province' => 'Maluku Utara'
        ]);

        $province->insert([
            'id' => 91,
            'province' => 'Papua Barat'
        ]);

        $province->insert([
            'id' => 94,
            'province' => 'Papua'
        ]);
    }
}
