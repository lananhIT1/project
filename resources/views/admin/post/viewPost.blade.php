@extends('admin.baseadmin')
@section('content')
<div class="row">
	<h3 class="text-center">Information of post</h3>
	<div class="info">
		<table class="none" style="border:none;margin-left:20px;" >
			<thead>
				<tr>
					<th width="100px" style="border:none;text-align:right;"></th>
					<th  style="border:none"></th>
				</tr>
			</thead>
			<tbody style="border:none;">
				<tr >
					<td><h4>Title</h4></td>
					<td>{{ $infoPost['title'] }}</td>
				</tr>
				<tr >
					<td><h4>Summary</h4></td>
					<td>{{ $infoPost['summary'] }}</td>
				</tr>
				<tr >
					<td><h4>Content</h4></td>
					<td>{{ $infoPost['content'] }}</td>
				</tr>
				<tr >
					<td><h4>Image_small</h4></td>
					<td><img src="{{ URL::to('/') }}/upload/image_small/{{ $infoPost['image_small'][0] }}" alt="" width="70px" height="50px"></td>
				</tr>
				<tr>
					<td><h4>Image_big</h4></td>
					<td><img src="{{ URL::to('/') }}/upload/image_big/{{ $infoPost['image_big'][0] }}" alt="" width="500" height="250"></td>
				</tr>
				<tr>
					<td><h4>Name_cat</h4></td>
					<td>{{ $infoPost['name_cat'] }}</td>
				</tr>
				<tr>
					<td><h4>View:</h4> </td>
					<td>{{ $infoPost['views'] }}</td>
				</tr>
				<tr>
					<td><h4>status</h4></td>
					<td>{{ $infoPost['status'] }}</td>
				</tr>
				<tr>
					<td><h4>Created_at</h4></td>
					<td>{{ $infoPost['created_at'] }}</td>
				</tr>
				<tr>
					<td><h4>Updated_at</h4></td>
					<td>{{ $infoPost['updated_at'] }}</td>
				</tr>
			</tbody>
			
		</table>
	</div>
	
</div>
@endsection