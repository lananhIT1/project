@extends('admin.baseadmin')
@section('content')
<div class="row">
  <h2 class="text-center">List Category</h2>
  <h3 class="text-center">{{-- {{ $addSlide }} --}}</h3>
  <h3 class="text-center">{{-- {{ $delPost }} --}}</h3>
  <div class="infoview">
	<table class="table table-bordered-dark tablecommond">
  <thead>
    <tr class="border-dark">
      <th scope="col" style="border:1px solid black;">id</th>
      <th scope="col" style="border:1px solid black;">Name_Category</th>
      <th scope="col" style="border:1px solid black;">Action</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($infoCat as $key=>$item)
      <tr>
    	<th scrope="row">{{ $item['id'] }}</th>
        <td>{{ $item['name_cat'] }}</td>
        <td><a href="{{ route('admin.editCategory',['id'=>$item['id']]) }}"><i class="fa fa-edit"></i></a><a href="{{-- {{ route('admin.deletePost',['id'=>$item['id']]) }} --}}" class="btn-delete"><i class="fa fa-trash-alt"></i></a></td>
     
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
@endsection