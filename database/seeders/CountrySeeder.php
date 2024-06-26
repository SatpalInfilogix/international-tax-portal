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
            ], [
                'latitude' => '-3.373056',
                'longitude' => '29.918886',
                'name' => 'Burundi',
            ], [
                'latitude' => '9.30769',
                'longitude' => '2.315834',
                'name' => 'Benin',
            ], [
                'latitude' => '32.321384',
                'longitude' => '-64.75737',
                'name' => 'Bermuda',
            ], [
                'latitude' => '4.535277',
                'longitude' => '114.727669',
                'name' => 'Brunei',
            ], [
                'latitude' => '-16.290154',
                'longitude' => '-63.588653',
                'name' => 'Bolivia',
            ], [
                'latitude' => '-14.235004',
                'longitude' => '-51.92528',
                'name' => 'Brazil',
            ], [
                'latitude' => '25.03428',
                'longitude' => '-77.39628',
                'name' => 'Bahamas',
            ],  [
                'latitude' => '27.514162',
                'longitude' => '90.433601',
                'name' => 'Bhutan',
            ],   [
                'latitude' => '-54.423199',
                'longitude' => '3.413194',
                'name' => 'Bouvet Island',
            ],   [
                'latitude' => '-22.328474',
                'longitude' => '24.684866',
                'name' => 'Botswana',
            ],   [
                'latitude' => '53.709807',
                'longitude' => '27.953389',
                'name' => 'Belarus',
            ],   [
                'latitude' => '17.189877',
                'longitude' => '-88.49765',
                'name' => 'Belize',
            ],   [
                'latitude' => '56.130366',
                'longitude' => '-106.346771',
                'name' => 'Canada',
            ],   [
                'latitude' => '-12.164165',
                'longitude' => '96.870956',
                'name' => 'Cocos [Keeling] Islands',
            ],   [
                'latitude' => '-4.038333',
                'longitude' => '21.758664',
                'name' => 'Congo [DRC]',
            ],   [
                'latitude' => '6.611111',
                'longitude' => '20.939444',
                'name' => 'Central African Republic',
            ],   [
                'latitude' => '-0.228021',
                'longitude' => '15.827659',
                'name' => 'Congo [Republic]',
            ],   [
                'latitude' => '46.818188',
                'longitude' => '8.227512',
                'name' => 'Switzerland',
            ],   [
                'latitude' => '7.539989',
                'longitude' => '-5.54708',
                'name' => 'C?te d\'Ivoire',
            ],   [
                'latitude' => '-21.236736',
                'longitude' => '-159.777671',
                'name' => 'Cook Islands',
            ],   [
                'latitude' => '-35.675147',
                'longitude' => '-71.542969',
                'name' => 'Chile',
            ],   [
                'latitude' => '7.369722',
                'longitude' => '12.354722',
                'name' => 'Cameroon',
            ],   [
                'latitude' => '35.86166',
                'longitude' => '104.195397',
                'name' => 'China',
            ],   [
                'latitude' => '4.570868',
                'longitude' => '-74.297333',
                'name' => 'Colombia',
            ],   [
                'latitude' => '9.748917',
                'longitude' => '-83.753428',
                'name' => 'Costa Rica',
            ],   [
                'latitude' => '21.521757',
                'longitude' => '-77.781167',
                'name' => 'Cuba',
            ],   [
                'latitude' => '16.002082',
                'longitude' => '-24.013197',
                'name' => 'Cape Verde',
            ],   [
                'latitude' => '-10.447525',
                'longitude' => '105.690449',
                'name' => 'Christmas Island',
            ],   [
                'latitude' => '35.126413',
                'longitude' => '33.429859',
                'name' => 'Cyprus',
            ],   [
                'latitude' => '49.817492',
                'longitude' => '15.472962',
                'name' => 'Czech Republic',
            ],   [
                'latitude' => '51.165691',
                'longitude' => '10.451526',
                'name' => 'Germany',
            ],   [
                'latitude' => '11.825138',
                'longitude' => '42.590275',
                'name' => 'Djibouti',
            ],   [
                'latitude' => '56.26392',
                'longitude' => '9.501785',
                'name' => 'Denmark',
            ],   [
                'latitude' => '15.414999',
                'longitude' => '-61.370976',
                'name' => 'Dominica',
            ],   [
                'latitude' => '18.735693',
                'longitude' => '-70.162651',
                'name' => 'Dominican Republic',
            ],   [
                'latitude' => '28.033886',
                'longitude' => '1.659626',
                'name' => 'Algeria',
            ],   [
                'latitude' => '-1.831239',
                'longitude' => '-78.183406',
                'name' => 'Ecuador',
            ],   [
                'latitude' => '58.595272',
                'longitude' => '25.013607',
                'name' => 'Estonia',
            ],   [
                'latitude' => '26.820553',
                'longitude' => '30.802498',
                'name' => 'Egypt',
            ],   [
                'latitude' => '24.215527',
                'longitude' => '-12.885834',
                'name' => 'Western Sahara',
            ],   [
                'latitude' => '15.179384',
                'longitude' => '39.782334',
                'name' => 'Eritrea',
            ],   [
                'latitude' => '40.463667',
                'longitude' => '-3.74922',
                'name' => 'Spain',
            ],   [
                'latitude' => '9.145',
                'longitude' => '40.489673',
                'name' => 'Ethiopia',
            ],   [
                'latitude' => '61.92411',
                'longitude' => '25.748151',
                'name' => 'Finland',
            ],   [
                'latitude' => '-16.578193',
                'longitude' => '179.414413',
                'name' => 'Fiji',
            ],   [
                'latitude' => '-51.796253',
                'longitude' => '-59.523613',
                'name' => 'Falkland Islands [Islas Malvinas]',
            ],   [
                'latitude' => '7.425554',
                'longitude' => '150.550812',
                'name' => 'Micronesia',
            ],   [
                'latitude' => '61.892635',
                'longitude' => '-6.911806',
                'name' => 'Faroe Islands',
            ],   [
                'latitude' => '46.227638',
                'longitude' => '2.213749',
                'name' => 'France',
            ],   [
                'latitude' => '-0.803689',
                'longitude' => '11.609444',
                'name' => 'Gabon',
            ],   [
                'latitude' => '55.378051',
                'longitude' => '-3.435973',
                'name' => 'United Kingdom',
            ],   [
                'latitude' => '12.262776',
                'longitude' => '-61.604171',
                'name' => 'Grenada',
            ],   [
                'latitude' => '42.315407',
                'longitude' => '43.356892',
                'name' => 'Georgia',
            ],   [
                'latitude' => '3.933889',
                'longitude' => '-53.125782',
                'name' => 'French Guiana',
            ],   [
                'latitude' => '49.465691',
                'longitude' => '-2.585278',
                'name' => 'Guernsey',
            ],   [
                'latitude' => '7.946527',
                'longitude' => '-1.023194',
                'name' => 'Ghana',
            ],   [
                'latitude' => '36.137741',
                'longitude' => '-5.345374',
                'name' => 'Gibraltar',
            ],   [
                'latitude' => '71.706936',
                'longitude' => '-42.604303',
                'name' => 'Greenland',
            ],   [
                'latitude' => '13.443182',
                'longitude' => '-15.310139',
                'name' => 'Gambia',
            ],   [
                'latitude' => '9.945587',
                'longitude' => '-9.696645',
                'name' => 'Guinea',
            ],   [
                'latitude' => '16.995971',
                'longitude' => '-62.067641',
                'name' => 'Guadeloupe',
            ],   [
                'latitude' => '1.650801',
                'longitude' => '10.267895',
                'name' => 'Equatorial Guinea',
            ],   [
                'latitude' => '39.074208',
                'longitude' => '21.824312',
                'name' => 'Greece',
            ],   [
                'latitude' => '-54.429579',
                'longitude' => '-36.587909',
                'name' => 'South Georgia and the South Sandwich Islands',
            ],   [
                'latitude' => '15.783471',
                'longitude' => '-90.230759',
                'name' => 'Guatemala',
            ],   [
                'latitude' => '13.444304',
                'longitude' => '144.793731',
                'name' => 'Guam',
            ],   [
                'latitude' => '11.803749',
                'longitude' => '-15.180413',
                'name' => 'Guinea-Bissau',
            ],   [
                'latitude' => '4.860416',
                'longitude' => '-58.93018',
                'name' => 'Guyana',
            ],   [
                'latitude' => '31.354676',
                'longitude' => '34.308825',
                'name' => 'Gaza Strip',
            ],   [
                'latitude' => '22.396428',
                'longitude' => '114.109497',
                'name' => 'Hong Kong',
            ],   [
                'latitude' => '-53.08181',
                'longitude' => '73.504158',
                'name' => 'Heard Island and McDonald Islands',
            ],   [
                'latitude' => '15.199999',
                'longitude' => '-86.241905',
                'name' => 'Honduras',
            ],   [
                'latitude' => '45.1',
                'longitude' => '15.2',
                'name' => 'Croatia',
            ],   [
                'latitude' => '18.971187',
                'longitude' => '-72.285215',
                'name' => 'Haiti',
            ],   [
                'latitude' => '47.162494',
                'longitude' => '19.503304',
                'name' => 'Hungary',
            ],   [
                'latitude' => '-0.789275',
                'longitude' => '113.921327',
                'name' => 'Indonesia',
            ],   [
                'latitude' => '53.41291',
                'longitude' => '-8.24389',
                'name' => 'Ireland',
            ],   [
                'latitude' => '31.046051',
                'longitude' => '34.851612',
                'name' => 'Israel',
            ],   [
                'latitude' => '54.236107',
                'longitude' => '-4.548056',
                'name' => 'Isle of Man',
            ],   [
                'latitude' => '20.593684',
                'longitude' => '78.96288',
                'name' => 'India',
            ],   [
                'latitude' => '-6.343194',
                'longitude' => '71.876519',
                'name' => 'British Indian Ocean Territory',
            ],   [
                'latitude' => '33.223191',
                'longitude' => '43.679291',
                'name' => 'Iraq',
            ],   [
                'latitude' => '32.427908',
                'longitude' => '53.688046',
                'name' => 'Iran',
            ],   [
                'latitude' => '64.963051',
                'longitude' => '-19.020835',
                'name' => 'Iceland',
            ],   [
                'latitude' => '41.87194',
                'longitude' => '12.56738',
                'name' => 'Italy',
            ],   [
                'latitude' => '49.214439',
                'longitude' => '-2.13125',
                'name' => 'Jersey',
            ],   [
                'latitude' => '18.109581',
                'longitude' => '-77.297508',
                'name' => 'Jamaica',
            ],   [
                'latitude' => '30.585164',
                'longitude' => '36.238414',
                'name' => 'Jordan',
            ],   [
                'latitude' => '36.204824',
                'longitude' => '138.252924',
                'name' => 'Japan',
            ],   [
                'latitude' => '-0.023559',
                'longitude' => '37.906193',
                'name' => 'Kenya',
            ],   [
                'latitude' => '41.20438',
                'longitude' => '74.766098',
                'name' => 'Kyrgyzstan',
            ],   [
                'latitude' => '12.565679',
                'longitude' => '104.990963',
                'name' => 'Cambodia',
            ],   [
                'latitude' => '-3.370417',
                'longitude' => '-168.734039',
                'name' => 'Kiribati',
            ],   [
                'latitude' => '-11.875001',
                'longitude' => '43.872219',
                'name' => 'Comoros',
            ],   [
                'latitude' => '17.357822',
                'longitude' => '-62.782998',
                'name' => 'Saint Kitts and Nevis',
            ],   [
                'latitude' => '40.339852',
                'longitude' => '127.510093',
                'name' => 'North Korea',
            ],   [
                'latitude' => '35.907757',
                'longitude' => '127.766922',
                'name' => 'South Korea',
            ],   [
                'latitude' => '29.31166',
                'longitude' => '47.481766',
                'name' => 'Kuwait',
            ],   [
                'latitude' => '19.513469',
                'longitude' => '-80.566956',
                'name' => 'Cayman Islands',
            ],   [
                'latitude' => '48.019573',
                'longitude' => '66.923684',
                'name' => 'Kazakhstan',
            ],   [
                'latitude' => '19.85627',
                'longitude' => '102.495496',
                'name' => 'Laos',
            ],   [
                'latitude' => '33.854721',
                'longitude' => '35.862285',
                'name' => 'Lebanon',
            ],   [
                'latitude' => '13.909444',
                'longitude' => '-60.978893',
                'name' => 'Saint Lucia',
            ],   [
                'latitude' => '47.166',
                'longitude' => '9.555373',
                'name' => 'Liechtenstein',
            ],   [
                'latitude' => '7.873054',
                'longitude' => '80.771797',
                'name' => 'Sri Lanka',
            ],   [
                'latitude' => '6.428055',
                'longitude' => '-9.429499',
                'name' => 'Liberia',
            ],   [
                'latitude' => '-29.609988',
                'longitude' => '28.233608',
                'name' => 'Lesotho',
            ],   [
                'latitude' => '55.169438',
                'longitude' => '23.881275',
                'name' => 'Lithuania',
            ],   [
                'latitude' => '49.815273',
                'longitude' => '6.129583',
                'name' => 'Luxembourg',
            ],   [
                'latitude' => '56.879635',
                'longitude' => '24.603189',
                'name' => 'Latvia',
            ],   [
                'latitude' => '26.3351',
                'longitude' => '17.228331',
                'name' => 'Libya',
            ],   [
                'latitude' => '31.791702',
                'longitude' => '-7.09262',
                'name' => 'Morocco',
            ],   [
                'latitude' => '43.750298',
                'longitude' => '7.412841',
                'name' => 'Monaco',
            ],   [
                'latitude' => '47.411631',
                'longitude' => '28.369885',
                'name' => 'Moldova',
            ],   [
                'latitude' => '42.708678',
                'longitude' => '19.37439',
                'name' => 'Montenegro',
            ],   [
                'latitude' => '-18.766947',
                'longitude' => '46.869107',
                'name' => 'Madagascar',
            ],   [
                'latitude' => '7.131474',
                'longitude' => '171.184478',
                'name' => 'Marshall Islands',
            ],   [
                'latitude' => '41.608635',
                'longitude' => '21.745275',
                'name' => 'Macedonia [FYROM]',
            ],   [
                'latitude' => '17.570692',
                'longitude' => '-3.996166',
                'name' => 'Mali',
            ],   [
                'latitude' => '21.913965',
                'longitude' => '95.956223',
                'name' => 'Myanmar [Burma]',
            ],   [
                'latitude' => '46.862496',
                'longitude' => '103.846656',
                'name' => 'Mongolia',
            ],   [
                'latitude' => '22.198745',
                'longitude' => '113.543873',
                'name' => 'Macau',
            ],   [
                'latitude' => '17.33083',
                'longitude' => '145.38469',
                'name' => 'Northern Mariana Islands',
            ],   [
                'latitude' => '14.641528',
                'longitude' => '-61.024174',
                'name' => 'Martinique',
            ],   [
                'latitude' => '21.00789',
                'longitude' => '-10.940835',
                'name' => 'Mauritania',
            ],   [
                'latitude' => '16.742498',
                'longitude' => '-62.187366',
                'name' => 'Montserrat',
            ],   [
                'latitude' => '35.937496',
                'longitude' => '14.375416',
                'name' => 'Malta',
            ],   [
                'latitude' => '-20.348404',
                'longitude' => '57.552152',
                'name' => 'Mauritius',
            ],   [
                'latitude' => '3.202778',
                'longitude' => '73.22068',
                'name' => 'Maldives',
            ],   [
                'latitude' => '-13.254308',
                'longitude' => '34.301525',
                'name' => 'Malawi',
            ],   [
                'latitude' => '23.634501',
                'longitude' => '-102.552784',
                'name' => 'Mexico',
            ],   [
                'latitude' => '4.210484',
                'longitude' => '101.975766',
                'name' => 'Malaysia',
            ],   [
                'latitude' => '-18.665695',
                'longitude' => '35.529562',
                'name' => 'Mozambique',
            ],   [
                'latitude' => '-22.95764',
                'longitude' => '18.49041',
                'name' => 'Namibia',
            ],   [
                'latitude' => '-20.904305',
                'longitude' => '165.618042',
                'name' => 'New Caledonia',
            ],   [
                'latitude' => '17.607789',
                'longitude' => '8.081666',
                'name' => 'Niger',
            ],   [
                'latitude' => '-29.040835',
                'longitude' => '167.954712',
                'name' => 'Norfolk Island',
            ],   [
                'latitude' => '9.081999',
                'longitude' => '8.675277',
                'name' => 'Nigeria',
            ],   [
                'latitude' => '12.865416',
                'longitude' => '-85.207229',
                'name' => 'Nicaragua',
            ],   [
                'latitude' => '52.132633',
                'longitude' => '5.291266',
                'name' => 'Netherlands',
            ],   [
                'latitude' => '60.472024',
                'longitude' => '8.468946',
                'name' => 'Norway',
            ],   [
                'latitude' => '28.394857',
                'longitude' => '84.124008',
                'name' => 'Nepal',
            ],   [
                'latitude' => '-0.522778',
                'longitude' => '166.931503',
                'name' => 'Nauru',
            ],   [
                'latitude' => '-19.054445',
                'longitude' => '-169.867233',
                'name' => 'Niue',
            ],   [
                'latitude' => '-40.900557',
                'longitude' => '174.885971',
                'name' => 'New Zealand',
            ],   [
                'latitude' => '21.512583',
                'longitude' => '55.923255',
                'name' => 'Oman',
            ],   [
                'latitude' => '8.537981',
                'longitude' => '-80.782127',
                'name' => 'Panama',
            ],   [
                'latitude' => '-9.189967',
                'longitude' => '-75.015152',
                'name' => 'Peru',
            ],   [
                'latitude' => '-17.679742',
                'longitude' => '-149.406843',
                'name' => 'French Polynesia',
            ],   [
                'latitude' => '-6.314993',
                'longitude' => '143.95555',
                'name' => 'Papua New Guinea',
            ],   [
                'latitude' => '12.879721',
                'longitude' => '121.774017',
                'name' => 'Philippines',
            ],   [
                'latitude' => '30.375321',
                'longitude' => '69.345116',
                'name' => 'Pakistan',
            ],   [
                'latitude' => '51.919438',
                'longitude' => '19.145136',
                'name' => 'Poland',
            ],   [
                'latitude' => '46.941936',
                'longitude' => '-56.27111',
                'name' => 'Saint Pierre and Miquelon',
            ],   [
                'latitude' => '-24.703615',
                'longitude' => '-127.439308',
                'name' => 'Pitcairn Islands',
            ],   [
                'latitude' => '18.220833',
                'longitude' => '-66.590149',
                'name' => 'Puerto Rico',
            ],   [
                'latitude' => '31.952162',
                'longitude' => '35.233154',
                'name' => 'Palestinian Territories',
            ],   [
                'latitude' => '39.399872',
                'longitude' => '-8.224454',
                'name' => 'Portugal',
            ],   [
                'latitude' => '7.51498',
                'longitude' => '134.58252',
                'name' => 'Palau',
            ],   [
                'latitude' => '-23.442503',
                'longitude' => '-58.443832',
                'name' => 'Paraguay',
            ],   [
                'latitude' => '25.354826',
                'longitude' => '51.183884',
                'name' => 'Qatar',
            ],   [
                'latitude' => '-21.115141',
                'longitude' => '55.536384',
                'name' => 'R?union',
            ],   [
                'latitude' => '45.943161',
                'longitude' => '24.96676',
                'name' => 'Romania',
            ],   [
                'latitude' => '44.016521',
                'longitude' => '21.005859',
                'name' => 'Serbia',
            ],   [
                'latitude' => '61.52401',
                'longitude' => '105.318756',
                'name' => 'Russia',
            ],   [
                'latitude' => '-1.940278',
                'longitude' => '29.873888',
                'name' => 'Rwanda',
            ],   [
                'latitude' => '23.885942',
                'longitude' => '45.079162s',
                'name' => 'Saudi Arabia',
            ],   [
                'latitude' => '-9.64571',
                'longitude' => '160.156194',
                'name' => 'Solomon Islands',
            ],   [
                'latitude' => '-4.679574',
                'longitude' => '55.491977',
                'name' => 'Seychelles',
            ],   [
                'latitude' => '12.862807',
                'longitude' => '30.217636',
                'name' => 'Sudan',
            ],   [
                'latitude' => '60.128161',
                'longitude' => '18.643501',
                'name' => 'Sweden',
            ],   [
                'latitude' => '1.352083',
                'longitude' => '103.819836',
                'name' => 'Singapore',
            ],   [
                'latitude' => '-24.143474',
                'longitude' => '-10.030696',
                'name' => 'Saint Helena',
            ],   [
                'latitude' => '46.151241',
                'longitude' => '14.995463',
                'name' => 'Slovenia',
            ],   [
                'latitude' => '77.553604',
                'longitude' => '23.670272',
                'name' => 'Svalbard and Jan Mayen',
            ],   [
                'latitude' => '48.669026',
                'longitude' => '19.699024',
                'name' => 'Slovakia (Slovak Republic)',
            ],   [
                'latitude' => '8.460555',
                'longitude' => '-11.779889',
                'name' => 'Sierra Leone',
            ],   [
                'latitude' => '43.94236',
                'longitude' => '12.457777',
                'name' => 'San Marino',
            ],   [
                'latitude' => '14.497401',
                'longitude' => '-14.452362',
                'name' => 'Senegal',
            ],   [
                'latitude' => '5.152149',
                'longitude' => '46.199616',
                'name' => 'Somalia',
            ],   [
                'latitude' => '3.919305',
                'longitude' => '-56.027783',
                'name' => 'Suriname',
            ],   [
                'latitude' => '0.18636',
                'longitude' => '6.613081',
                'name' => 'S?o Tom? and Pr?ncipe',
            ],   [
                'latitude' => '13.794185',
                'longitude' => '-88.89653',
                'name' => 'El Salvador',
            ],   [
                'latitude' => '34.802075',
                'longitude' => '38.996815',
                'name' => 'Syria',
            ],   [
                'latitude' => '-26.522503',
                'longitude' => '31.465866',
                'name' => 'Swaziland',
            ],   [
                'latitude' => '21.694025',
                'longitude' => '-71.797928',
                'name' => 'Turks and Caicos Islands',
            ],   [
                'latitude' => '15.454166',
                'longitude' => '18.732207',
                'name' => 'Chad',
            ],   [
                'latitude' => '-49.280366',
                'longitude' => '69.348557',
                'name' => 'French Southern Territories',
            ],   [
                'latitude' => '8.619543',
                'longitude' => '0.824782',
                'name' => 'Togo',
            ],   [
                'latitude' => '15.870032',
                'longitude' => '100.992541',
                'name' => 'Thailand',
            ],   [
                'latitude' => '38.861034',
                'longitude' => '71.276093',
                'name' => 'Tajikistan',
            ],   [
                'latitude' => '-8.967363',
                'longitude' => '-171.855881',
                'name' => 'Tokelau',
            ],   [
                'latitude' => '-8.874217',
                'longitude' => '125.727539',
                'name' => 'Timor-Leste',
            ],   [
                'latitude' => '38.969719',
                'longitude' => '59.556278',
                'name' => 'Turkmenistan',
            ],   [
                'latitude' => '33.886917',
                'longitude' => '9.537499',
                'name' => 'Tunisia',
            ],   [
                'latitude' => '-21.178986',
                'longitude' => '-175.198242',
                'name' => 'Tonga',
            ],   [
                'latitude' => '38.963745',
                'longitude' => '35.243322',
                'name' => 'Turkey',
            ],   [
                'latitude' => '10.691803',
                'longitude' => '-61.222503',
                'name' => 'Trinidad and Tobago',
            ],   [
                'latitude' => '-7.109535',
                'longitude' => '177.64933',
                'name' => 'Tuvalu',
            ],   [
                'latitude' => '23.69781',
                'longitude' => '120.960515',
                'name' => 'Taiwan',
            ],   [
                'latitude' => '-6.369028',
                'longitude' => '34.888822',
                'name' => 'Tanzania',
            ],   [
                'latitude' => '48.379433',
                'longitude' => '31.16558',
                'name' => 'Ukraine',
            ],   [
                'latitude' => '1.373333',
                'longitude' => '32.290275',
                'name' => 'Uganda',
            ],   [
                'latitude' => '37.09024',
                'longitude' => '-95.712891',
                'name' => 'United States',
            ],   [
                'latitude' => '-32.522779',
                'longitude' => '-55.765835',
                'name' => 'Uruguay',
            ],   [
                'latitude' => '41.377491',
                'longitude' => '64.585262',
                'name' => 'Uzbekistan',
            ],   [
                'latitude' => '41.902916',
                'longitude' => '12.453389',
                'name' => 'Vatican City',
            ],   [
                'latitude' => '12.984305',
                'longitude' => '-61.287228',
                'name' => 'Saint Vincent and the Grenadines',
            ],   [
                'latitude' => '6.42375',
                'longitude' => '-66.58973',
                'name' => 'Venezuela',
            ],   [
                'latitude' => '18.420695',
                'longitude' => '-64.639968',
                'name' => 'British Virgin Islands',
            ],   [
                'latitude' => '18.335765',
                'longitude' => '-64.896335',
                'name' => 'U.S. Virgin Islands',
            ],   [
                'latitude' => '14.058324',
                'longitude' => '108.277199',
                'name' => '18.335765',
            ],   [
                'latitude' => '-15.376706',
                'longitude' => '166.959158',
                'name' => 'Vanuatu',
            ],   [
                'latitude' => '-13.768752',
                'longitude' => '-177.156097',
                'name' => 'Wallis and Futuna',
            ],   [
                'latitude' => '-13.759029',
                'longitude' => '-172.104629',
                'name' => 'Samoa',
            ],   [
                'latitude' => '42.602636',
                'longitude' => '20.902977',
                'name' => 'Kosovo',
            ],   [
                'latitude' => '15.552727',
                'longitude' => '48.516388',
                'name' => 'Yemen',
            ],   [
                'latitude' => '-12.8275',
                'longitude' => '45.166244',
                'name' => 'Mayotte',
            ],   [
                'latitude' => '-30.559482',
                'longitude' => '22.937506',
                'name' => 'South Africa',
            ],   [
                'latitude' => '-13.133897',
                'longitude' => '27.849332',
                'name' => 'Zambia',
            ],   [
                'latitude' => '-19.015438',
                'longitude' => '29.154857',
                'name' => 'Zimbabwe',
            ],
        ]);
    }
}
