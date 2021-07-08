<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {

        $setting = $this->findSetting('admin.bg_image');
        $setting->fill([
            'display_name' => 'Admin Background Image',
            'value'        => '/settings/bg_img.jpg',
            'details'      => '',
            'type'         => 'image',
            'order'        => 5,
            'group'        => 'Admin',
        ])->save();

        $setting = $this->findSetting('admin.title');
        $setting->fill([
            'display_name' => 'The Vault',
            'value'        => 'The Vault',
            'details'      => '',
            'type'         => 'text',
            'order'        => 1,
            'group'        => 'Admin',
        ])->save();

        $setting = $this->findSetting('admin.description');
        $setting->fill([
            'display_name' => 'Admin panel for The Vault',
            'value'        => 'Admin panel for The Vault',
            'details'      => '',
            'type'         => 'text',
            'order'        => 2,
            'group'        => 'Admin',
        ])->save();

        $setting = $this->findSetting('admin.icon_image');
        $setting->fill([
            'display_name' => 'Icon Image',
            'value'        => '/settings/vault_icon.jpg',
            'details'      => '',
            'type'         => 'image',
            'order'        => 4,
            'group'        => 'Admin',
        ])->save();
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
