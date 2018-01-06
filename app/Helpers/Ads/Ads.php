<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 06.01.2018
 * Time: 5:42
 */

namespace App\Helpers\Ads;
use App\Ads as AdsModel;
use Carbon\Carbon;

class Ads
{
    public static function adsSeeInc($ads){
        foreach ($ads as $ad){
            $ad->count_see++;
            $ad->save();
        }
    }
    public static function redirect(AdsModel $ads){
        $ads->count_click++;
        $ads->save();
        return redirect($ads->url);
    }
    public static function render(){
        $ads= AdsModel::where(function ($query) {
            $query->where('end_date_on', true)
                ->where('end_date', '>', Carbon::now());
        })->orWhere(function ($query) {
            $query->where('see_on', true)
                ->whereColumn('count_see', '<', 'see');
        })->orWhere(function ($query) {
            $query->where('click_on', true)
                ->whereColumn('count_click', '<', 'click');
        })
            ->inRandomOrder()

        ->get()->random(3);
        Ads::adsSeeInc($ads);
        return view('vendor.ads.defaut', compact('ads'));
    }
}