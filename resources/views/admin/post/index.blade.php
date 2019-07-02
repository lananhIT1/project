@extends('admin.baseadmin')
@section('content')
<div class="row">
  <h2 class="text-center">List Posts</h2>
  <h3 class="text-center">{{ $addPost }}</h3>
  <h3 class="text-center">{{ $delPost }}</h3>
  <div class="infoview">
	<table class="table table-bordered-dark tablecommond">
  <thead>
    <tr class="border-dark">
      <th scope="col" style="border:1px solid black;">id</th>
      <th scope="col" style="border:1px solid black;">Title</th>
      <th scope="col" width="400px" style="border:1px solid black;">Summary</th>
      <th scope="col" style="border:1px solid black;">Image_small</th>
      <th scope="col" style="border:1px solid black;">Image_big</th>
      <th scope="col" style="border:1px solid black;">Name_cat</th>
      <th scope="col" style="border:1px solid black;" colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($infoPost as $key=>$item)
      <tr>
    	  <th scrope="row">{{ $item['id'] }}</th>
        <td>{{ $item['title'] }}</td>
        <td>{{ $item['summary'] }}</td>
        <td><img src="{{ URL::to('/') }}/upload/image_small/{{ $item['image_small'][0] }}" alt="" width="100" height="100"></td>
        <td><img src="{{ URL::to('/') }}/upload/image_big/{{ $item['image_big'][0] }}" alt="" width="100" height="100"></td>
        <td>{{ $item['name_cat'] }}</td>
        <td ><a href="{{ route('admin.infoPost',['id'=>$item['id']]) }}"><i class="fa fa-eye"></i></a></td>
        <td><a href="{{ route('admin.editPost',['id'=>$item['id']]) }}"><i class="fa fa-edit"></i></a></td>
        <td><a href="{{ route('admin.deletePost',['id'=>$item['id']]) }}" class="btn-delete"><i class="fa fa-trash-alt"></i></a></td>
     
    </tr>
    @endforeach
  </tbody>
</table>
{{ $link->appends(request()->query())->links() }}
</div>
</div>
@endsection
@push('css')
<style tyle="text/css">
  table.tablecommond{
   
    margin-right:10px;
  }
</style>
@endpush
@push('js')
<script type="text/javascript">
  $(function(){
      $( "a.btn-delete" ).click(function( event ) {
          event.preventDefault();
          var rel = confirm("Đồng ý xóa?","Thông báo");
          if(rel) {
            window.location= $(this).attr("href");
          }
      });
      $('li.list-post').addClass('active');
    });
</script>
@endpush