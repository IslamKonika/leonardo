<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $addresses = [
            ['address' => '34 Forest Court, Loughborough, LE11 3NT'],
            ['address' => 'Row 34, North Quay, Norfolk'],
            ['address' => 'Room 34, 11 Main Road, Nottinghamshire'],
            ['address' => 'Greater London'],
            ['address' => 'West Midlands']
        ];

        DB::table('addresses')->insert($addresses);
    }
}
