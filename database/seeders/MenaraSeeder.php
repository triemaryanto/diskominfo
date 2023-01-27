<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menaras')->insert([
            'name' => 'PT. Maju Mundur Kena',
            'name_menara' => 'Menara A',
            'email' => 'yunikakirnaningtyas@gmail.com',
            'nomor' => '6281519973094',
            'lokasi' => 'Tangerang',
            'altitude' => '40',
            'latitude' => '-6.1954264',
            'longitude' => '106.6218659',
        ]);
        DB::table('menaras')->insert([
            'name' => 'PT. Maju Mundur Kena',
            'name_menara' => 'Menara B',
            'email' => 'yunikakirnaningtyas@gmail.com',
            'nomor' => '6281519973094',
            'lokasi' => 'Tangerang',
            'altitude' => '40',
            'latitude' => '-6.1954264',
            'longitude' => '106.6218659',
        ]);
        DB::table('menaras')->insert([
            'name' => 'PT. Maju Mundur Kena',
            'name_menara' => 'Menara C',
            'email' => 'yunikakirnaningtyas@gmail.com',
            'nomor' => '6281519973094',
            'lokasi' => 'Tangerang',
            'altitude' => '40',
            'latitude' => '-6.1954264',
            'longitude' => '106.6218659',
        ]);
    }
}
