<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'calling_code' => '376',
                'capital_city' => 'Andorra la Vella',
                'code_2' => 'ad',
                'code_3' => 'and',
                'currency_id' => 'eur',
                'flag' => '🇦🇩',
                'name' => 'Andorra'
            ],
            [
                'calling_code' => '355',
                'capital_city' => 'Tirana',
                'code_2' => 'al',
                'code_3' => 'alb',
                'currency_id' => 'all',
                'flag' => '🇦🇱',
                'name' => 'Albania'
            ],
            [
                'calling_code' => '43',
                'capital_city' => 'Vienna',
                'code_2' => 'at',
                'code_3' => 'aut',
                'currency_id' => 'eur',
                'flag' => '🇦🇹',
                'name' => 'Austria'
            ],
            [
                'calling_code' => '358',
                'capital_city' => 'Mariehamn',
                'code_2' => 'ax',
                'code_3' => 'ala',
                'currency_id' => 'eur',
                'flag' => '🇦🇽',
                'name' => 'Aland Islands'
            ],
            [
                'calling_code' => '387',
                'capital_city' => 'Sarajevo',
                'code_2' => 'ba',
                'code_3' => 'bih',
                'currency_id' => 'bam',
                'flag' => '🇧🇦',
                'name' => 'Bosnia and Herzegovina'
            ],
            [
                'calling_code' => '32',
                'capital_city' => 'Brussels',
                'code_2' => 'be',
                'code_3' => 'bel',
                'currency_id' => 'eur',
                'flag' => '🇧🇪',
                'name' => 'Belgium'
            ],
            [
                'calling_code' => '359',
                'capital_city' => 'Sofia',
                'code_2' => 'bg',
                'code_3' => 'bgr',
                'currency_id' => 'bgn',
                'flag' => '🇧🇬',
                'name' => 'Bulgaria'
            ],
            [
                'calling_code' => '375',
                'capital_city' => 'Minsk',
                'code_2' => 'by',
                'code_3' => 'blr',
                'currency_id' => 'byn',
                'flag' => '🇧🇾',
                'name' => 'Belarus'
            ],
            [
                'calling_code' => '41',
                'capital_city' => 'Bern',
                'code_2' => 'ch',
                'code_3' => 'che',
                'currency_id' => 'chf',
                'flag' => '🇨🇭',
                'name' => 'Switzerland'
            ],
            [
                'calling_code' => '420',
                'capital_city' => 'Prague',
                'code_2' => 'cz',
                'code_3' => 'cze',
                'currency_id' => 'czk',
                'flag' => '🇨🇿',
                'name' => 'Czech Republic'
            ],
            [
                'calling_code' => '49',
                'capital_city' => 'Berlin',
                'code_2' => 'de',
                'code_3' => 'deu',
                'currency_id' => 'eur',
                'flag' => '🇩🇪',
                'name' => 'Germany'
            ],
            [
                'calling_code' => '45',
                'capital_city' => 'Copenhagen',
                'code_2' => 'dk',
                'code_3' => 'dnk',
                'currency_id' => 'dkk',
                'flag' => '🇩🇰',
                'name' => 'Denmark'
            ],
            [
                'calling_code' => '372',
                'capital_city' => 'Tallinn',
                'code_2' => 'ee',
                'code_3' => 'est',
                'currency_id' => 'eur',
                'flag' => '🇪🇪',
                'name' => 'Estonia'
            ],
            [
                'calling_code' => '34',
                'capital_city' => 'Madrid',
                'code_2' => 'es',
                'code_3' => 'esp',
                'currency_id' => 'eur',
                'flag' => '🇪🇸',
                'name' => 'Spain'
            ],
            [
                'calling_code' => '358',
                'capital_city' => 'Helsinki',
                'code_2' => 'fi',
                'code_3' => 'fin',
                'currency_id' => 'eur',
                'flag' => '🇫🇮',
                'name' => 'Finland'
            ],
            [
                'calling_code' => '33',
                'capital_city' => 'Paris',
                'code_2' => 'fr',
                'code_3' => 'fra',
                'currency_id' => 'eur',
                'flag' => '🇫🇷',
                'name' => 'France'
            ],
            [
                'calling_code' => '44',
                'capital_city' => 'London',
                'code_2' => 'gb',
                'code_3' => 'gbr',
                'currency_id' => 'gbp',
                'flag' => '🇬🇧',
                'name' => 'United Kingdom'
            ],
            [
                'calling_code' => '44',
                'capital_city' => 'St Peter Port',
                'code_2' => 'gg',
                'code_3' => 'ggy',
                'currency_id' => 'gbp',
                'flag' => '🇬🇬',
                'name' => 'Guernsey'
            ],
            [
                'calling_code' => '30',
                'capital_city' => 'Athens',
                'code_2' => 'gr',
                'code_3' => 'grc',
                'currency_id' => 'eur',
                'flag' => '🇬🇷',
                'name' => 'Greece'
            ],
            [
                'calling_code' => '385',
                'capital_city' => 'Zagreb',
                'code_2' => 'hr',
                'code_3' => 'hrv',
                'currency_id' => 'hrk',
                'flag' => '🇭🇷',
                'name' => 'Croatia'
            ],
            [
                'calling_code' => '36',
                'capital_city' => 'Budapest',
                'code_2' => 'hu',
                'code_3' => 'hun',
                'currency_id' => 'huf',
                'flag' => '🇭🇺',
                'name' => 'Hungary'
            ],
            [
                'calling_code' => '354',
                'capital_city' => 'Reykjavik',
                'code_2' => 'is',
                'code_3' => 'isl',
                'currency_id' => 'isk',
                'flag' => '🇮🇸',
                'name' => 'Iceland'
            ],
            [
                'calling_code' => '39',
                'capital_city' => 'Rome',
                'code_2' => 'it',
                'code_3' => 'ita',
                'currency_id' => 'eur',
                'flag' => '🇮🇹',
                'name' => 'Italy'
            ],
            [
                'calling_code' => '44',
                'capital_city' => 'Saint Helier',
                'code_2' => 'je',
                'code_3' => 'jey',
                'currency_id' => 'gbp',
                'flag' => '🇯🇪',
                'name' => 'Jersey'
            ],
            [
                'calling_code' => '423',
                'capital_city' => 'Vaduz',
                'code_2' => 'li',
                'code_3' => 'lie',
                'currency_id' => 'chf',
                'flag' => '🇱🇮',
                'name' => 'Liechtenstein'
            ],
            [
                'calling_code' => '370',
                'capital_city' => 'Vilnius',
                'code_2' => 'lt',
                'code_3' => 'ltu',
                'currency_id' => 'ltl',
                'flag' => '🇱🇹',
                'name' => 'Lithuania'
            ],
            [
                'calling_code' => '352',
                'capital_city' => 'Luxembourg',
                'code_2' => 'lu',
                'code_3' => 'lux',
                'currency_id' => 'eur',
                'flag' => '🇱🇺',
                'name' => 'Luxembourg'
            ],
            [
                'calling_code' => '371',
                'capital_city' => 'Riga',
                'code_2' => 'lv',
                'code_3' => 'lva',
                'currency_id' => 'eur',
                'flag' => '🇱🇻',
                'name' => 'Latvia'
            ],
            [
                'calling_code' => '377',
                'capital_city' => 'Monaco',
                'code_2' => 'mc',
                'code_3' => 'mco',
                'currency_id' => 'eur',
                'flag' => '🇲🇨',
                'name' => 'Monaco'
            ],
            [
                'calling_code' => '373',
                'capital_city' => 'Chisinau',
                'code_2' => 'md',
                'code_3' => 'mda',
                'currency_id' => 'mdl',
                'flag' => '🇲🇩',
                'name' => 'Moldova'
            ],
            [
                'calling_code' => '382',
                'capital_city' => 'Podgorica',
                'code_2' => 'me',
                'code_3' => 'mne',
                'currency_id' => 'eur',
                'flag' => '🇲🇪',
                'name' => 'Montenegro'
            ],
            [
                'calling_code' => '389',
                'capital_city' => 'Skopje',
                'code_2' => 'mk',
                'code_3' => 'mkd',
                'currency_id' => 'mkd',
                'flag' => '🇲🇰',
                'name' => 'North Macedonia'
            ],
            [
                'calling_code' => '31',
                'capital_city' => 'Amsterdam',
                'code_2' => 'nl',
                'code_3' => 'nld',
                'currency_id' => 'eur',
                'flag' => '🇳🇱',
                'name' => 'Netherlands'
            ],
            [
                'calling_code' => '47',
                'capital_city' => 'Oslo',
                'code_2' => 'no',
                'code_3' => 'nor',
                'currency_id' => 'nok',
                'flag' => '🇳🇴',
                'name' => 'Norway'
            ],
            [
                'calling_code' => '48',
                'capital_city' => 'Warsaw',
                'code_2' => 'pl',
                'code_3' => 'pol',
                'currency_id' => 'pln',
                'flag' => '🇵🇱',
                'name' => 'Poland'
            ],
            [
                'calling_code' => '351',
                'capital_city' => 'Lisbon',
                'code_2' => 'pt',
                'code_3' => 'prt',
                'currency_id' => 'eur',
                'flag' => '🇵🇹',
                'name' => 'Portugal'
            ],
            [
                'calling_code' => '40',
                'capital_city' => 'Bucharest',
                'code_2' => 'ro',
                'code_3' => 'rou',
                'currency_id' => 'ron',
                'flag' => '🇷🇴',
                'name' => 'Romania'
            ],
            [
                'calling_code' => '381',
                'capital_city' => 'Belgrade',
                'code_2' => 'rs',
                'code_3' => 'srb',
                'currency_id' => 'rsd',
                'flag' => '🇷🇸',
                'name' => 'Serbia'
            ],
            [
                'calling_code' => '46',
                'capital_city' => 'Stockholm',
                'code_2' => 'se',
                'code_3' => 'swe',
                'currency_id' => 'sek',
                'flag' => '🇸🇪',
                'name' => 'Sweden'
            ],
            [
                'calling_code' => '386',
                'capital_city' => 'Ljubljana',
                'code_2' => 'si',
                'code_3' => 'svn',
                'currency_id' => 'eur',
                'flag' => '🇸🇮',
                'name' => 'Slovenia'
            ],
            [
                'calling_code' => '421',
                'capital_city' => 'Bratislava',
                'code_2' => 'sk',
                'code_3' => 'svk',
                'currency_id' => 'eur',
                'flag' => '🇸🇰',
                'name' => 'Slovakia'
            ],
            [
                'calling_code' => '378',
                'capital_city' => 'San Marino',
                'code_2' => 'sm',
                'code_3' => 'smr',
                'currency_id' => 'eur',
                'flag' => '🇸🇲',
                'name' => 'San Marino'
            ],
            [
                'calling_code' => '47',
                'capital_city' => 'Longyearbyen',
                'code_2' => 'sj',
                'code_3' => 'sjm',
                'currency_id' => 'nok',
                'flag' => '🇸🇯',
                'name' => 'Svalbard and Jan Mayen'
            ],
            [
                'calling_code' => '383',
                'capital_city' => 'Pristina',
                'code_2' => 'xk',
                'code_3' => 'xkx',
                'currency_id' => 'eur',
                'flag' => '🇽🇰',
                'name' => 'Kosovo'
            ],
        ]);
    }
}
