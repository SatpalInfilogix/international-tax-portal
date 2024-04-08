<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->delete();

        DB::table('countries')->insert([
            [
                'latitude' => '42.546245',
                'longitude' => '1.601554',
                'name' => 'Andorra',
            ], [
                'latitude' => '23.424076',
                'longitude' => '53.847818',
                'name' => 'United Arab Emirates',
            ], [
                'latitude' => '33.93911',
                'longitude' => '67.709953',
                'name' => 'Afghanistan',
            ], [
                'latitude' => '17.060816',
                'longitude' => '-61.796428',
                'name' => 'Antigua and Barbuda',
            ], [
                'latitude' => '18.220554',
                'longitude' => '-63.068615',
                'name' => 'Anguilla',
            ], [
                'latitude' => '41.153332',
                'longitude' => '20.168331',
                'name' => 'Albania',
            ], [
                'latitude' => '40.069099',
                'longitude' => '45.038189',
                'name' => 'Armenia',
            ], [
                'latitude' => '12.226079',
                'longitude' => '-69.060087',
                'name' => 'Netherlands Antilles',
            ], [
                'latitude' => '-11.202692',
                'longitude' => '17.873887',
                'name' => 'Angola',
            ], [
                'latitude' => '-75.250973',
                'longitude' => '-0.071389',
                'name' => 'Antarctica',
            ], [
                'latitude' => '-38.416097',
                'longitude' => '-63.616672',
                'name' => 'Argentina',
            ], [
                'latitude' => '-14.270972',
                'longitude' => '-170.132217',
                'name' => 'American Samoa',
            ], [
                'latitude' => '47.516231',
                'longitude' => '14.550072',
                'name' => 'Austria',
            ], [
                'latitude' => '-25.274398',
                'longitude' => '133.775136',
                'name' => 'Australia',
            ], [
                'latitude' => '12.52111',
                'longitude' => '-69.968338',
                'name' => 'Aruba',
            ], [
                'latitude' => '40.143105',
                'longitude' => '47.576927',
                'name' => 'Azerbaijan',
            ], [
                'latitude' => '43.915886',
                'longitude' => '17.679076',
                'name' => 'Bosnia and Herzegovina',
            ], [
                'latitude' => '13.193887',
                'longitude' => '-59.543198',
                'name' => 'Barbados',
            ], [
                'latitude' => '23.684994',
                'longitude' => '90.356331',
                'name' => 'Bangladesh',
            ], [
                'latitude' => '50.503887',
                'longitude' => '4.469936',
                'name' => 'Belgium',
            ], [
                'latitude' => '12.238333',
                'longitude' => '-1.561593',
                'name' => 'Burkina Faso',
            ], [
                'latitude' => '42.733883',
                'longitude' => '25.48583',
                'name' => 'Bulgaria',
            ], [
                'latitude' => '25.930414',
                'longitude' => '50.637772',
                'name' => 'Bahrain',
            ]
        ]);
    }
}
