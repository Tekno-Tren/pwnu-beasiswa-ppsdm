<?php 
use App\Models\User;
use App\Models\Section;
use App\Models\Setting;
function get_setting_value($key){
    $data = Setting::where('key', $key)->first();
    if(isset($data->value)){
        return $data->value;
    } else {
        return 'empty';
    }
}

function get_section_data($key){
    $data = Section::where('post_as', $key)->first();
    if(isset($data)){
        return $data;
    } else {
        return 'empty';
    }
}

function get_user_data($key){
    $data = User::where('id', $key)->first();
    if(isset($data)){
        return $data;
    } else {
        return 'empty';
    }
}