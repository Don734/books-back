<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\ConfigRequest;
use App\Models\Config;
// use App\Exports\SettingsExport;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = Config::cursor();
        $sortedConfigs = [];

        foreach ($configs as $config) {
            $sortedConfigs[$config['title']] = [
                'value' => $config['value'],
                'status' => filter_var($config['status'] ?? 'false', FILTER_VALIDATE_BOOLEAN),
            ];
        }

        return view('admin.pages.settings', ['configs' => $sortedConfigs]);
    }

    public function update(ConfigRequest $request, Config $config)
    {
        $config->edit($request->all(), $request->user('web'));
        return redirect()->route('configs');
    }
}
