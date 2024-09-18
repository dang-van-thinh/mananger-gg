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
    protected function getOrCreateAttribute($attribute)
    {
        $setting = $this->settingRepository->findByAttribute($attribute);

        if (!$setting) {
            $setting = $this->settingRepository->createAttributeNull($attribute);
        }

        return $setting;
    }
    public function getOrCreateLogo()
    {
        return $this->getOrCreateAttribute('logo');
    }
    public function getOrCreateLogoTab()
    {
        return $this->getOrCreateAttribute('logo_tab');
    }
    protected function handleFileUpdate($request, $attribute, $directory)
    {
        if ($request->hasFile($attribute)) {
            $newPath = Storage::put($directory, $request->file($attribute));

            if ($newPath) {
                // Tìm thuộc tính hiện tại và xóa file cũ nếu có
                $existing = $this->settingRepository->findByAttribute($attribute);

                if ($existing && $existing->value && Storage::exists($existing->value)) {
                    Storage::delete($existing->value);
                }

                // Cập nhật hoặc tạo mới thuộc tính
                $this->settingRepository->updateOrCreateAttribute($attribute, $newPath);
            }
        }
    }
    // Cập nhật logo và logo tab
    public function updateLogo(UpdateSettingRequest $request)
    {
        $this->handleFileUpdate($request, 'logo', 'settings/logo');
        $this->handleFileUpdate($request, 'logo_tab', 'settings/logo_tab');
    }
}
