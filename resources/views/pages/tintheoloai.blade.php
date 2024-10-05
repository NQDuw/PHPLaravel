    @extends('layout.index')
    @section('title','Tin Theo Loại')
    @section('content')
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div id="cltieude" class="panel-heading ">
                        <h4><b>{{$loaitins->Ten}}</b></h4>
                    </div>
                    <div class="vientin">
                        @foreach($tintucs as $tt)
                            <div class="row-item row">
                                <div class="col-md-3">

                                    <a href="{{route('view.tinchitiet',$tt->id)}}">
                                        <br>
                                        <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                    </a>
                                </div>

                                <div class="col-md-9">
                                    <h3>{{$tt->TieuDe}}</h3>
                                    <p>{{$tt->TomTat}}</p>
                                    <a class="btn buttonXem" href="{{route('view.tinchitiet',$tt->id)}}">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                                <div class="break"></div>
                            </div>
                        @endforeach
                    </div>
                   

                    <!-- Pagination -->
                   {{$tintucs->links()}}
                    <!-- /.row -->

                </div>
            </div> 
        </div>
        <!-- /.row -->
    </div>
    @endsection