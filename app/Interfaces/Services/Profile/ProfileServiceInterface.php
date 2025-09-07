<?php 

namespace App\Interfaces\Services\Profile;


interface ProfileServiceInterface
{
    public function getProfile();
    public function update($data);
    public function updatePassword($password);
}