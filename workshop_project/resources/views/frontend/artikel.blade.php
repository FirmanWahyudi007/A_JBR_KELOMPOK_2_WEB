@extends('frontend/layouts.template')
@section('content')
<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Artikel</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    @foreach ($data['artikel'] as $artikel)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('images/'.$artikel->sampul)}}" alt="">
                                    <h3 class="blog_item_date">{{$artikel->tanggal}}</h3>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('artikell.show', $artikel->url_artikel)}}">
                                    <h2>{{$artikel->judul_artikel}}</h2>
                                </a>
                                <p style="overflow: hidden; display: -webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;">{{$artikel->isi_artikel}}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>
                    @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

    </section>
    @endsection
    <!--================Blog Area =================-->