@extends("components.layout")
@section("content")
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Tin Tức</h3>
                <ul>
                    <li><a href="{{route("trang-chu")}}">Trang Chủ</a></li>
                    <li><a href="">Chi Tiết Tin Tức</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="main_blog_area p_100">
        <div class="container">
            <div class="row blog_area_inner">
                <div class="col-lg-9">
                    <div class="main_blog_inner single_blog_inner">
                        <div class="blog_item">
                            <div class="blog_img">
                                <img class="img-fluid" src="{{asset($new->image)}}" alt="">
                            </div>
                            <div class="blog_text">
                                <div class="blog_time">
                                    <div class="float-left">
                                        <a href="#">08 Feb. 2018</a>
                                    </div>
                                    <div class="float-right">
                                        <ul class="list_style">
                                            <li><a href="#">By :  Admin</a></li>
                                            <li><a href="#">bekery, sweet</a></li>
                                            <li><a href="#">Comments: 8</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="#"><h4>{{$new->new_title}}</h4></a>
                                <p>{!! $new->new_content !!} </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
