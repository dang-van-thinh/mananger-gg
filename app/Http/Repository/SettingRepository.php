<?php

namespace App\Http\Repository;

use App\Models\Setting;

class SettingRepository
{
    // Tìm thuộc tính theo attribute
    public function findByAttribute($attribute)
    {
        return Setting::where('attribute', $attribute)->first();
    }

    // Tạo thuộc tính với giá trị null
    public function createAttributeNull($attribute)
    {
        return Setting::create([
            'attribute' => $attribute,
            'value' => null,
        ]);
    }
    public function updateOrCreateAttribute($attribute, $value)
    {
        return Setting::updateOrCreate(
            ['attribute' => $attribute],
            ['value' => $value]
        );
    }
}
