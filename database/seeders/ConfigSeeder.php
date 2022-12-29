<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::insertOnDuplicateKey([
            [
                'id' => Config::TAB_NAME,
                'title' => 'TAB_NAME',
                'status' => true,
            ],
            [
                'id' => Config::BODY_SCRIPT,
                'title' => 'BODY_SCRIPT',
                'status' => true,
            ],
            [
                'id' => Config::MAINTENANCE,
                'title' => 'MAINTENANCE',
                'status' => true,
            ],
            [
                'id' => Config::LOGO_IMAGE,
                'title' => 'LOGO_IMAGE',
                'status' => true,
            ],
        ]);
    }
}
