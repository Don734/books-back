<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
// use App\Exports\SettingsExport;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.pages.settings');
    }
}
