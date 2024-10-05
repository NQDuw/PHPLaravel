    @extends('layout.index')
    @section('title','Trang chủ')
    @section('content')
    <div class="container">

    	<!-- slider -->
    	    @include('layout.slide')
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div id="cltieude"class="panel-heading">
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
					<div class="vientin">
						@foreach($theloais as $tl)
							@if(count($tl->loaitins)>0)
							<!-- item -->
							<div class="row-item row">
								
										<h3>
											<a href="category.html">{{$tl->Ten}}</a> | 	
											@foreach($tl->loaitins as $lt)
											<small><a href="{{route('view.tintheoloai',$lt->id)}}"><i>{{$lt->Ten}}</i></a>/</small>
											@endforeach
										</h3>
										@php 
											$data =$tl->tintucs->where('NoiBat',1)->sortByDesc('created_at')->take(5);
											$tin1 =$data->shift(); 
										@endphp
										<div  class="col-md-8 border-right">
											<div class="col-md-5">
												<a href="{{route('view.tinchitiet',$tin1->id)}}">
													<img style="width:300px; height:120px;" class="img-responsive" src="upload/tintuc/{{ $tin1->Hinh }}" alt="">
												</a>
											</div>
			
											<div class="col-md-7">
												<h3>{{ $tin1->TieuDe }}</h3>
												<p>{{ $tin1->TomTat }}</p>
												<a class="btn buttonXem " href="{{route('view.tinchitiet',$tin1->id)}}">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
											</div>
										</div>
										<div class="col-md-4">
											@foreach($data->all() as $tintuc)
											<a href="{{route('view.tinchitiet',$tintuc['id'])}}">

												<h4>
													<span class="glyphicon glyphicon-list-alt"></span>
													{{$tintuc['TieuDe']}}
												</h4>
											</a>
											@endforeach
										
									</div>
									<div class="break"></div>
								
							</div>
							<!-- end item -->
							@endif
						@endforeach
						</div>
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    @endsection