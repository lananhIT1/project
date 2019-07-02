@extends('frontend.base')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{URL::to('/')}}/upload/backgroundcategorie/{{ ($infoPost['name_cat']=='Drink')?'drink.jpg':'food.jpeg'}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">{{ $infoPost['name_cat']}}</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{  $infoPost['name_cat']  }} <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 order-lg-last ftco-animate">
            <h2 class="mb-3">{{ $infoPost['title'] }}</h2>
            <p>{{ $infoPost['summary'] }}<p>
              <img src="{{ URL::to('/') }}/upload/image_big/{{ $infoPost['image_big'][0] }}" alt="" class="img-fluid">
            </p>
            <div>
              {!! $infoPost['content'] !!}
            </div>
            </p>
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">Life</a>
                <a href="#" class="tag-cloud-link">Sport</a>
                <a href="#" class="tag-cloud-link">Tech</a>
                <a href="#" class="tag-cloud-link">Travel</a>
              </div>
            </div>
            
            <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3>George Washington</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div>
			
			<div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="{{ route('fr.addComment')}}" class="p-5 bg-light" method="POST">
                  @csrf
                	<div class="form-group">
                		<input type="hidden" class="hidden" value="{{$infoPost['id']  }}" name="id_post" >
                	</div>             
                  @if(Session::has('user'))
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" cols="30" rows="10" class="form-control" name="comment"></textarea>
                  </div>
                  	@else
                  		<div class="form-group">
                    		<label for="name">Name *</label>
                    		<input type="text" class="form-control" id="name" name="comment_sender_name">
                  		</div>
                  		<div class="form-group">
                    		<label for="message">Message</label>
                    		<textarea  id="message" cols="30" rows="10" class="form-control" name="comment"></textarea>
                  		</div>
                  	@endif
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            <div class="pt-5 mt-5">
              <h3 class="mb-5">6 Comments</h3>
              
              <ul class="comment-list"> 
             <?php
             	use App\Model\ReplyModel;
             ?>  
              @foreach($comment as $k1=>$v1)      
                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{ URL::to('/')}}/upload/avata/user.png" >
                  </div>
                  <div class="comment-body">
                    <h3>{{ $v1['comment_sender_name'] }}</h3>
                    <div class="meta">October 03, 2018 at 2:21pm</div>
                    <p>{{ $v1['comment']}}</p>
                    <a href="javascript:void(0)" class="reply" data-a="{{ $v1['id'] }}">Reply</a>
                  </div>
				            
                  <ul class="children">
                  	<?php
                  		$rep=new ReplyModel;
                  		$infoRep=$rep->getRepofCommentById($v1['id']);
                  	?>

                  	@foreach($infoRep as $k2=>$v2)
                    <li class="comment">
                      <div class="vcard bio">

                        <img src="{{ URL::to('/')}}/upload/avata/user.png" >
                      </div>
                      <div class="comment-body">
                        <h3>{{ $v2['comment_sender_name'] }}</h3>
                        <div class="meta">October 03, 2018 at 2:21pm</div>
                        <p>{{ $v2['comment'] }}</p>
                      </div>
                    </li>
                    @endforeach
                    <form action="{{ route('fr.repComment')}}" class="p-5 bg-light" method="POST" id="form-reply{{$v1['id']}}" style="display:none;">
                  @csrf
                  <div class="form-group">
                    <input type="hidden" class="hidden" value="{{$v1['id']  }}" name="id_com" >
                    <input type="hidden" class="hidden" value="{{$infoPost['id']  }}" name="id_post" >
                  </div>             
                  @if(Session::has('user'))
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" cols="30" rows="10" class="form-control" name="comment"></textarea>
                  </div>
                    @else
                      <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" id="name" name="comment_sender_name" required>
                      </div>
                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea  id="message" cols="30" rows="10" class="form-control" name="comment"></textarea>
                      </div>
                    @endif
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>
              
                </form>
                
                  </ul>
                </li>
                @endforeach
              </ul>
              
              <!-- END comment-list -->
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pr-lg-5 ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
              <ul class="categories">
                <h3 class="heading mb-4">Categories</h3>
                <?php
                	use App\Model\PostModel;
                	$post=new PostModel();

                ?>
                @foreach($cat as $key=>$item)
                <li><a href="#">{{ $item['name_cat']}} <span>({{ $post->countPost($item['id']) }})</span></a></li>
                @endforeach
              </ul>
            </div>
			<?php
				$list=$post->getPostSameCat($infoPost['id_cat']);
				foreach($list as $k1=>$v1){
					$v1->image_small=json_decode($v1->image_small,true);

				}


			?>
            <div class="sidebar-box ftco-animate">
              	<h3 class="heading mb-4">The Same Categorie</h3>
              	@foreach($list as $k=>$val)
              		<div class="block-21 mb-4 d-flex">
                		<a class="blog-img mr-4" style="background-image: url({{ URL::to('/')}}/upload/image_small/{{ $val->image_small[0] }});"></a>
	                	<div class="text">
	                 		 <h3><a href="{{ route('fr.single',['id'=>$val->id]) }}">{{ $val->title }}</a></h3>
	                  		<div class="meta">
	                    		<div><a href="#"><span class="icon-calendar"></span> February 12, 2019</a></div>
	                   			 <div><a href="#"><span class="icon-person"></span> Admin</a></div>
	                   			 <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  		</div>
	                	</div>
              		</div>
              	@endforeach
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading mb-4">Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">dish</a>
                <a href="#" class="tag-cloud-link">menu</a>
                <a href="#" class="tag-cloud-link">food</a>
                <a href="#" class="tag-cloud-link">sweet</a>
                <a href="#" class="tag-cloud-link">tasty</a>
                <a href="#" class="tag-cloud-link">delicious</a>
                <a href="#" class="tag-cloud-link">desserts</a>
                <a href="#" class="tag-cloud-link">drinks</a>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading mb-4">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>

        </div>
      </div>
    </section> 
@endsection
@push('js')
<script  type="text/javascript">
  $(document).ready(function(){
    $(".reply").click(function(){
      id=$(this).attr("data-a");
      //alert(".form-reply-"+id);
       $("#form-reply"+id).slideToggle();
       //$(".form-reply").slideToggle();
    });
  });

 
</script>
@endpush