<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Storage\AppSettingRepositoryInterface as AppSettingRepository;

class AppSettingsController extends Controller
{
    protected $appSettingRepository;

    public function __construct(AppSettingRepository $appSettingRepository) {
        $this->appSettingRepository = $appSettingRepository;
    }

    public function general()
    {
        $appSettings = $this->appSettingRepository->all();

        return view('admin.appSettings.general', compact('appSettings'));
    }

    public function updateGeneral(Request $request)
    {
        $this->appSettingRepository->merge($request->all());

        flash()->success('Success!', 'App Settings successfully updated.');

        return redirect()->route('admin.appSettings.general');
    }
}
