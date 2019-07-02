@extends('admin.baseadmin')
@section('content')
<section class="content">
	<div class="row">
	<h3>Thêm danh mục</h3>
	<h2>{{ $addCat }}</h2>
	</div>
	<div class="infoview">
		<form action="{{ route('admin.handleAddCat') }}" method="POST" style="padding-left:10px;">
			@csrf
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="name">
							Name cat: 
						</label>
						<input type="text" class="form-control" name="name" id="name" required>
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
@endsection