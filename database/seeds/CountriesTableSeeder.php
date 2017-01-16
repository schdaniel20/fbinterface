<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    protected $countries ='[
        {
            "countryID" : 1,
            "country" : "Romania",
            "lnd_lkz" : "RO"
        },
        {
            "countryID" : 2,
            "country" : "Germany",
            "lnd_lkz" : "D"
        },
        {
            "countryID" : 3,
            "country" : "Hungary",
            "lnd_lkz" : "HU"
        },
        {
            "countryID" : 4,
            "country" : "Austria",
            "lnd_lkz" : "A2"
        },
        {
            "countryID" : 5,
            "country" : "Portugal",
            "lnd_lkz" : "P"
        },
        {
            "countryID" : 6,
            "country" : "France",
            "lnd_lkz" : "F"
        },
        {
            "countryID" : 7,
            "country" : "United Kingdom",
            "lnd_lkz" : "GB"
        },
        {
            "countryID" : 8,
            "country" : "USA",
            "lnd_lkz" : "USA"
        },
        {
            "countryID" : 9,
            "country" : "South Africa",
            "lnd_lkz" : "ZA"
        },
        {
            "countryID" : 10,
            "country" : "Canada",
            "lnd_lkz" : "CDN"
        },
        {
            "countryID" : 11,
            "country" : "Australia",
            "lnd_lkz" : "AUS"
        },
        {
            "countryID" : 12,
            "country" : "Poland",
            "lnd_lkz" : "PL"
        },
        {
            "countryID" : 13,
            "country" : "Italy",
            "lnd_lkz" : "I"
        },
        {
            "countryID" : 14,
            "country" : "India",
            "lnd_lkz" : "IND"
        },
        {
            "countryID" : 15,
            "country" : "Spain",
            "lnd_lkz" : "E"
        },
        {
            "countryID" : 16,
            "country" : "Switzerland",
            "lnd_lkz" : "CH"
        },
        {
            "countryID" : 17,
            "country" : "master",
            "lnd_lkz" : "HU"
        },
        {
            "countryID" : 18,
            "country" : "Brasil",
            "lnd_lkz" : "BR"
        },
        {
            "countryID" : 19,
            "country" : "Netherlands",
            "lnd_lkz" : "NL"
        },
        {
            "countryID" : 20,
            "country" : "Sweden",
            "lnd_lkz" : "SE"
        },
        {
            "countryID" : 21,
            "country" : "Mexico",
            "lnd_lkz" : "MX"
        },
        {
            "countryID" : 22,
            "country" : "Colombia",
            "lnd_lkz" : "CO"
        },
        {
            "countryID" : 23,
            "country" : "Argentina",
            "lnd_lkz" : "AR"
        },
        {
            "countryID" : 24,
            "country" : "Peru",
            "lnd_lkz" : "PE"
        },
        {
            "countryID" : 25,
            "country" : "Venezuela",
            "lnd_lkz" : "VE"
        },
        {
            "countryID" : 26,
            "country" : "Florida",
            "lnd_lkz" : "UFL"
        },
        {
            "countryID" : 27,
            "country" : "Illinois",
            "lnd_lkz" : "UIL"
        },
        {
            "countryID" : 28,
            "country" : "Ohio",
            "lnd_lkz" : "UOH"
        },
        {
            "countryID" : 29,
            "country" : "Pennsylvania",
            "lnd_lkz" : "UPE"
        },
        {
            "countryID" : 30,
            "country" : "Ireland",
            "lnd_lkz" : "IE"
        },
        {
            "countryID" : 31,
            "country" : "Slovakia",
            "lnd_lkz" : "SK"
        },
        {
            "countryID" : 32,
            "country" : "New Zealand",
            "lnd_lkz" : "NZ"
        },
        {
            "countryID" : 33,
            "country" : "Norway",
            "lnd_lkz" : "NO"
        },
        {
            "countryID" : 34,
            "country" : "Chile",
            "lnd_lkz" : "CL"
        },
        {
            "countryID" : 35,
            "country" : "Greece",
            "lnd_lkz" : "GR"
        },
        {
            "countryID" : 36,
            "country" : "Denmark",
            "lnd_lkz" : "DK"
        },
        {
            "countryID" : 37,
            "country" : "Czech Republic",
            "lnd_lkz" : "CZ"
        },
        {
            "countryID" : 38,
            "country" : "Finland",
            "lnd_lkz" : "FIN"
        }
    ]';
    
    
    public function run()
    {
        $this->countries = json_decode($this->countries, true);
        foreach($this->countries as $country)
        {
            DB::table('countries')->insert([
                'countryID' => $country['countryID'],
                'country' => $country['country'],
                'iso_codes' => $country['lnd_lkz'],
            ]);
        }
    }
}
