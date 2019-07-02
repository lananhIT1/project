<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Closure;

class checkAdminIsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //sd middleware trong controller
        if($this->checkLogin()){
            return redirect()->route('fr.login');
        }
        return $next($request);
    }
    private function checkLogin(){
        $idUser=Session::get('id');
        $idUser=is_numeric($idUser) && $idUser>0 ? $idUser : 0;
        $user=Session::get('user');
        if($idUser<=0||empty($user)){
            return true;
        }
        return false;

    }
}
