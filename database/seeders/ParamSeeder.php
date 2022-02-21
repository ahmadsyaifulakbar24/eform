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
            'id' => 'c9c503fd-67e2-472a-a2cc-335697bb35e9',
            'category' => 'business_type',
            'param' => 'Produsen/Pemilik Merk',
            'order' => 1
        ]);

        Param::create([
            'id' => '3a92f217-e58f-480b-b4e8-7bca7b195b78',
            'category' => 'business_type',
            'param' => 'UkM & Koperasi',
            'order' => 2
        ]);

        Param::create([
            'id' => '9e688825-d377-4d0f-b9a1-b7946db08fc7',
            'category' => 'business_type',
            'param' => 'Agen',
            'order' => 3
        ]);

        Param::create([
            'id' => '2131cef1-723a-4514-9fa6-aa56565479fa',
            'category' => 'business_type',
            'param' => 'Distributor',
            'order' => 4
        ]);

        Param::create([
            'id' => 'ddcdaf06-3383-4a08-b18a-eb0053379ba0',
            'category' => 'business_type',
            'param' => 'Petani & Nelayan',
            'order' => 5
        ]);

        Param::create([
            'id' => '17f592b5-217c-40c2-b2c1-31be970fe1b7',
            'category' => 'business_type',
            'param' => 'Pedagang Eceran',
            'order' => 6
        ]);

        Param::create([
            'id' => '0be76e72-7487-46a0-b97c-6596b796801f',
            'category' => 'business_type',
            'param' => 'Exportir/Importir',
            'order' => 7
        ]);

        Param::create([
            'id' => '16a618a7-7937-4863-b954-c829d5053f80',
            'category' => 'business_fields',
            'param' => 'Aneka Industri',
            'order' => 1
        ]);

        Param::create([
            'id' => 'e5ba610a-02c1-4985-8958-8457b3d8cf20',
            'category' => 'business_fields',
            'param' => 'Pertanian',
            'order' => 2
        ]);

        Param::create([
            'id' => 'e529c07b-9334-42a9-9385-917776857b91',
            'category' => 'business_fields',
            'param' => 'Exportir/Importir',
            'order' => 3
        ]);

        Param::create([
            'id' => '62ce72aa-18f0-485a-951a-185a95e3a8d6',
            'category' => 'business_fields',
            'param' => 'Industri Consumer Goods',
            'order' => 4
        ]);

        Param::create([
            'id' => 'd197d1bb-01af-49f3-b924-498625a07519',
            'category' => 'business_fields',
            'param' => 'Perdagangan/Jasa & Investasi',
            'order' => 5
        ]);

        Param::create([
            'id' => 'e051f252-e0de-4580-ba50-0b2966c4ef16',
            'category' => 'business_fields',
            'param' => 'Industri Dasar & Kimia',
            'order' => 6
        ]);

        Param::create([
            'id' => 'edddc894-504f-4598-9a6b-f41678fc4ca3',
            'category' => 'business_fields',
            'param' => 'Konstruksi & Real Estate',
            'order' => 7
        ]);

        Param::create([
            'id' => '8702c6c9-ae21-478b-91ef-57cb5e6e9890',
            'category' => 'business_fields',
            'param' => 'Infrastrktur & Transportasi',
            'order' => 8
        ]);

        Param::create([
            'id' => '504ad88c-fa9c-473d-a3ee-82780cc75d6f',
            'category' => 'business_fields',
            'param' => 'Keuangan',
            'order' => 9
        ]);

        Param::create([
            'id' => '1fb545ac-6071-4a19-88ab-b6ac945a6ca0',
            'category' => 'industry',
            'param' => 'Makan & Minuman',
            'order' => 1
        ]);

        Param::create([
            'id' => '79e8458f-dbf8-4180-b803-0331aaf3b034',
            'category' => 'industry',
            'param' => 'Produk Segar',
            'order' => 2
        ]);

        Param::create([
            'id' => '8be1a465-40a3-49e9-96b7-e4b1e169524b',
            'category' => 'industry',
            'param' => 'Pertanian & Budidaya',
            'order' => 3
        ]);

        Param::create([
            'id' => '175574d7-7fcf-47b9-a990-b34db3fab02e',
            'category' => 'industry',
            'param' => 'Kesehatan & Kecantikan',
            'order' => 4
        ]);

        Param::create([
            'id' => '12cc59a4-9a9c-4b36-b90b-90962a696cd2',
            'category' => 'industry',
            'param' => 'Pakaian',
            'order' => 5
        ]);

        Param::create([
            'id' => 'c1373470-33c5-468e-8007-40ce2fc1a118',
            'category' => 'industry',
            'param' => 'Aksesoris Fashion',
            'order' => 6
        ]);

        Param::create([
            'id' => '052349e9-1708-4ee0-a211-79c48150017f',
            'category' => 'industry',
            'param' => 'Tekstil & Produk Kulit',
            'order' => 7
        ]);

        Param::create([
            'id' => 'd6f67b73-ec88-4a8f-b805-4cc99445e1b1',
            'category' => 'industry',
            'param' => 'Tas, Sepatu, & Aksesorisnya',
            'order' => 8
        ]);

        Param::create([
            'id' => 'bc1410a4-7b4f-4e82-85e9-25a224109c6d',
            'category' => 'industry',
            'param' => 'Perlengkapan Rumah & Furniture',
            'order' => 9
        ]);

        Param::create([
            'id' => '0be08060-07d2-4e5a-a152-5911513c7a5a',
            'category' => 'industry',
            'param' => 'Elektronik & Elektronik Rumah Tangga',
            'order' => 10
        ]);

        Param::create([
            'id' => '9a13e87a-1513-4ab3-ab8f-6c22d5791689',
            'category' => 'industry',
            'param' => 'Perlengkapan Usaha & Kantor',
            'order' => 11
        ]);

        Param::create([
            'id' => '24ff69da-f927-4c00-af14-3b62909ef06f',
            'category' => 'industry',
            'param' => 'Peralatan & Perlengkapan Listrik',
            'order' => 12
        ]);

        Param::create([
            'id' => 'c1abab21-980d-4e21-894f-c672b607c7f9',
            'category' => 'industry',
            'param' => 'Mesin & Perkakas',
            'order' => 13
        ]);

        Param::create([
            'id' => '74a613b3-39ef-4e14-94cf-6f22ee5ffa68',
            'category' => 'industry',
            'param' => 'Bahan & Sarana Produksi',
            'order' => 14
        ]);

        Param::create([
            'id' => 'f658134c-f488-45ca-b286-1752a7960741',
            'category' => 'industry',
            'param' => 'Otomotif & Aksesoris',
            'order' => 15
        ]);

        Param::create([
            'id' => 'e5bbd18b-ccb2-4d0d-b218-f05877b34a5c',
            'category' => 'industry',
            'param' => 'Olahraga & Hiburan',
            'order' => 16
        ]);

        Param::create([
            'id' => '3c976317-7a3b-4942-8a83-6aaf6255dbc3',
            'category' => 'industry',
            'param' => 'Gift & Crafts',
            'order' => 17
        ]);

        Param::create([
            'id' => '667232aa-a4a3-4bb2-aaeb-7d5a83177f39',
            'category' => 'industry',
            'param' => 'Mainan & Hobi',
            'order' => 18
        ]);

        Param::create([
            'id' => 'da7b1878-484c-4b54-acb8-d742f83df574',
            'category' => 'industry',
            'param' => 'Jasa',
            'order' => 19
        ]);

        Param::create([
            'id' => '9545cb62-c88a-4c59-881d-fb592ef2f8e6',
            'category' => 'business_activity',
            'param' => 'BUMN',
            'order' => 1,
            'alias' => 'bumn'
        ]);

        Param::create([
            'id' => 'e629b591-cf23-43f0-83f1-5c263e84feee',
            'category' => 'business_activity',
            'param' => 'Perseroan Terbatas (PT)',
            'order' => 1,
            'alias' => 'pt'
        ]);

        Param::create([
            'id' => 'c6caa5ea-dc63-488e-8438-65852d1ead28',
            'category' => 'business_activity',
            'param' => 'BUMD',
            'order' => 1,
            'alias' => 'bumd'
        ]);

        Param::create([
            'id' => 'b7659ce5-d720-49bd-ba12-f65569ec7624',
            'category' => 'business_activity',
            'param' => 'Persekutuan Comanditer (CV)',
            'order' => 1,
            'alias' => 'cv'
        ]);

        Param::create([
            'id' => '3bfadd61-b006-4227-9c35-ddb06745f498',
            'category' => 'business_activity',
            'param' => 'Non Badan Usaha (Perorangan)',
            'order' => 2,
            'alias' => 'perorangan'
        ]);

        Param::create([
            'id' => '9ba5fa95-7a76-46cf-b732-f77f4073aa4d',
            'category' => 'image_plut',
            'param' => 'https://lh4.googleusercontent.com/B7932YMdKOeYT6sXs1AbhfxOOXpWbFXgMz34aIOeHuwmSd-pERyso2bC0mGnM8j-sqlFTZWQIcJrAwjh8fVOq_BVtN65fgQ6Px-BN-aZyOSw1VcGpe5-3Nl0iNvafR0PhA=w1024',
            'order' => 1,
        ]);

        Param::create([
            'id' => 'f31fdc5e-1f01-4a57-93f9-d33b37d743cd',
            'category' => 'image_plut',
            'param' => 'https://lh3.googleusercontent.com/lHn8rV9PtH_cfM_r2kMbDiyat9aBn7Ge6hhBsfC3KCx0cFVIHoVFz2S7yqSqWGVbqMQW6Dx4xUA9QgFpxyzpp9R8HVEbuJ4YSFCRFALteSXITFrEx3kpdHHliueSNYt42A=w1024',
            'order' => 2,
        ]);
    }
}
