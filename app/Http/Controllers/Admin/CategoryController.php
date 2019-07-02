<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CategorieModel;
class CategoryController extends Controller
{
    public function index(){
    	$cat= new CategorieModel;
    	$data=[];
    	$data['infoCat']=$cat->getAllDataCat();
    	return view('admin.categorie.index',$data);
    }
    public function editCat(Request $req){
    	$cat=new CategorieModel;
    	$id=$req->id;
    	$data=[];
    	$data['infoCat']=$cat->getDataCatById($id);
    	return view('admin.categorie.edit_view');
    }
    public function addCat(Request $req){
    	$addCat=$req->session()->get('addCat');
    	$data['addCat']=$addCat;
    	return view('admin.categorie.add_view',$data);
    }
    public function handleAddCat(Request $req){
    	$cat=new CategorieModel;
    	$name_cat=$req->name;
    	$dataInsert=[
    		'name_cat'=>$name_cat,
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>null
    	];
    	
    	$count=$cat->duplicateCat($name_cat);
    	if($count==0){
    		 $up=$cat->insertCat($dataInsert);
    		 if($up){
    			$req->session()->flash('addCat','Thêm thành công');
    			return redirect()->route('admin.categories');
    			}else{
    			$req->session()->flash('addCat','Thêm không thành công');
    			return redirect()->route('admin.addCat');
    		}
    	}
    	else{
    		$req->session()->flash('addCat',$name_cat.' đã tồn tại');
    			return redirect()->route('admin.addCat');
    	}
    }
    public function handleEditCat(Request $req){
    	
    }
}
