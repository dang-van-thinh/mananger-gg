<?php

namespace App\Http\Repository;

use App\Models\Setting;

class SettingRepository
{
    public function all()
    {
        return Setting::all();
    }
    public function first()
    {
        return Setting::first();
    }
    public function findOrFail($id)
    {
        return Setting::findOrFail($id);
    }
    public function createNull(array $data)
    {
        return Setting::create([
            'logo' => null,
            'logo_tab' => null,
        ]);
    }
    public function update(array $data, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->update($data);
        return $setting;
    }
    public function delete($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return $setting;
    }
}
