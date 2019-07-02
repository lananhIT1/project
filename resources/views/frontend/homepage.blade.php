@extends('frontend.base')
@section('content')

  <section class="home-slider owl-carousel">
  	@foreach($slide as $key=>$item)
      	<div class="slider-item">
        	<div class="container">
          		<div class="row d-flex slider-text justify-content-center align-items-center" data-scrollax-parent="true">
					<div class="img" style="background-image: url({{ URL::to('/') }}/upload/slider/{{ $item['image_slide'] }});"></div>

            		<div class="text d-flex align-items-center ftco-animate">
            			<div class="text-2 pb-lg-5 mb-lg-4 px-4 px-md-5">
		          		<h3 class="subheading mb-3">Featured Posts</h3>
		            	<h1 class="mb-5">{{ $item['title'] }}</h1>
		            	<p class="mb-md-5">{{ $item['description'] }}</p>
		            	{{-- <p><a href="" class="btn btn-black px-3 px-md-4 py-3">Read More <span class="icon-arrow_forward ml-lg-4"></span></a></p> --}}
              		</div>
            	</div>

          	</div>
        </div>
     </div>
	@endforeach
    {{-- <div class="slider-item">
        <div class="container">
          	<div class="row d-flex slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          		<div class="img" style="background-image: url(images/bg_2.jpg);"></div>

            	<div class="text d-flex align-items-center ftco-animate">
            		<div class="text-2 pb-lg-5 mb-lg-4 px-4 px-md-5">
		          		<h3 class="subheading mb-3">Featured Posts</h3>
		            	<h1 class="mb-5">I am A Blogger &amp; I Love Foods</h1>
		            	<p class="mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia</p>
		            	<p><a href="#" class="btn btn-black px-3 px-md-4 py-3">Read More <span class="icon-arrow_forward ml-lg-4"></span></a></p>
	            	</div>
            	</div>

          	</div>
        </div>
    </div> --}}
    </section>


    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
          		<div class="col-md-7 heading-section ftco-animate">
            	<h2 class="mb-4"><span>Recent Stories</span></h2>
          		</div>
        	</div>
	    	<div class="row">
    			<div class="col-md-6 order-md-last col-lg-6 ftco-animate">
    				<div class="blog-entry">
    					<div class="img img-big d-flex align-items-end" style="background-image: url({{ URL::to('/') }}/upload/image_small/{{ $postNew[4]->image_small[0] }});">
    						<div class="overlay"></div>
    						<div class="text">
    							<span class="subheading">Food</span>
    							<h3><a href="single.html">{{ $postNew[4]->title }}</a></h3>
    							<p class="mb-0"><a href="{{ route('fr.single',['id'=>$postNew[4]->id]) }}" class="btn-custom">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
    						</div>
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
    					<?php for($i=0;$i<4;$i++){?>
    					<div class="col-md-6 ftco-animate">
    						<div class="blog-entry">
		    					<a href="{{ route('fr.single',['id'=>$postNew[$i]->id]) }}" class="img d-flex align-items-end" style="background-image: url({{ URL::to('/') }}/upload/image_small/{{ $postNew[$i]->image_small[0] }});">
		    						<div class="overlay"></div>
			    				</a>
			    				<div class="text pt-3">
	    							<p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">{{ $postNew[$i]->created_at }}</span></p>
	    							<h3><a href="{{ route('fr.single',['id'=>$postNew[$i]->id]) }}">{{ $postNew[$i]->title }}</a></h3>
	    							<p class="mb-0"><a href="{{ route('fr.single',['id'=>$postNew[$i]->id]) }}" class="btn-custom">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
	    						</div>
		    				</div>
    					</div>
    					<?php }?>
    				</div>
    			</div>
    		</div>
	    </div>
		
    </section>

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
        <div class="row">
        	<div class="col-lg-9">
        		<div class="row">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4"><span>Featured Posts</span></h2>
		          </div>
		        </div>
        		<div class="row">
        			<div class="col-md-4 ftco-animate">
    						<div class="blog-entry">
		    					<a href="single.html" class="img-2"><img src="images/blog-1.jpg" class="img-fluid" alt="Colorlib Template"></a>
			    				<div class="text pt-3">
	    							<p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">March 01, 2018</span></p>
	    							<h3><a href="#">Tasty &amp; Delicious Foods</a></h3>
	    							<p class="mb-0"><a href="single.html" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
	    						</div>
		    				</div>
    					</div>
    					<div class="col-md-4 ftco-animate">
    						<div class="blog-entry">
		    					<a href="single.html" class="img-2"><img src="images/blog-2.jpg" class="img-fluid" alt="Colorlib Template"></a>
			    				<div class="text pt-3">
	    							<p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">March 01, 2018</span></p>
	    							<h3><a href="#">Tasty &amp; Delicious Foods</a></h3>
	    							<p class="mb-0"><a href="single.html" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
	    						</div>
		    				</div>
    					</div>
    					<div class="col-md-4 ftco-animate">
    						<div class="blog-entry">
		    					<a href="single.html" class="img-2"><img src="images/blog-3.jpg" class="img-fluid" alt="Colorlib Template"></a>
			    				<div class="text pt-3">
	    							<p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">March 01, 2018</span></p>
	    							<h3><a href="#">Tasty &amp; Delicious Foods</a></h3>
	    							<p class="mb-0"><a href="single.html" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
	    						</div>
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
            </div>
        	</div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-section-about ftco-no-pb bg-darken">
    	<div class="container-fluid">
    		<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-9 order-md-last img py-5" style="background-image: url(images/bg_3.jpg);"></div>

	        <div class="col-sm-6 col-md-6 col-lg-3 py-4 text d-flex align-items-center ftco-animate">
	        	<div class="text-2 py-5 px-4">
	          	<p class="mb-5"><a href="https://vimeo.com/45830194" class="btn-custom popup-vimeo">Watch Video <span class="ion-ios-play ml-4"></span></a></p>
	            <h1 class="mb-5">Roger <br> Bosch</h1>
	            <p class="mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	            <span class="signature">Roger.Bosch</span>
	          </div>
	        </div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
        <div class="row">
        	<div class="col-md-9">
        		<div class="row">
        			<div class="col-md-6 col-lg-6 ftco-animate">

		          
		            	<h2 class="mb-4"><span style="border-color:#8a8f6a;border-bottom: 3px solid black;">Follow me</span></h2>
		          		<hr style="width">
		        
		    				<div class="blog-entry">
		    					{{-- <div class="img img-big img-big-2 d-flex align-items-end" style="background-image: url(images/image_1.jpg);">
		    						<div class="overlay"></div>
		    						<div class="text">
		    							<span class="subheading">Food</span>
		    							<h3><a href="#">ham sandwich on white surface</a></h3>
		    							<p class="mb-0"><a href="#" class="btn-custom">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
		    						</div>
			    				</div> --}}

			    				<div class="fb-page" data-href="https://www.facebook.com/Food-Drink-Travel-441171343370836/?modal=admin_todo_tour" data-tabs="timeline" data-width="" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Food-Drink-Travel-441171343370836/?modal=admin_todo_tour" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Food-Drink-Travel-441171343370836/?modal=admin_todo_tour">Food  Drink Travel</a></blockquote></div>
		    				</div>
		    			</div>
		    			<div class="col-md-6 col-lg-6 ftco-animate">
		    				<div class="blog-entry">
		    					<div class="img img-big img-big-2 d-flex align-items-end" style="background-image: url(images/image_3.jpg);">
		    						<div class="overlay"></div>
		    						<div class="text">
		    							<span class="subheading">Lifestyle</span>
		    							<h3><a href="#">White and red ceramic plate</a></h3>
		    							<p class="mb-0"><a href="#" class="btn-custom">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
		    						</div>
			    				</div>
		    				</div>
		    			</div>
        		</div>
        	</div>
        	<div class="col-md-3">
        		<div class="sidebar-wrap pt-4">
	            <div class="sidebar-box categories text-center ftco-animate">
			          <h2 class="heading mb-4">Categories</h2>
			          <ul class="category-image">
			          	<li>
			          		<a href="foods.html" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-1.jpg);">
			          			<div class="text">
			          				<h3>Foods</h3>
			          			</div>
			          		</a>
			          	</li>
			          	<li>
			          		<a href="lifestyle.html" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(images/category-2.jpg);">
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
   	
    <section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img" id="section-counter">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex">
    				<div class="img d-flex align-self-stretch" style="background-image:url(images/about.jpg);"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4">About Stories</h2>
		            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
		          </div>
		        </div>
		    		<div class="row">
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number="10">0</strong>
		                <span>Years of Experienced</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number="200">0</strong>
		                <span>Foods</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number="300">0</strong>
		                <span>Lifestyle</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-5 bg-light mb-4">
		              <div class="text">
		                <strong class="number" data-number="40">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>
 
@endsection
@push('js')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=804281439934618&autoLogAppEvents=1"></script>
@endpush