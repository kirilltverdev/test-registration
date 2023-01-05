<?php

namespace App\Http\Services;

use App\Models\Phone;
use App\Models\User;

/**
 * Class UserService
 * @package App\Http\Services
 */
class UserService
{
    private PhoneService $phoneService;
    private CountryService $countryService;

    public function __construct(PhoneService $phoneService, CountryService $countryService)
    {
        $this->phoneService = $phoneService;
        $this->countryService = $countryService;
    }

    /**
     * @return User
     */
    public function create(array $data)
    {
        $userData = [
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => bcrypt($data['password'])
        ];

        $user = new User($userData);
        $user->save();

        return $user;
    }

    public function createOnRegister(array $data)
    {
        $user = $this->create($data);
        $country = $this->countryService->create($data['country']);
        $phone = $this->phoneService->create($data);

        $this->phoneService->associateCountry($phone, $country);
        $this->phoneService->associateUser($phone, $user);

        return $user;
    }
}
