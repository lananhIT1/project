@extends('admin.baseadmin')
@section('content')
<section class="content">
	<div class="row">
	<h3>Thêm mới user</h3>
	@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
	</div>
	<div class="infoview">
		<form action="{{ route('admin.handleAddUser') }}" method="POST" style="padding-left:10px;" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="username">
							Username:
						</label>
						<input type="text" class="form-control" name="username" id="username" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="password">
							Password:
						</label>
						<input type="text" class="form-control" name="password" id="password" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="email">
							Email::
						</label>
						<input type="text" class="form-control" name="email" id="email" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group border-top mt-3">
						<label for="avatar">Avatar: </label>
						<input type="file" name="avatar" id="avatar" class="form-control" style="border:none;" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<div class="form-group">
						<label for="role">
							Role:
						</label>
						<select class="custom-select" name="role" id="role">
  							<option value="0" selected>Người đọc</option>
  							<option value="-1">Admin</option>
  						</select>
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
						<input type="radio" name="active" value="0" id="unactive" class="absolute2">
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
@push('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
	
    CKEDITOR.replace( 'text', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
    $(function(){
      $('li.add-user').addClass('active');
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