<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PostModel ;
use App\Model\CategorieModel ;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function index(Request $request,PostModel $post, CategorieModel $cat){ 
    	$addPost=$request->session()->get('addPost');
    	$data=[];
    	$listPost=$post->getAllDataPost();
    	$arrList=($listPost)?$listPost->toArray():[];
    	$data['infoPost']=$arrList['data'];
    	$data['addPost']=$addPost;
        $data['link']=$listPost;
       // dd($data['link']);
    	$data['delPost']=$request->session()->get('delPost');
    	//dd($data['infoPost'])    	
    	foreach($data['infoPost'] as $key=>$item){
    		//xử ly image product
            $data['infoPost'][$key]['image_small']=json_decode($item['image_small'],true);
            $data['infoPost'][$key]['image_big']=json_decode($item['image_big'],true);
    	}
    	return view('admin.post.index',$data);
    }
    public function infoPost(Request $request,PostModel $post, CategorieModel $cat)
    {

    	$id=(is_numeric($request->id))?$request->id:0;
    	$data=[];
    	$data['cat']=$cat->getAllDataCat();
    	$data['infoPost']=$post->getInfoPostById($id);
            //xử ly image product
            $data['infoPost']['image_small']=json_decode($data['infoPost']['image_small'],true);
            $data['infoPost']['image_big']=json_decode( $data['infoPost']['image_big'],true);
        foreach($data['cat'] as $key=>$item)
        {
            
        	if($data['infoPost']['id_cat']==$item['id'])
        	{
        		$data['infoPost']['name_cat']=$item['name_cat'];
        	}
        }
       
        
    	return view('admin.post.viewPost',$data);

    }
    public function addPost(CategorieModel $cat){
    	$data=[];
    	$data['cat']=$cat->getAllDataCat();
    	return view('admin.post.addView',$data);
    }
    public function handleAddPost(Request $request,PostModel $post)
    {
    	$title=$request->title;
    	$title=trim(strip_tags($title));

    	$summary=$request->summary;
    	$summary=trim(strip_tags($summary));

    	$content=$request->content;
    	//$content=trim(strip_tags($content));
    	$cat=$request->cat;
    
    	$arrNameFileImage_Small=[];
    	$arrNameFileImage_Big=[];

    	//xử lý upload file
    	//thuc hien upload file
        //kiem tra xem nguoi dung co chon file ko
        if($request->hasFile('image_small')&&$request->hasFile('image_big')){
            //lay thong tin cua file
           // $file=[];

            $image_small=$request->file('image_small');
            $image_big=$request->file('image_big');
            //mang dinh nghia cac file hop le
            $extension=['png','jpg','gif','jpeg'];
            

            //dd($image_small);
            foreach($image_small as $key=>$item){
                //lay ra dc ten file va duong dan luuu tam thoi cua file tren may cua nguoi dungg
                $nameFile1=$item->getClientOriginalName();
               //dd($nameFile1);
                //echo "<br/>";
                //lay ra duoi file(phan mo rong cua file)
                $exFile1=$item->getClientOriginalExtension();
                //echo $exFile;
                //kiem tra co hop le khong thi cho upload
                if(in_array($exFile1,$extension)){
                    //tien hanh upload
                    //đi vào thư mục public
                    //trong thư mục public :neu chua ton tai thu muc upload thi se tu dong tao 
                    $item->move(public_path().'/upload/image_small',$nameFile1);
                    $arrNameFileImage_Small[]=$nameFile1;
                }
            }
            foreach($image_big as $k=>$val){   
                $nameFile2=$val->getClientOriginalName();
                //echo $nameFile;
                //echo "<br/>";
                //lay ra duoi file(phan mo rong cua file)
                $exFile2=$val->getClientOriginalExtension();
                //echo $exFile;
                //kiem tra co hop le khong thi cho upload
                if(in_array($exFile2,$extension)){
                    //tien hanh upload
                    //đi vào thư mục public
                    //trong thư mục public :neu chua ton tai thu muc upload thi se tu dong tao 
                    $val->move(public_path().'/upload/image_big',$nameFile2);
                    $arrNameFileImage_Big[]=$nameFile2;
                }
            }
            
        }
        //dd($arrNameFileImage_Big);
    	//luu thông tin vào db
    	if($arrNameFileImage_Small&&$arrNameFileImage_Big)
    	{
    		$dataInsert=[
    			'title'=>$title,
    			'summary'=>$summary,
    			'content'=>$content,
    			'image_small'=>json_encode($arrNameFileImage_Small),
    			'image_big'=>json_encode($arrNameFileImage_Big),
    			'id_cat'=>$cat,
    			'views'=>0,
    			'status'=>1,
    			'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>null
    		];
    		if($post->insertPost($dataInsert)){
    			$request->session()->flash('addPost','Thêm bài viết thành công');
                return redirect()->route('admin.listPost');
    		}
    		else{
    			$request->session()->flash('addPost','Thêm không thành công');
                return redirect()->route('admin.addPost');
    		}
    		//dd($dataInsert);
    	}
    	//dd($content);
    }
    public function deletePost(Request $request)
    {
    	$id=$request->id;
    	$del=DB::table('posts')->where('id','=',$id)->delete();
    	if($del)
    	{
    		$request->session()->flash('delPost','Xóa thành công');
    		return redirect()->route('admin.listPost');
    	}
    	else{
    		abort(404);
    	}
    }
    public function editPost(Request $request,PostModel $post,CategorieModel $cat)
    {
    	$id=$request->id;
    	$data=[];
    	$data['infoCat']=$cat->getAllDataCat();
    	$listPost=$post->getInfoPostById($id);
        

    	$data['infoPost']=$listPost;
    	$data['infoPost']['image_small']=json_decode($data['infoPost']['image_small'],true);
            $data['infoPost']['image_big']=json_decode( $data['infoPost']['image_big'],true);
    	foreach($data['infoCat'] as $key=>$item)
        {
        	if($data['infoPost']['id_cat']==$item['id'])
        	{
        		$data['infoPost']['name_cat']=$item['name_cat'];
        	}
        }
        return view('admin.post.edit_view',$data);
    }
    public function handleEdit(Request $request, PostModel $post)
    {
    	$id=$request->id;
    	$infoPost=$post->getInfoPostById($id);

    	if($infoPost)
    	{
    		$title=$request->title;
    		$title=trim(strip_tags($title));

    		$summary=$request->summary;
    		$summary=trim(strip_tags($summary));

    		$content=$request->content;
    		$content=trim(strip_tags($content));
    		$cat=$request->cat;
    
    		$arrImage_small1=$infoPost['image_small'];
    		$arrImage_big1=$infoPost['image_big'];
    		$arrImage_small2=[];
    		$arrImage_big2=[];
    		//xử lý upload file
    		//thuc hien upload file
        	//kiem tra xem nguoi dung co chon file ko
        	if($request->hasFile('image_small')&&$request->hasFile('image_big')){
            //lay thong tin cua file
           // $file=[];

            	$image_small=$request->file('image_small');
           		 $image_big=$request->file('image_big');
            	//mang dinh nghia cac file hop le
            	$extension=['png','jpg','gif','jpeg'];
            

            	//dd($image_small);
            	foreach($image_small as $key=>$item){
                //lay ra dc ten file va duong dan luuu tam thoi cua file tren may cua nguoi dungg
                	$nameFile1=$item->getClientOriginalName();
               //dd($nameFile1);
                //echo "<br/>";
                //lay ra duoi file(phan mo rong cua file)
                	$exFile1=$item->getClientOriginalExtension();
                //echo $exFile;
                //kiem tra co hop le khong thi cho upload
                	if(in_array($exFile1,$extension)){
                    //tien hanh upload
                    //đi vào thư mục public
                    //trong thư mục public :neu chua ton tai thu muc upload thi se tu dong tao 
                    	$item->move(public_path().'/upload/image_small',$nameFile1);
                    	$arrImage_small2[]=$nameFile1;
                	}
            	}
            	foreach($image_big as $k=>$val){   
                	$nameFile2=$val->getClientOriginalName();
                //echo $nameFile;
                //echo "<br/>";
                //lay ra duoi file(phan mo rong cua file)
                	$exFile2=$val->getClientOriginalExtension();
                //echo $exFile;
                //kiem tra co hop le khong thi cho upload
                	if(in_array($exFile2,$extension)){
                    //tien hanh upload
                    //đi vào thư mục public
                    //trong thư mục public :neu chua ton tai thu muc upload thi se tu dong tao 
                    	$val->move(public_path().'/upload/image_big',$nameFile2);
                    	$arrImage_big2[]=$nameFile2;
                	}
            	}
            
        	}
        //dd($arrNameFileImage_Big);
        	$arrImage_big1=($arrImage_big2)?$arrImage_big2:$arrImage_big1;
        	$arrImage_small1=($arrImage_small2)?$arrImage_small2:$arrImage_small1;
        	//dd($arrImage_big2);
        	if($arrImage_big1&&$arrImage_small1)
        	{
        		$dataUpdate=[
        			'title'=>$title,
    				'summary'=>$summary,
    				'content'=>$content,
    				'image_small'=>json_encode($arrImage_small1),
    				'image_big'=>json_encode($arrImage_big1),
    				'id_cat'=>$cat,
    				'views'=>0,
    				'status'=>1,
    				'created_at'=>date('Y-m-d H:i:s'),
                	'updated_at'=>null
        		];
        		$up=$post->updatePostById($dataUpdate,$id);
        		if($up)
                {
                    $request->session()->flash('EditPd','update successful');
                    return redirect()->route('admin.listPost',['id'=>$id]);
                }
                else{
                    $request->session()->flash('EditPd','can not upload image');
                    return redirect()->route('admin.editPost',['id'=>$id]);
                }
        	}
    	}
    }
    
}
