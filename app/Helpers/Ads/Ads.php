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
            $query->where(function ($query) {
                $query->where('priority_end_date', 1)
                    ->where('end_date_on', true)
                    ->where('end_date', '>', Carbon::now());
            })->orWhere(function ($query) {
                $query->where('priority_see', 1)
                    ->where('see_on', true)
                    ->whereColumn('count_see', '<', 'see');
            })->orWhere(function ($query) {
                $query->where('priority_click', 1)
                    ->where('click_on', true)
                    ->whereColumn('count_click', '<', 'click');
            });
        })
        ->orWhere(function ($query) {
            $query->where(function ($query) {
                $query->where('priority_end_date', '<>', 1)
                    ->where('priority_see', '<>', 1)
                    ->where('priority_click', '<>', 1);
            })
                ->where(function ($query) {
                    $query->orWhere(function ($query) {                       //Виполнения хотябы одного условия
                        $query->where('end_date_on', true)
                            ->where('end_date', '>', Carbon::now());
                    })->orWhere(function ($query) {
                        $query->where('see_on', true)
                            ->whereColumn('count_see', '<', 'see');
                    })->orWhere(function ($query) {
                        $query->where('click_on', true)
                            ->whereColumn('count_click', '<', 'click');
                    });
                });
        })
            ->inRandomOrder()
            ->limit(3)

        ->get();
        Ads::adsSeeInc($ads);
        return view('vendor.ads.defaut', compact('ads'));
    }
}