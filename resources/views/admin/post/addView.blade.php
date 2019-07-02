@extends('admin.baseadmin')
@section('content')
<section class="content">
	<div class="row">
	<h3>Thêm bài viết</h3>
	</div>
	<div class="infoview">
		<form action="{{ route('admin.handleAddPost') }}" method="POST" enctype="multipart/form-data" style="padding-left:10px;">
			@csrf
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="title">
							Title:
						</label>
						<input type="text" class="form-control" name="title" id="title" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="summary">
							Summary:
						</label>
						<input type="text" class="form-control" name="summary" id="summary" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<h3>Content</h3>
						<textarea name="content" id="content" cols="30" rows="10" class="form-control ckeditor" required id="txtContent"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group border-top mt-3">
						<label for="image_small">Image_small</label>
						<input type="file" name="image_small[]" id="image_small" class="form-control" multiple="multiple" style="border:none;" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group border-top mt-3">
						<label for="image_big">Image_big</label>
						<input type="file" name="image_big[]" id="image_big" class="form-control" multiple="multiple" style="border:none;" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<h3>Categories: </h3>
						@foreach($cat as $key =>$item)
							<label for="cat_{{$item['id'] }}" style="display:inline;">{{ $item['name_cat'] }}</label>
							<input type="radio" name="cat" id="cat_{{$item['id'] }}" value="{{ $item['id'] }}" multiple style="display:inline;">

						@endforeach
					</div>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-12">	
					<button type="submit" class="btn btn-primary btnAdd" >Thêm</button>
				</div>
			</div>
		</form>
	</div>
</div>
</section>
 @include('ckfinder::setup')
@endsection
@push('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>


@endpush