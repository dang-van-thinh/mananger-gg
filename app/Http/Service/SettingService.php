<?php

namespace App\Http\Service;

use App\Http\Repository\SettingRepository;
use App\Http\Requests\setting\UpdateSettingRequest;
use Illuminate\Support\Facades\Storage;

class SettingService
{
    protected $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function getAll()
    {
        return $this->settingRepository->all();
    }
    public function show()
    {
        $setting = $this->settingRepository->first();
        if (!$setting) {
            $setting = $this->settingRepository->createNull([]);
        }

        return $setting;
    }

    public function update(UpdateSettingRequest $request, $id)
    {
        $setting = $this->settingRepository->findOrFail($id);
        $data = $request->except(['logo', 'logo_tab']);

        if ($request->hasFile('logo')) {
            $newLogo = Storage::put('settings/logo', $request->file('logo'));

            if ($setting->logo && Storage::exists($setting->logo)) {
                Storage::delete($setting->logo);
            }

            $data['logo'] = $newLogo;
        }

        if ($request->hasFile('logo_tab')) {
            $newLogoTab = Storage::put('settings/tab', $request->file('logo_tab'));

            if ($setting->logo_tab && Storage::exists($setting->logo_tab)) {
                Storage::delete($setting->logo_tab);
            }

            $data['logo_tab'] = $newLogoTab;
        }

        return $this->settingRepository->update($data, $id);
    }

    public function delete($id)
    {
        $setting = $this->settingRepository->findOrFail($id);

        if ($setting->logo && Storage::exists($setting->logo)) {
            Storage::delete($setting->logo);
        }
        if ($setting->logo_tab && Storage::exists($setting->logo_tab)) {
            Storage::delete($setting->logo_tab);
        }

        return $this->settingRepository->delete($id);
    }
}
