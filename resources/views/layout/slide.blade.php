<!-- slider -->
<div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    
                    @foreach ($slides as $Arr=>$sl)
                    <!-- Arr ở đây đại diện cho phần tử đầu tiên trong vong lập foreach là 0 -->
                        <li data-target="#carousel-example-generic" data-slide-to="{{$Arr}}" class="{{ $Arr == 0 ? 'active' : '' }}"></li>
                    @endforeach
                    </ol>
                    <div class="carousel-inner">
                    @php $i=0; @endphp
                    @foreach ($slides as $sl)
                        <div    
                        @if( $i == 0) 
                        class="item active"
                        @else
                        class="item"
                        @endif  
                        @php $i++; @endphp  
                        >
                            <img style="width:1140px; height:385px;" class="slide-image"  src="upload/slide/{{$sl->Hinh}}" alt="{{$sl->Ten}}">
                        </div>
                    @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end slide -->

   