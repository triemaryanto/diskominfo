<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\DBAL\TimestampType;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tagihans')->insert([
            'menara_id' => '1',
            'tarif' => '10000',
            'status' => 'Belum Lunas',
            'bulan' => '1 Januari',
            'tahun' => '2023',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('tagihans')->insert([
            'menara_id' => '2',
            'tarif' => '10000',
            'status' => 'Lunas',
            'bulan' => '1 Februari',
            'tahun' => '2023',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('tagihans')->insert([
            'menara_id' => '3',
            'tarif' => '10000',
            'status' => 'Lunas',
            'bulan' => '1 Februari',
            'tahun' => '2023',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
