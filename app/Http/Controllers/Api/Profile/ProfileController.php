<?php 

namespace App\Http\Controllers\Api\Profile;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Http\Resources\Admin\AdminResource;
use App\Interfaces\Services\Profile\ProfileServiceInterface;

class ProfileController extends Controller
{
    private $profileServices;


    public function __construct(ProfileServiceInterface $profileServices)
    {
        $this->profileServices = $profileServices;
    }

    public function index(){
        $user = $this->profileServices->getProfile();
        return ApiResponse::success([
            'user' => new AdminResource($user)
        ] , 'Data fetched successfully' , 200);
    }
    public function update(ProfileRequest $request)
    {
        //
        $res = $this->profileServices->update($request->all());
        return $res ? ApiResponse::success([], 'Profile updated successfully') : ApiResponse::error('Something went wrong', 500);

    }
    public function updatePassword(ProfileRequest $request)
    {
        //
        $res = $this->profileServices->updatePassword($request->password);
        return $res ? ApiResponse::success([], 'Password updated successfully') : ApiResponse::error('Something went wrong', 500);
    }
}