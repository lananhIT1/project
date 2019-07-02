@extends('admin.baseadmin')
@section('content')
<div class="row">
  <h2 class="text-center">List User</h2>
  <h3 class="text-center">{{-- {{ $addSlide }} --}}</h3>
  <h3 class="text-center">{{-- {{ $delPost }} --}}</h3>
  <div class="infoview">
	<table class="table  tablecommond">
  <thead>
    <tr class="border-dark">
      <th scope="col" style="border:1px solid black;">id</th>
      <th scope="col" style="border:1px solid black;">Username</th>
      <th scope="col" style="border:1px solid black;">Password</th>
      <th scope="col" style="border:1px solid black;">Email</th>
      <th scope="col" style="border:1px solid black;">Avatar</th>
      <th scope="col" style="border:1px solid black;">Role</th>
      <th scope="col" style="border:1px solid black;">Status</th>
      <th scope="col" style="border:1px solid black;" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($info as $key=>$item)
      <tr>
    	  <th scrope="row">{{ $item['id'] }}</th>
        <td>{{ $item['username'] }}</td>
        <td>{{ $item['password'] }}</td>
        <td>{{ $item['email']}}</td>
        <td style="text-align:center;"><img src="{{ URL::to('/') }}/upload/user/{{ $item['avatar'] }}" alt="" width="100" height="80"></td>
        <td>{{ $item['role'] }}</td>
        <td>{{ $item['status']}}</td>
        <td><a href="{{ route('admin.editUser',['id'=>$item['id']]) }}"><i class="fa fa-edit"></i></a></td>
        <td><a href="{{ route('admin.deleteUser',['id'=>$item['id']]) }}" class="btn-delete"><i class="fa fa-trash-alt"></i></a></td>
     
    </tr>
    @endforeach
  </tbody>
</table>
    {{ $link->appends(request()->query())->links() }}
</div>
</div>
@endsection
{{-- @push('css')
<style tyle="text/css">
  /*table.tablecommond{
   
    margin-right:10px;
  }*/
</style>
@endpush --}}
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
    });
  $(function(){
      $('li.list-user').addClass('active');
    });
</script>
@endpush