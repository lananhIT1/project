@extends('admin.baseadmin')
@section('content')
<section class="content">
	<div class="row">
	<h3>Thêm slider</h3>
	</div>
	<div class="infoview">
		<form action="{{ route('admin.handleAddSlide') }}" method="POST" enctype="multipart/form-data" style="padding-left:10px;">
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
					<div class="form-group border-top mt-3">
						<label for="image_slide">image_slide</label>
						<input type="file" name="image_slide" id="image_slide" class="form-control" style="border:none;" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="description">
							description:
						</label>
						<input type="text" class="form-control" name="description" id="description" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<h3>Status </h3>
						<label for="active" class="relative">Hoạt động</label>
						<input type="radio" name="active" value="1" id="active" class="absolute1">
						<label for="unactive" class="relative" style="margin-left:40px;">Không hoạt động</label>
						<input type="radio" name="active" value="1" id="unactive" class="absolute2">
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
<script type="text/javascript">
	
    CKEDITOR.replace( 'text', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
    $(function(){
      $('li.add-slide').addClass('active');
    });
    </script>
</script> 

@endpush
@push('css')
<style>
	label.relative{
		position:relative;
		display:inline;
	}
	input.absolute1,input.absolute2{
		position:absolute;
	}
	input.absolute1{
		bottom:10px;
		left:85px;
	}
	input.absolute2{
		bottom:10px;
		left:229px;
	}
</style>
@endpush