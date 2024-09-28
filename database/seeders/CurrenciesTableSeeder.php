<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            [
                'code_alphabetic' => 'ALL',
                'code_numeric' => '008',
                'decimal_digits' => 0,
                'name' => 'Albanian Lek',
                'name_plural' => 'Albanian lekë',
                'rounding' => 0,
                'symbol' => 'ALL',
                'symbol_native' => 'Lek'
            ],
            [
                'code_alphabetic' => 'AMD',
                'code_numeric' => '051',
                'decimal_digits' => 0,
                'name' => 'Armenian Dram',
                'name_plural' => 'Armenian drams',
                'rounding' => 0,
                'symbol' => 'AMD',
                'symbol_native' => 'դր.'
            ],
            [
                'code_alphabetic' => 'BAM',
                'code_numeric' => '977',
                'decimal_digits' => 2,
                'name' => 'Bosnia-Herzegovina Convertible Mark',
                'name_plural' => 'Bosnia-Herzegovina convertible marks',
                'rounding' => 0,
                'symbol' => 'KM',
                'symbol_native' => 'KM'
            ],
            [
                'code_alphabetic' => 'BGN',
                'code_numeric' => '975',
                'decimal_digits' => 2,
                'name' => 'Bulgarian Lev',
                'name_plural' => 'Bulgarian leva',
                'rounding' => 0,
                'symbol' => 'BGN',
                'symbol_native' => 'лв.'
            ],
            [
                'code_alphabetic' => 'BYN',
                'code_numeric' => '933',
                'decimal_digits' => 2,
                'name' => 'Belarusian Ruble',
                'name_plural' => 'Belarusian rubles',
                'rounding' => 0,
                'symbol' => 'Br',
                'symbol_native' => 'руб.'
            ],
            [
                'code_alphabetic' => 'CHF',
                'code_numeric' => '756',
                'decimal_digits' => 2,
                'name' => 'Swiss Franc',
                'name_plural' => 'Swiss francs',
                'rounding' => 0.05,
                'symbol' => 'CHF',
                'symbol_native' => 'CHF'
            ],
            [
                'code_alphabetic' => 'CZK',
                'code_numeric' => '203',
                'decimal_digits' => 2,
                'name' => 'Czech Republic Koruna',
                'name_plural' => 'Czech Republic korunas',
                'rounding' => 0,
                'symbol' => 'Kč',
                'symbol_native' => 'Kč'
            ],
            [
                'code_alphabetic' => 'DKK',
                'code_numeric' => '208',
                'decimal_digits' => 2,
                'name' => 'Danish Krone',
                'name_plural' => 'Danish kroner',
                'rounding' => 0,
                'symbol' => 'Dkr',
                'symbol_native' => 'kr'
            ],
            [
                'code_alphabetic' => 'EUR',
                'code_numeric' => '978',
                'decimal_digits' => 2,
                'name' => 'Euro',
                'name_plural' => 'euros',
                'rounding' => 0,
                'symbol' => '€',
                'symbol_native' => '€'
            ],
            [
                'code_alphabetic' => 'GBP',
                'code_numeric' => '826',
                'decimal_digits' => 2,
                'name' => 'British Pound Sterling',
                'name_plural' => 'British pounds sterling',
                'rounding' => 0,
                'symbol' => '£',
                'symbol_native' => '£'
            ],
            [
                'code_alphabetic' => 'GEL',
                'code_numeric' => '981',
                'decimal_digits' => 2,
                'name' => 'Georgian Lari',
                'name_plural' => 'Georgian laris',
                'rounding' => 0,
                'symbol' => 'GEL',
                'symbol_native' => 'GEL'
            ],
            [
                'code_alphabetic' => 'HRK',
                'code_numeric' => '191',
                'decimal_digits' => 2,
                'name' => 'Croatian Kuna',
                'name_plural' => 'Croatian kunas',
                'rounding' => 0,
                'symbol' => 'kn',
                'symbol_native' => 'kn'
            ],
            [
                'code_alphabetic' => 'HUF',
                'code_numeric' => '348',
                'decimal_digits' => 0,
                'name' => 'Hungarian Forint',
                'name_plural' => 'Hungarian forints',
                'rounding' => 0,
                'symbol' => 'Ft',
                'symbol_native' => 'Ft'
            ],
            [
                'code_alphabetic' => 'MDL',
                'code_numeric' => '498',
                'decimal_digits' => 2,
                'name' => 'Moldovan Leu',
                'name_plural' => 'Moldovan lei',
                'rounding' => 0,
                'symbol' => 'MDL',
                'symbol_native' => 'MDL'
            ],
            [
                'code_alphabetic' => 'MKD',
                'code_numeric' => '807',
                'decimal_digits' => 2,
                'name' => 'Macedonian Denar',
                'name_plural' => 'Macedonian denari',
                'rounding' => 0,
                'symbol' => 'MKD',
                'symbol_native' => 'MKD'
            ],
            [
                'code_alphabetic' => 'PLN',
                'code_numeric' => '985',
                'decimal_digits' => 2,
                'name' => 'Polish Zloty',
                'name_plural' => 'Polish zlotys',
                'rounding' => 0,
                'symbol' => 'zł',
                'symbol_native' => 'zł'
            ],
            [
                'code_alphabetic' => 'RON',
                'code_numeric' => '946',
                'decimal_digits' => 2,
                'name' => 'Romanian Leu',
                'name_plural' => 'Romanian lei',
                'rounding' => 0,
                'symbol' => 'RON',
                'symbol_native' => 'RON'
            ],
            [
                'code_alphabetic' => 'RSD',
                'code_numeric' => '941',
                'decimal_digits' => 0,
                'name' => 'Serbian Dinar',
                'name_plural' => 'Serbian dinars',
                'rounding' => 0,
                'symbol' => 'din.',
                'symbol_native' => 'дин.'
            ],
            [
                'code_alphabetic' => 'RUB',
                'code_numeric' => '643',
                'decimal_digits' => 2,
                'name' => 'Russian Ruble',
                'name_plural' => 'Russian rubles',
                'rounding' => 0,
                'symbol' => 'RUB',
                'symbol_native' => '₽.'
            ],
            [
                'code_alphabetic' => 'SEK',
                'code_numeric' => '752',
                'decimal_digits' => 2,
                'name' => 'Swedish Krona',
                'name_plural' => 'Swedish kronor',
                'rounding' => 0,
                'symbol' => 'Skr',
                'symbol_native' => 'kr'
            ],
            [
                'code_alphabetic' => 'TRY',
                'code_numeric' => '949',
                'decimal_digits' => 2,
                'name' => 'Turkish Lira',
                'name_plural' => 'Turkish Lira',
                'rounding' => 0,
                'symbol' => 'TL',
                'symbol_native' => 'TL'
            ],
            [
                'code_alphabetic' => 'UAH',
                'code_numeric' => '980',
                'decimal_digits' => 2,
                'name' => 'Ukrainian Hryvnia',
                'name_plural' => 'Ukrainian hryvnias',
                'rounding' => 0,
                'symbol' => '₴',
                'symbol_native' => '₴'
            ],
        ]);
    }
}
