<?php

namespace Database\Seeders;

use App\Models\Param;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Param::create([
            'category' => 'business_type',
            'param' => 'Produsen/Pemilik Merk',
            'order' => 1
        ]);

        Param::create([
            'category' => 'business_type',
            'param' => 'UkM & Koperasi',
            'order' => 2
        ]);

        Param::create([
            'category' => 'business_type',
            'param' => 'Agen',
            'order' => 3
        ]);

        Param::create([
            'category' => 'business_type',
            'param' => 'Distributor',
            'order' => 4
        ]);

        Param::create([
            'category' => 'business_type',
            'param' => 'Petani & Nelayan',
            'order' => 5
        ]);

        Param::create([
            'category' => 'business_type',
            'param' => 'Pedagang Eceran',
            'order' => 6
        ]);

        Param::create([
            'category' => 'business_type',
            'param' => 'Exportir/Importir',
            'order' => 7
        ]);

        Param::create([
            'category' => 'business_fields',
            'param' => 'Aneka Industri',
            'order' => 1
        ]);

        Param::create([
            'category' => 'business_fields',
            'param' => 'Pertanian',
            'order' => 2
        ]);

        Param::create([
            'category' => 'business_fields',
            'param' => 'Exportir/Importir',
            'order' => 3
        ]);

        Param::create([
            'category' => 'business_fields',
            'param' => 'Industri Consumer Goods',
            'order' => 4
        ]);

        Param::create([
            'category' => 'business_fields',
            'param' => 'Perdagangan/Jasa & Investasi',
            'order' => 5
        ]);

        Param::create([
            'category' => 'business_fields',
            'param' => 'Industri Dasar & Kimia',
            'order' => 6
        ]);

        Param::create([
            'category' => 'business_fields',
            'param' => 'Konstruksi & Real Estate',
            'order' => 7
        ]);

        Param::create([
            'category' => 'business_fields',
            'param' => 'Infrastrktur & Transportasi',
            'order' => 8
        ]);

        Param::create([
            'category' => 'business_fields',
            'param' => 'Keuangan',
            'order' => 9
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Makan & Minuman',
            'order' => 1
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Produk Segar',
            'order' => 2
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Pertanian & Budidaya',
            'order' => 3
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Kesehatan & Kecantikan',
            'order' => 4
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Pakaian',
            'order' => 5
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Aksesoris Fashion',
            'order' => 6
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Tekstil * Produk Kulit',
            'order' => 7
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Tas, Sepatu, & Aksesorisnya',
            'order' => 8
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Perlengkapan Rumah & Furniture',
            'order' => 9
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Elektronik & Elektronik Rumah Tangga',
            'order' => 10
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Perlengkapan Usaha & Kantor',
            'order' => 11
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Peralatan & Perlengkapan Listrik',
            'order' => 12
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Mesin & Perkakas',
            'order' => 13
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Bahan & Saran Produksi',
            'order' => 14
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Otomotif & Aksesoris',
            'order' => 15
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Olahraga & Hiburan',
            'order' => 16
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Gift & Crafts',
            'order' => 17
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Mainan & Hobi',
            'order' => 18
        ]);

        Param::create([
            'category' => 'industry',
            'param' => 'Jasa',
            'order' => 19
        ]);

        Param::create([
            'category' => 'business_activity',
            'param' => 'Badan Usaha, misal: misal: Badan Usaha Milik Negara (BUMN), Perseroan Terbatas (PT), Badan Usaha Milik Daerah (BUMD), Persekutuan Komanditer (CV)',
            'order' => 1,
            'alias' => 'BA1'
        ]);

        Param::create([
            'category' => 'business_activity',
            'param' => 'Non Badan Usaha (Perorangan)',
            'order' => 2,
            'alias' => 'BA2'
        ]);

        Param::create([
            'category' => 'image_plut',
            'param' => 'https://lh4.googleusercontent.com/B7932YMdKOeYT6sXs1AbhfxOOXpWbFXgMz34aIOeHuwmSd-pERyso2bC0mGnM8j-sqlFTZWQIcJrAwjh8fVOq_BVtN65fgQ6Px-BN-aZyOSw1VcGpe5-3Nl0iNvafR0PhA=w1024',
            'order' => 1,
        ]);

        Param::create([
            'category' => 'image_plut',
            'param' => 'https://lh3.googleusercontent.com/lHn8rV9PtH_cfM_r2kMbDiyat9aBn7Ge6hhBsfC3KCx0cFVIHoVFz2S7yqSqWGVbqMQW6Dx4xUA9QgFpxyzpp9R8HVEbuJ4YSFCRFALteSXITFrEx3kpdHHliueSNYt42A=w1024',
            'order' => 2,
        ]);
    }
}
