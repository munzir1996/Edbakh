<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{


    public function index()
    {

    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show(Setting $setting)
    {

    }


    public function edit($id)
    {

        $setting = Setting::find($id);

        $active = 'settings';

        return view('admin.settings.main', compact(['setting', 'active']));

    }


    public function update(Request $request, $id)
    {

        $setting = Setting::find($id);

        $setting->title_en = $request->title_en;
        $setting->title_ar = $request->title_ar;
        $setting->address_en = $request->address_en;
        $setting->address_ar = $request->address_ar;
        $setting->price_title_en = $request->price_title_en;
        $setting->price_title_ar = $request->price_title_ar;
        $setting->price_subtitle_en = $request->price_subtitle_en;
        $setting->price_subtitle_ar = $request->price_subtitle_ar;
        $setting->description_en = $request->description_en;
        $setting->description_ar = $request->description_ar;
        $setting->keywords_en = $request->keywords_en;
        $setting->keywords_ar = $request->keywords_ar;
        $setting->privacy_policy_en = $request->privacy_policy_en;
        $setting->privacy_policy_ar = $request->privacy_policy_ar;
        $setting->terms_condition_en = $request->terms_condition_en;
        $setting->terms_condition_ar = $request->terms_condition_ar;
        $setting->phone = $request->phone;
        $setting->email = $request->email;

        $setting->save();

        session()->flash('message', 'The Website Settings has been updated successfully');

        return back();

    }


    public function destroy(Setting $setting)
    {

    }
}
