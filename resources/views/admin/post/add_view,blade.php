@extends('admin.baseadmin')
@section('content')
<section class="content">
	<div class="row">
	<h3>Thêm bài viết</h3>
	</div>
	<div class="info">
		<form action="" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="title">
							Title:
						</label>
						<input type="text" class="form-control" name="title" id="title">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="summary">
							Summary:
						</label>
						<input type="text" class="form-control" name="summary" id="summary">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="content">
							Content:
						</label>
						<textarea name="content" id="content" cols="30" rows="10" class="form-control ckeditor"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group border-top mt-3">
				<label for="image_small">Image_small</label>
				<input type="file" name="image[]" id="images" class="form-control" multiple="multiple" style="border:none;">
			</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="">
							:
						</label>
						<input type="text" class="form-control" name="" id="">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</section>
@endsection
@push('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script> 
@endpush