@extends('layout.index')
    @section('title','Trang chi Tiết')
    @section('content')
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintucs->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <b><a href="#">Nguyễn Quốc Dư</a></b>
                </p>

                <!-- Preview Image -->
                <img style="width:900px; height:350px" class="img-responsive" src="/upload/tintuc/{{$tintucs->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> {{$tintucs->updated_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{{$tintucs->TomTat}}</p>
                <p>{!!$tintucs->NoiDung!!}</p>
                
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="{{route('postcomment')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="noidung"></textarea>
                        </div>
                        <!-- Trường ẩn để gửi idtintuc và idusers -->
                        <input type="hidden" name="idtintuc" value="{{ $tintucs->id }}">
                        <input type="hidden" name="iduser" value="{{ auth()->user()->id }}">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                @foreach($comment as $cmt)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                        {{ $usersname[$cmt->idUser]->name  }}
                            <small>{{$cmt->created_at}}</small>
                        </h4>
                       {{$cmt->NoiDung}}
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div id="cltieude" class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                        @foreach($tinlienquan as $tlq)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="{{route('view.tinchitiet',$tlq->id)}}">
                                    <img class="img-responsive" src="/upload/tintuc/{{$tlq->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="{{route('view.tinchitiet',$tlq->id)}}"><b>{{$tlq->TieuDe}}</b></a>
                            </div>
                            <p style="margin-left: 5px;">{{$tlq->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div id="cltieude" class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                        @foreach($tinnoibat as $tnb)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="{{route('view.tinchitiet',$tnb->id)}}">
                                    <img class="img-responsive" src="/upload/tintuc/{{$tnb->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="{{route('view.tinchitiet',$tnb->id)}}"><b>{{$tnb->TieuDe}}</b></a>
                            </div>
                            <p style="margin-left:5px;">{{$tnb->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->

                        @endforeach

                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    @endsection