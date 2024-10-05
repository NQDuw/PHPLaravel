@extends('layout.index')
    @section('title','Trang Đăng Nhập')
    @section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
					
				  	<div id="cltieude" class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
						  <form action="{{route('postdangnhap')}}" method="POST">
							@csrf
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value="{{old('email')}}" placeholder="Email" name="email" >
								<span class="text-danger fst-italic">
									@error('email')
										{{$message}}
									@enderror
								</span>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" value="{{old('password')}}" placeholder="Mật khẩu"  name="password">
								<span class="text-danger fst-italic">
									@error('password')
										{{$message}}
									@enderror
								</span>
							</div>
							<br>
								@if(session('message'))
                                    <div class="text-danger">  
                                        <i>{{session('message')}}</i>
                                    </div>
                                @endif
							<br>
							<button type="submit" class="btn buttonpost">Đăng nhập
							</button>
							<a href="/dangky" class="btn buttonback">Đến đăng ký</a>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
    @endsection
