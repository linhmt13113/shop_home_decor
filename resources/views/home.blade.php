@extends('main')

@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1 m-t-102">
                @foreach ($sliders as $slider)
                    <div class="item-slick1" style="background-image: url({{$slider->thumb}});">
                        <div class="content-home height-100">
                            <div class="flex-col-l-m height-100 p-t-100 p-b-30 slider-text">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                    <span class="hot-text">
                                        HOT
                                    </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="slider-title">
                                        {{$slider->name}}
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="{{$slider->url}}"
                                       class="btn-shop-now">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Product -->
    <section class="product-section">
        <div class="content-home">
            <div class="p-b-10">
                <h3 class="product-overview">
                    Product Overview
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="filter-group">
                    <button class="filter-btn active" data-filter="*">
                        All Products
                    </button>
                </div>
            </div>

            <div id="loadProduct">
                @include('products.list')
            </div>

            <!-- Load more -->
            <div class="load-more">
                <input type="hidden" value="1" id="page">
                <a onclick="loadMore()" class="btn-load-more">
                    Load More
                </a>
            </div>
        </div>
    </section>
@endsection
