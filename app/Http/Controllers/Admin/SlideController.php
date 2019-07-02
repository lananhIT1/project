<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SlideModel;
class SlideController extends Controller
{
    public function index(Request $request,SlideModel $slide)
    {

    	$data=[];
    	$listSlide=$slide->getAllDataSlide();
    	$arrSlide=($listSlide)?$listSlide->toArray():[];
    	$data['infoSlide']=$arrSlide['data'];
    	$data['addSlide']=$request->session()->get('addSlide');
    	//dd($data['infoSlide']);
    	return view('admin.slide.index',$data);
    }
    public function addSlide()
    {
    	return view('admin.slide.add_view');
    }
    public function handleAdd(Request $request,SlideModel $slide)
    {
    	$title=$request->title;
    	$title=trim(strip_tags($title));

    	$description=$request->description;
    	$description=trim(strip_tags($description));

    	$status=$request->active;

    	//thực hiện upload file
    	if($request->hasFile('image_slide'))
    	{
    		//lấy thông tin file
    		$image_slide=$request->file('image_slide');
    		//mang dinh nghia cac file hop le
            $extension=['png','jpg','gif','jpeg'];
            //lay ra ten file
            $nameFile=$image_slide->getClientOriginalName();
            //lay ra phan mở rộng của file
            $exFile=$image_slide->getClientOriginalExtension();
            if(in_array($exFile, $extension))
            {
            	//tiến hành upload
            	$image_slide->move(public_path().'/upload/slider',$nameFile);
            }
    	}
    	$dataInsert=[
    		'title'=>$title,
    		'image_slide'=>$nameFile,
    		'description'=>$description,
    		'status'=>$status,
    		'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>null
    	];
    	if($slide->insertData($dataInsert)){
    		$request->session()->flash('addSlide','Thêm thành công');
    		return redirect()->route('admin.listSlide');
    	}
    	else{
    		$request->session()->flash('addSlide','Thêm không thành công');
    		return redirect()->route('admin.addSlide');
    	}
    }
}
