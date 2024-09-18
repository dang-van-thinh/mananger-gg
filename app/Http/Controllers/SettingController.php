<?php

namespace App\Http\Controllers;

use App\Http\Requests\setting\UpdateSettingRequest;
use App\Http\Service\SettingService;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function show()
    {
        $settingLogo = $this->settingService->getOrCreateLogo();
        $settingLogoTab = $this->settingService->getOrCreateLogoTab();

        return view('page.setting.show', compact('settingLogo', 'settingLogoTab'));
    }
    public function uploadLogo(UpdateSettingRequest $request)
    {
        $this->settingService->updateLogo($request);
        return back()->with('success', 'Thay đổi thành công');
    }
}
