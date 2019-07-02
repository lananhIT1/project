<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;
use App\Model\CategorieModel;

class LoginController extends Controller
{
    public function index(Request $request){
    	//return view('login');
    	$errLogin=$request->session()->get('errLogin');
        $cat=new CategorieModel;
        $data['cat']=$cat->getAllDataCat();
    	return view('login',$data)->with('error',$errLogin);
    }
    public function handleLogin(Request $request, UserModel $user)
    {
    	$username=$request->username;
    	$username=strip_tags($username);

    	$password=$request->password;
    	$password=strip_tags($password);

    	$infoData=$user->checkLogin($username,$password);
    	if(isset($infoData['id'])&&isset($infoData['username']))
    	{
    		//luu thong tin cua nguoi dung vao session bang laravel
    		$request->session()->put('user',$infoData['username']);
    		//$_SESSION['username']=$infoData['username'];
    		$request->session()->put('id',$infoData['id']);
    		$request->session()->put('email',$infoData['email']);
    		$request->session()->put('role',$infoData['role']);
    		if($infoData['role']==-1)
    		{
    			
    			return redirect()->route('admin.dashboard');
    		}
    		else{
    			return redirect()->route('fr.homePage');
    		}
    	}
    	else{
    		//luu loi vao session flash
    		//quay ve trang login
    		$request->session()->flash('errLogin','username or password invalid');
    		return redirect()->route('fr.login');
    	}
    }
    public function logout(Request $request){
    	$request->session()->flush();
    	return redirect()->route('fr.homePage');
    }
    
}
