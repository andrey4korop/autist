<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $data['user']= Auth::user();
        //dd(Auth::user()->profile);
        return view('auth.profile', $data);
    }
    public function save(Request $request){
        $user = Auth::user();
        $this->validate($request, [
            'surname' => 'max:255',
            'avatar' => 'file|image',
        ]);
        $user->profile->surname = $request->surname;
        if ($request->hasFile('avatar')) {
            $user->profile->avatar = $request->file('avatar')
                ->move('img\uploads', str_random(40) . '.' . $request->avatar->extension())
                ->getPathname();
            //dd($request->file('avatar')->move('img\uploads', str_random(40).'.'.$request->avatar->extension())->getPathname());
        }
        $user->profile->save();
        return $this->index();
    }
}
