<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

if (!function_exists('isAdmin')) {
    function isAdmin(){
        if (Auth::check()) {
            $user = Auth::user();
            return $user->is_admin == 1 ? true : false;
        }else{
            return false;
        }
    }
}

if (!function_exists('dayDifference')) {
    function dayDifference($data){
        $to = Carbon::now();
        $from = Carbon::createFromFormat('Y-m-d H:s:i', $data);

        $diff_in_days = $to->diffInDays($from);

        return $diff_in_days;
    }
}

if (!function_exists('readingDuration')) {
    Str::macro('readDuration', function(...$text) {
        $totalWords = str_word_count(implode(" ", $text));
        $minutesToRead = round($totalWords / 100);
    
        return (int)max(1, $minutesToRead);
    });
    function readingDuration($descriptionData){
        return Str::readDuration($descriptionData);
    }
}
