<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $contact = Setting::where('key', 'contact')->first();
        $about = Setting::where('key', 'about')->first();
        return view('admin.setting', compact('about', 'contact'));
    }

    public function store(Request $request)
    {
        Setting::updateOrCreate(
            ['key' => 'about'],
            ['value' => $request->input('about')]
        );
        Setting::updateOrCreate(
            ['key' => 'contact'],
            ['value' => $request->input('contact')]
        );
        return redirect()->back();
    }
}
