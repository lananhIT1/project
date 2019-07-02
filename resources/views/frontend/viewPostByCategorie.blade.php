@extends('frontend.base')
@section('content')
 <section class="hero-wrap hero-wrap-2" style="background-image: url('{{URL::to('/')}}/upload/backgroundcategorie/{{ ($post[0]['name_cat']=='Drink')?'drink.jpg':'food.jpeg'}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">{{ $post[0]['name_cat'] }}</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{  $post[0]['name_cat']  }} <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

	@if($post[0]['name_cat']=='Drink')
    <section class="ftco-section">
    	<div class="container">
        <div class="row">
        	<div class="col-lg-9">
        		<div class="row">
        			@foreach($post as $key=>$item)
        			<div class="col-md-6 col-lg-12 ftco-animate">
    						<div class="blog-entry d-lg-flex">
    							<div class="half">
			    					<a href="single.html" class="img d-flex align-items-end" style="background-image: url({{ URL::to('/') }}/upload/image_small/{{ $item['image_small'][0]}});">
			    						<div class="overlay"></div>
				    				</a>
			    				</div>
			    				<div class="text px-md-4 px-lg-5 half pt-3">
	    							<p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">March 01, 2018</span></p>
	    							<h3><a href="single.html">{{ $item['title'] }}</a></h3>
	    							<p>{{ $item['summary'] }}
                    				</p>
	    							<p class="mb-0"><a href="{{ route('fr.single',['id'=>$item['id']]) }}" class="btn btn-primary">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
	    						</div>
		    				</div>
    					</div>
    				@endforeach
        		</div>
        		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
        	</div>

        	<div class="col-lg-3">
        		<div class="sidebar-wrap">
	        		<div class="sidebar-box p-4 about text-center ftco-animate">
			          <h2 class="heading mb-4">About Me</h2>
			          <img src="{{ URL::to('/') }}/upload/avata/minh.jpg" class="img-fluid" alt="Colorlib Template">
			          <div class="text pt-4">
			          	<p>Tôi là  <strong>Minh Linh Anh</strong><br>Câu nói mà tôi yêu thích nhất là:" Đích đến không phải là nơi bạn kết thúc chuyến đi mà đó là những rủi ro và những kỉ niệm bạn đã tạo ra trên suốt chặng đượng" Với tôi, đi đến những vùng đất là, thưởng thức những món ăn ngon là điều tuyệt vời của cuộc sống!!!</p>
			          </div>
	        		</div>
	        		<div class="sidebar-box p-4 ftco-animate">
	              <form action="#" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" class="form-control" placeholder="Search">
	                </div>
	              </form>
	            </div>
	            <div class="sidebar-box categories text-center ftco-animate">
			          <h2 class="heading mb-4">Categories</h2>
			          <ul class="category-image">
			          	<li>
			          		<a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-1.jpg);">
			          			<div class="text">
			          				<h3>Foods</h3>
			          			</div>
			          		</a>
			          	</li>
			          	<li>
			          		<a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-2.jpg);">
			          			<div class="text">
			          				<h3>Lifestyle</h3>
			          			</div>
			          		</a>
			          	</li>
			          	<li>
			          		<a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-2.jpg);">
			          			<div class="text">
			          				<h3>Others</h3>
			          			</div>
			          		</a>
			          	</li>
			          </ul>
	        		</div>
            </div>
        	</div>
        </div>
    	</div>
    </section>
    @endif
    @if($post[0]['name_cat']=='Food')
		<section class="ftco-section">
    	<div class="container">
        <div class="row">
        	<div class="col-lg-9">
        		<div class="row">
        			@foreach($post as $k=>$val)
        			<div class="col-md-4 ftco-animate">
    						<div class="blog-entry">
		    					<a href="single.html" class="img-2"><img src="{{ URL::to('/') }}/upload/image_small/{{ $val['image_small'][0] }}" class="img-fluid" alt="Colorlib Template"></a>
			    				<div class="text pt-3">
	    							<p class="meta d-flex"><span class="ml-auto pl-3">{{ $val['created_at'] }}</span></p>
	    							<h3><a href="single.html">{{ $val['title'] }}</a></h3>
	    							<p class="mb-0"><a href="{{ route('fr.single',['id'=>$val['id']]) }}" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
	    						</div>
		    				</div>
    				</div>
    				@endforeach
        		</div>
        		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
        	</div>

        	<div class="col-lg-3">
        		<div class="sidebar-wrap">
	        		<div class="sidebar-box p-4 about text-center ftco-animate">
			          <h2 class="heading mb-4">About Me</h2>
			          <img src="{{ URL::to('/') }}/upload/avata/minh.jpg" class="img-fluid" alt="Colorlib Template">
			          <div class="text pt-4">
			          	<p>Tôi là  <strong>Minh Linh Anh</strong><br>Câu nói mà tôi yêu thích nhất là:" Đích đến không phải là nơi bạn kết thúc chuyến đi mà đó là những rủi ro và những kỉ niệm bạn đã tạo ra trên suốt chặng đượng" Với tôi, đi đến những vùng đất là, thưởng thức những món ăn ngon là điều tuyệt vời của cuộc sống!!!</p>
			          </div>
	        		</div>
	        		<div class="sidebar-box p-4 ftco-animate">
	              <form action="#" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" class="form-control" placeholder="Search">
	                </div>
	              </form>
	            </div>
	            <div class="sidebar-box categories text-center ftco-animate">
			          <h2 class="heading mb-4">Categories</h2>
			          <ul class="category-image">
			          	<li>
			          		<a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-1.jpg);">
			          			<div class="text">
			          				<h3>Foods</h3>
			          			</div>
			          		</a>
			          	</li>
			          	<li>
			          		<a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-2.jpg);">
			          			<div class="text">
			          				<h3>Lifestyle</h3>
			          			</div>
			          		</a>
			          	</li>
			          	<li>
			          		<a href="#" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-2.jpg);">
			          			<div class="text">
			          				<h3>Others</h3>
			          			</div>
			          		</a>
			          	</li>
			          </ul>
	        		</div>
            </div>
        	</div>
        </div>
    	</div>
    </section>
    @endif
@endsection