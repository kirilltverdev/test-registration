<?php

namespace App\Http\Services;

use App\Models\Country;
use App\Models\Phone;
use App\Models\User;

/**
 * Class UserService
 * @package App\Http\Services
 */
class PhoneService
{
    /**
     * @return Phone
     */
    public function create(array $data)
    {
        $phoneData = [
            "phone" => $data['phone'],
        ];

        $phone = new Phone($phoneData);
        $phone->save();

        return $phone;
    }

    /**
     * @param Phone $phone
     * @param User $user
     * @return Phone
     */
    public function associateUser(Phone $phone, User $user): Phone
    {
        $phone->user()->associate($user);
        $phone->save();

        return $phone;
    }

    /**
     * @param Phone $phone
     * @param Country $country
     * @return Phone
     */
    public function associateCountry(Phone $phone, Country $country): Phone
    {
        $phone->country()->associate($country);
        $phone->save();

        return $phone;
    }
}
