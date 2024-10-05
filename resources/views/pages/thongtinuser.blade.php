@extends('layout.index')
    @section('title','Trang Thông Tin')
    @section('content')
   <!-- Page Content -->
   <div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div  class="panel panel-default">
				<div id="cltieude" class="panel-heading">Thông tin tài khoản</div>
				<div class="panel-body">
					<form action="{{route('postupdate',['id' => $user->id])}}" method="POST">
						@csrf
						<div>
							<label>Họ tên</label>
							<input type="text" class="form-control" value="{{$user->name}}" placeholder="Username" name="name">
							<span class="text-danger fst-italic">
									@error('name')
										{{$message}}
									@enderror
								</span>
						</div>
						<br>
						<div>
						<label>Email</label>
							<label>Email</label>
							<input type="email" class="form-control" value="{{$user->email}}" placeholder="Email" name="email" readonly>
							<span class="text-danger fst-italic">
									@error('email')
										{{$message}}
									@enderror
								</span>
						</div>
						<br>	
						<div>
							<label>Đổi mật khẩu</label>
							<input type="password" class="form-control" value="{{$user->password}}" name="password" >
							<span class="text-danger fst-italic">
								@error('password')
									{{$message}}
								@enderror
							</span>
						</div>
						<br>
						<div>
							<label>Nhập lại mật khẩu</label>
							<input type="password" class="form-control" value="{{$user->password}}" name="passwordAgain" >
							<span class="text-danger fst-italic">
								@error('password')
									{{$message}}
								@enderror
							</span>
						</div>
						<br>
							@if(session('message'))
								<div class="{{ session('message') == 'Cập nhật thành công' ? 'text-success' : 'text-danger' }}">  
									<i>{{session('message')}}</i>
								</div>
							@endif
						<br>
						<button type="submit" class="btn buttonpost" >Sửa
						</button>

					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<!-- end slide -->
	</div>
<!-- end Page Content -->
    @endsection
