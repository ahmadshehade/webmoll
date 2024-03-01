<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\profile as profileresources;
class ProfileController extends BaseController
{

    public function index()
    {
        $user = Auth::user();

        if ($user->role == "1") {
            $profiles = Profile::all();
            return $this->sendResponse(profileresources::collection($profiles), 'All profiles retrieved successfully.');
        } else {
            $profile = $user->profile;
            return $this->sendResponse(new profileresources($profile), 'User profile retrieved successfully.');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "gender" => "required",
            "serial_number" => "required",
            "personal_image" => "required|image",
        ]);

        $photo = $request->file('personal_image');
        $newphoto = time() . '_' . $photo->getClientOriginalName();
        $photo->move(public_path("upload/profiles"), $newphoto);

        $user = Auth::user();
        $profile = new Profile;
        $profile->name = $user->name;
        $profile->email = $user->email;
        $profile->gender = $request->gender;
        $profile->serial_number = $request->serial_number;
        $profile->personal_image = "upload/profiles/" . $newphoto;
        $profile->user_id = $user->id;
        $profile->save();

        return $this->sendResponse( new profileresources($profile), 'Profile created successfully.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $profile = Profile::find($id);

        if (!$profile) {
            return $this->sendError('Profile not found.',['error'=>'no profile']);
        }

        return $this->sendResponse( new profileresources($profile), 'Profile retrieved successfully.');
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return $this->sendError('Profile not found.',['error'=>'no profile']);
        }

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->gender = $request->gender;
        $profile->serial_number = $request->serial_number;

        if ($request->hasFile("personal_image")) {
            $photo = $request->file("personal_image");
            if ($photo->isValid()) {
                $newphoto = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path("upload/profiles"), $newphoto);
                $profile->personal_image = "upload/profiles/" . $newphoto;
            }
        }

        $profile->save();

        return $this->sendResponse(new profileresources($profile), 'Profile updated successfully.');
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return $this->sendError('Profile not found.',['error'=>'no profile']);
        }

        $profile->delete();

        return $this->sendResponse(new profileresources($profile), 'Profile deleted successfully.');
    }
}
