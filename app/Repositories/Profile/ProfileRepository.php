<?php 

namespace App\Repositories\Profile;

use App\Interfaces\Repositories\Profile\ProfileRepositoryInterface;


class ProfileRepository implements ProfileRepositoryInterface
{
    public function getProfile(){
        $user = auth()->user() ?? auth('sanctum')->user();
        return $user;
    }
    public function update($data){
        $user = auth()->user() ?? auth('sanctum')->user();
        $user->update($data);
        return $user;
    }
    public function updatePassword($password){
        $user = auth()->user() ?? auth('sanctum')->user();
        $user->update(['password' => bcrypt($password)]);
        return $user;
    }
}