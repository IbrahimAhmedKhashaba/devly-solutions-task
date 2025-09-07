<?php 

namespace App\Services\Profile;

use App\Interfaces\Repositories\Profile\ProfileRepositoryInterface;
use App\Interfaces\Services\Profile\ProfileServiceInterface;

class ProfileService implements ProfileServiceInterface
{
    private $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository){
        $this->profileRepository = $profileRepository;
    }
    public function getProfile(){
        return $this->profileRepository->getProfile();
    }
    public function update($data){
        return $this->profileRepository->update($data);
    }

    public function updatePassword($password){
        return $this->profileRepository->updatePassword($password);
    }
}