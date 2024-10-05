@extends('layout.index')

@section('title','Kết quả tìm kiếm')

@section('content')
<div class="container">
    <div class="row">
        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"id="cltieude" style="background-color:#337AB7; color:white;">
                    <h4><b>Kết quả tìm kiếm cho: "{{ $search }}"</b></h4>
                </div>

                @if($results->count() > 0)
                    @foreach($results as $lt)
                    <div class="row-item row">
                        <div class="col-md-3">
                            <a href="{{route('view.tinchitiet', $lt->id)}}">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$lt->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>{{ $lt->TieuDe }}</h3>
                            <p>{{ $lt->TomTat }}</p>
                            <a class="btn buttonXem" href="{{route('view.tinchitiet', $lt->id)}}">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                @else
                    <h1>Không tìm thấy kết quả nào.</h1>
                @endif
                {{$results->onEachSide(3)->links()}}
            </div>
        </div> 
    </div>
</div>
@endsection
