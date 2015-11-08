<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateProfilePasswordRequest;
use App\Http\Controllers\Controller;
use App\Storage\UserRepositoryInterface as UserRepository;

class ProfileController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Edit profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $this->userRepository->updateProfile(auth()->user()->id, $request->all());

        session()->flash('flash_message', 'Profile successfully updated.');

        return redirect()->back();
    }

    public function editPassword() {
        return view('profile.editPassword');
    }

    public function updatePassword(UpdateProfilePasswordRequest $request) {
        $this->userRepository->updatePassword(auth()->user()->id, $request->input('password'));

        session()->flash('flash_message', 'Password successfully updated.');

        return redirect()->back();
    }
}
