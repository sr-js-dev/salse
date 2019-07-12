<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function verify($token){
        // dd($token);
        $user = User::where("verify_token", $token)->first();
        if($user){
            $user->is_verify = 1;
            $user->save();
            auth()->loginUsingId($user->id);
            return redirect()->to("/dashboard");
        }
        return redirect()->back();
    }
}
