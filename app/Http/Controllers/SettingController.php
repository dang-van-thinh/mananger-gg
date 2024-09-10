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
        $setting = $this->settingService->show();

        return view('page.setting.show', compact('setting'));
    }
    public function update(UpdateSettingRequest $request, $id)
    {
        if ($this->settingService->update($request, $id)) {
            return back()->with('success', 'Thay đổi thành công');
        } else {
            return back()->with('error', 'Thay đổi thất bại');
        }
    }
    public function delete($id)
    {
        if ($this->settingService->delete($id)) {
            return back()->with('success', 'Xóa thành công');
        } else {
            return back()->with('error', 'Xóa thất bại');
        }
    }
}
