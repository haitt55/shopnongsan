<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Events\AppSetting\WasUpdated as AppSettingWasUpdated;

class AppSettingsController extends Controller
{
    public function general()
    {
        $appSettings = app_settings()->all();

        return view('admin.appSettings.general', compact('appSettings'));
    }

    public function updateGeneral(Request $request)
    {
        app_settings()->merge($request->all());

        event(new AppSettingWasUpdated());

        return redirect()->route('admin.appSettings.general');
    }
}
