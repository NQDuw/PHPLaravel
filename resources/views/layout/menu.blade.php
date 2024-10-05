<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" id="cltieude" class="list-group-item menu1 active">
            Thể Loại
        </li>
        @foreach($theloais as $tl)
            @if(count($tl->loaitins)>0)
                <li href="#" class="list-group-item menu1">
                    {{$tl->Ten}}
                </li>
                <ul>
                    @foreach($tl->loaitins as $lt)
                        @if(count($lt->tintucs)>0)
                            <li class="list-group-item">
                                <a href="{{route('view.tintheoloai',$lt->id)}}">{{$lt->Ten}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>