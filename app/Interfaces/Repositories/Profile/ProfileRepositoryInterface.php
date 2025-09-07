<?php 

namespace App\Interfaces\Repositories\Profile;


interface ProfileRepositoryInterface
{
    public function getProfile();
    public function update($data);
    public function updatePassword($password);
}