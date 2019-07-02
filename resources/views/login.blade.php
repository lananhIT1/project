@extends('frontend.base')
@section('content')
<div class="main">
		<div class="container">
			
			<div class="row loginLogout">
				<div class="col-md-12 col-sm-12 col-lg-12 col">
					<div class="login">
						<h3>Login</h3>
						<form action="{{ route('fr.handleLogin') }}" method="POST">
							@csrf
			  				<div class="form-group">
			    				<label for="username">Username</label>
			    				<input type="text"  name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username"> 
			    				<p id="errUsername"></p>		
			    			</div>
			  				<div class="form-group">
			    				<label for="exampleInputPassword1">Password</label>
			    				<input type="password" class="form-control" id="password" placeholder="Password" name="password">
			    				<p id="errPass"></p>
			  				</div>
							<p style="color:black;text-align: center;">{{ $error }}</p>
			  				<button type="submit" class="btn btn-dark" id="btnLogin" >Đăng nhập</button>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
@endpush
@push('js')
<script type="text/javascript">
	// $(document).ready(function(){
//             $("#firstPage").click(function () {
//                 $("body,html").animate({scrollTop: 0}, 1000);
//             });
//         });

//check input empty

document.getElementById('btnLogin').onclick=function(){
		//lay duoc thong tin nguoi dung nhap vao 2 o text là user và pass
		let username=document.getElementById('username').value;
		let password=document.getElementById('password').value;
		
		let chkUser=null;
		let chkPass=null;
		if(username==''){
			chkUser=false;
			//thong bao loi o text
			document.getElementById('username').style.border='1px solid red';
			document.getElementById('errUser').innerHTML='User không được để trống';

		}else{
			chkUser=true;
			document.getElementById('username').style.border='';
			document.getElementById('errUser').innerHTML='';

		}
		if(password==''){
			chkPass=false;
			//thong bao loi o text
			document.getElementById('password').style.border='1px solid red';
			document.getElementById('errPass').innerHTML='Password không được để trống';

		}else{
			chkPass=true;
			document.getElementById('password').style.border='';
			document.getElementById('errPass').innerHTML='';

		}
		console.log(chkEmail);
		if(chkUser&&chkPass){
			// document.getElementById('frmLogin').submit();
			//window.location.href='{{-- route('fr.handleLogin') --}}';
		}
		else{
			return false;
		}
	}
// document.getElementById('btnLogout').onclick=function(){
// 		//lay duoc thong tin nguoi dung nhap vao 2 o text là user và pass
// 		let email=document.getElementById('email2').value;
		
// 		let password=document.getElementById('password2').value;
// 		let confirmPassword=document.getElementById('confirmPassword').value;
		
// 		let chkEmail=null;
// 		let chkPass=null;
// 		let chkConfirmPass=null;
// 		if(email==''){
// 			chkEmail=false;
// 			//thong bao loi o text
// 			document.getElementById('email2').style.border='1px solid red';
// 			document.getElementById('errEmail2').innerHTML='Email không được để trống';

// 		}else{
// 			chkEmail=true;
// 			document.getElementById('email2').style.border='';
// 			document.getElementById('errEmail2').innerHTML='';

// 		}
// 		if(password==''){
// 			chkPass=false;
// 			//thong bao loi o text
// 			document.getElementById('password2').style.border='1px solid red';
// 			document.getElementById('errPass2').innerHTML='Password không được để trống';

// 		}else{
// 			chkPass=true;
// 			document.getElementById('password2').style.border='';
// 			document.getElementById('errPass2').innerHTML='';

// 		}
// 		if(confirmPassword==''){
// 			chkConfirmPass=false;
// 			//thong bao loi o text
// 			document.getElementById('confirmPassword').style.border='1px solid red';
// 			document.getElementById('errComfirmPass').innerHTML='Password không được để trống';

// 		}else{
// 			chkConfirmPass=true;
// 			document.getElementById('confirmPassword').style.border='';
// 			document.getElementById('errComfirmPass').innerHTML='';

// 		}
		
// 		if(chkEmail&&chkPass&&chkConfirmPass){
// 			if(password==confirmPassword){
// 				window.location.href='index2.html';
// 			}else{
// 				document.getElementById('errComfirmPass').innerHTML='Mật khẩu phải giống nhau';
// 				return false;
// 			}
// 		}
// 		else{
// 			return false;
// 		}
// 	}


</script>
@endpush