<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;
use App\Http\Requests\StoreUserPost;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
	
    public function index(){
    	$user=new UserModel;
    	$data=[];
    	$info=$user->getAllDataUser();
    	$arrinfoUser=($info)?$info->toArray():[];
    	$data['info']=$arrinfoUser['data'];
    	$data['link']=$info;
    	//dd($data);
    	return view('admin.user.list_view',$data);
    }
    public function addUser(){
    	return view('admin.user.add_view');
    }
    public function handleAdd(StoreUserPost $req){
    	$username=$req->username;
    	$username=trim(strip_tags($username));

    	$password=$req->password;
    	$password=trim(strip_tags($password));

    	$email=$req->email;
    	$email=trim(strip_tags($email));
    	$role=$req->role;
    	$status=$req->active;

    	//xử lý up load ảnh
    	if($req->hasFile('avatar')){

    		//lấy thông tin file
    		$file=$req->file('avatar');
    		//mảng định dạng file hợp lệ
    		$extension=['png','jpg','jpeg'];
    		//lay tên file
    		$nameFile=$file->getClientOriginalName();
    		//dd($nameFile);
    		//lay phần mở rộng file
    		$exFile=$file->getClientOriginalExtension();
    		if(in_array($exFile, $extension))
            {
            	//tiến hành upload
            	$file->move(public_path().'/upload/user',$nameFile);
            }
    	}
    	$dataInsert=[
    		'username'=>$username,
    		'password'=>$password,
    		'email'=>$email,
    		'role'=>$role,
    		'status'=>$status,
    		'avatar'=>$nameFile,
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>null
    	];
    	$user=new UserModel;
    	$up=$user->InsertData($dataInsert);
    	if($up)
    	{
    		$req->session()->flash('addUser','Thêm user thành công');
    		return redirect()->route('admin.listUser');
    	}
    	else
    	{
    		$req->session()->flash('addUser','Thêm không thành công');
    	}
    }
    public function deleteUser(Request $req){
    	$id=$req->id;
    	$id=(is_numeric($id))?$id:0;
    	$user=new UserModel;
    	$del=$user->deleteUserById($id);
    	if($del)
    	{
    		$req->session()->flash('delUser','Xóa  thành công');
    		return redirect()->route('admin.listUser');
    	}
    	else{
    		$req->session()->flash('delUser','xóa không thành công');
    		return redirect()->route('admin.listUser');
    	}
    }
    public function editUser(Request $req)
    {
    	$id=$req->id;
    	$user=new UserModel;
    	$infoUser=$user->getUserById($id);
    	return view('admin.user.edit_view',['user'=>$infoUser]);
    }
    public function updateUser(Request $req)
    {
    	$id=$req->id;
    	$user=new UserModel;
    	$infoUser=$user->getUserById($id);
    	//dd($infoUser);
    	if($infoUser)
    	{
	    	$username=$req->username;
	    	$username=trim(strip_tags($username));

	    	$password=$req->password;
	    	$password=trim(strip_tags($password));

	    	$email=$req->email;
	    	$email=trim(strip_tags($email));
	    	$role=$req->role;
	    	$status=$req->active;
	    	$image_before=$infoUser['avatar'];
	    	$image_after='';
	    	//xử lý up load ảnh
	    	if($req->hasFile('avatar')){

	    		//lấy thông tin file
	    		$file=$req->file('avatar');
	    		//mảng định dạng file hợp lệ
	    		$extension=['png','jpg','jpeg'];
	    		//lay tên file
	    		$nameFile=$file->getClientOriginalName();
	    		//dd($nameFile);
	    		//lay phần mở rộng file
	    		$exFile=$file->getClientOriginalExtension();
	    		if(in_array($exFile, $extension))
	            {
	            	//tiến hành upload
	            	$file->move(public_path().'/upload/user',$nameFile);
	            	$image_after=$nameFile;
	            }
	    	}
	    	$avatar=($image_after)?$image_after:$image_before;
	    	$dataUpdate=[
	    		'username'=>$username,
	    		'password'=>$password,
	    		'email'=>$email,
	    		'role'=>$role,
	    		'status'=>$status,
	    		'avatar'=>$avatar,
	    		'created_at'=>date('Y-m-d H:i:s'),
	    		'updated_at'=>null
	    	];
	    }
	    //dd($dataUpdate);
	    
	    $up=$user->updateUser($dataUpdate,$id);

	    dd($up);
	    if($up)
	    {
	    	$req->session()->flash('editUser','Cập nhật thành công');
	    	return redirect()->route('admin.listUser',['id'=>$id]);
	    }
	    else{
	    	$req->session()->flash('editUser','Cập nhật không thành công');
	    	return redirect()->route('admin.listUser',['id'=>$id]);
	    }

    }
}
