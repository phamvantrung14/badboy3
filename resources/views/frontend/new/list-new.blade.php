@extends("components.layout")
@section("content")
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Tin Tức</h3>
                <ul>
                    <li><a href="{{route("trang-chu")}}">Trang Chủ</a></li>
                    <li><a href="">Tin Tức</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="main_blog_area p_100">
        <div class="container">
            <div class="row blog_area_inner">
                <div class="col-lg-9">
                    <div class="main_blog_inner">
                        @foreach($new as $value)
                        <div class="blog_item">
                            <div class="blog_img">
                                <img class="img-fluid" src="{{asset($value->image)}}" alt="">
                            </div>
                            <div class="blog_text">
                                <div class="blog_time">
                                    <div class="float-left">
                                        <a href="#">{{$value->updated_at}}</a>
                                    </div>
                                    <div class="float-right">

                                    </div>
                                </div>
                                <a href="#"><h4>{{$value->new_title}}</h4></a>
                                <a class="pink_more" href="{{route("trangchu.chitiet.tintuc",["new"=>$value->id])}}">Chi Tiết</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    {!! $new->render('vendor.pagination.pgi') !!}
                </div>

            </div>
        </div>
    </section>
@endsection
