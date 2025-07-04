<?php

namespace App\Repositories;


use App\Models\Setting;

class SettingRepo
{
    public function update($type, $desc)
    {
        $setting = \App\Models\Setting::where('type', $type)->first();
        if($setting) {
            $setting->description = $desc;
            $setting->save();
        } else {
            \App\Models\Setting::create([
                'type' => $type,
                'description' => $desc
            ]);
        }
    }

    public function getSetting($type)
    {
        return Setting::where('type', $type)->get();
    }

    public function all()
    {
        return Setting::all();
    }
}