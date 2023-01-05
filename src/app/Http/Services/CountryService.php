<?php

namespace App\Http\Services;

use App\Models\Country;
use App\Models\User;

/**
 * Class UserService
 * @package App\Http\Services
 */
class CountryService
{
    /**
     * @param array $data
     * @return Country
     */
    public function create(array $data): Country
    {
        $countryData = [
            "name" => $data['name'],
            "idd" => $data['idd'],
        ];

        $country = Country::firstOrCreate($countryData);
        $country->save();

        return $country;
    }
}
