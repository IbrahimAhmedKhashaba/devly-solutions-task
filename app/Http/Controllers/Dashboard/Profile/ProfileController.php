<?php 

namespace App\Http\Controllers\Dashboard\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Interfaces\Services\Profile\ProfileServiceInterface;

class ProfileController extends Controller
{
    private $profileServices;


    public function __construct(ProfileServiceInterface $profileServices)
    {
        $this->profileServices = $profileServices;
    }

    public function index(){
        return view('dashboard.profile.index');
    }
    public function update(ProfileRequest $request)
    {
        //
        $res = $this->profileServices->update($request->all());
        return $res ? redirect()->back()->with('success', 'Profile updated successfully') 
            : redirect()->back()->with('error', 'Profile not updated');
    }
    public function updatePassword(ProfileRequest $request)
    {
        //
        $res = $this->profileServices->updatePassword($request->password);
        return $res ? redirect()->back()->with('success', 'Password updated successfully') 
            : redirect()->back()->with('error', 'Password not updated');
    }
}