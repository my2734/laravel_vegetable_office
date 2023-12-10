<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\News;
use Illuminate\Support\Facades\Session;



class SettingController extends Controller
{
    public function index()
    {
        $news = News::with('User')->with('User_Info')->where('status', 0)->orderBy('created_at', 'DESC')->take(6)->get();
        $total_news = News::where('status', 0)->count();

        return view("admin.setting.index", compact('news', 'total_news'));
    }

    public function update_background_main(Request $request, $color)
    {
        $colorChange = $color;
        $setting = Setting::where('setting_name', 'color_pattern_admin')->first();
        if(isset($setting)){ //exist background color
            $setting->setting_value = $colorChange;
            $setting->save();
        }else{ // not exist background color
            $newSetting = new Setting();
            $newSetting->setting_name = "color_pattern_admin";
            $newSetting->setting_value = $colorChange;
            $newSetting->save();
        }

        $request->session()->put('setting.color_pattern_admin', "#".$colorChange);
        return redirect()->back();
    }

    public function get_all_setting(){
        $listSetting = Setting::get();
        echo json_encode($listSetting);
    }

    public function update_percent_setting(Request $request){
        $percent = $_POST['percent_profit'];
        $setting = Setting::where('setting_name', 'percent_profit')->first();
        if(isset($setting)){ //exist percent profit
            $setting->setting_value = $percent;
            $setting->save();
        }else{ // not exist background color
            $newSetting = new Setting();
            $newSetting->setting_name = "percent_profit";
            $newSetting->setting_value = $percent;
            $newSetting->save();
        }

        $request->session()->put('setting.profit_order', $percent);
        return redirect()->back();
    }

    public function update_name_site_setting(Request $request){
        $name_site = $_POST['name_site'];
        $setting = Setting::where('setting_name', 'name_site')->first();
        if(isset($setting)){ //exist percent profit
            $setting->setting_value = $name_site;
            $setting->save();
        }else{ // not exist background color
            $newSetting = new Setting();
            $newSetting->setting_name = "name_site";
            $newSetting->setting_value = $name_site;
            $newSetting->save();
        }

        $request->session()->put('setting.name_site', $name_site);
        return redirect()->back();
    }
}
