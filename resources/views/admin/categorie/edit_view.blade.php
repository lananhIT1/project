@extends('admin.baseadmin')
@section('content')
<div class="row">
	<form action="{{ route('admin.handleEditCat') }}" method="POST">
		<div class="form-group">
			<label for="name">Tên danh mục</label>
			<input type="text" id="name" name="name" value="{{ $infoCat['name_cat'] }}">
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>	

@endsection