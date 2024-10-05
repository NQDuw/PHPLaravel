@extends('layout.index')
    @section('title','Trang Đăng Ký')
    @section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div id="cltieude"class=" panel-heading ">Đăng ký tài khoản</div>
				  	<div class="panel-body">
				    	<form action="{{route('postdangky')}}" method="POST">
							@csrf
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control " placeholder="Username" value="{{old('name')}}" name="name" >
								<span class="text-danger fst-italic">
									@error('name')
										{{$message}}
									@enderror
								</span>
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" value="{{old('email')}}" name="email"
							  	>
								  <span class="text-danger fst-italic">
									@error('email')
										{{$message}}
									@enderror
								</span>
							</div>
							<br>	
							<div>
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" value="{{old('password')}}" placeholder="Mật khẩu" name="password">
								<span class="text-danger fst-italic">
									@error('password')
										{{$message}}
									@enderror
								</span>
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" value="{{old('password_confirmation')}}" placeholder=" Nhập lại mật khẩu" name="password_confirmation">
								<span class="text-danger fst-italic">
									@error('password')
										{{$message}}
									@enderror
								</span>
							</div>
							<br>
								@if(session('message'))
                                    <div class="{{ session('message') == 'Đăng ký thành công' ? 'text-success' : 'text-danger' }}">  
                                        <i>{{session('message')}}</i>
                                    </div>
                                @endif
							<br>
							<button type="submit" class="btn buttonpost">Đăng ký</button>
							<a href="/dangnhap" class="btn buttonback">Đến Đăng Nhập</a>
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
