@extends('main')
@section('content')
    <div class="content-wrapper-give p-t-80">
        <div class="flex-w p-l-25 p-r-15 p-t-130 p-lr-0-lg">
            <a href="/" class="text-bold-large text-medium-dark hover-color-primary trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/categories/{{ $product->menu->id }}-{{ \Str::slug($product->menu->name) }}.html"
               class="text-bold-large text-medium-dark hover-color-primary trans-04">
                {{ $product->menu->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="text-bold-large text-light-muted">
				{{ $title }}
			</span>
        </div>
    </div>

    <section class=" clo-background-white p-t-65 p-b-60">
        <div class="content-wrapper-give">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" style="" role="tablist">
                                    <li class="slick-active" role="presentation">
                                        <img src="{{ $product->thumb }}">
                                        <div class="slick3-dot-overlay"></div>
                                    </li>
                                </ul>
                            </div>


                            <div class="slick3 slick-initialized slick-slider slick-dotted">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1539px;">
                                        <div class="item-slick3 slick-slide slick-current slick-active">
                                            <div class="wrap-pic-w pos-relative">
                                            <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">

                        @include('admin.alert')

                        <h4 class="text-large text-dark js-name-detail p-b-14">
                            {{ $title }}
                        </h4>

                        <span class="text-semi-bold text-dark">
							{!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}
						</span>

                        <p class="text-large text-muted p-t-23">
                            {{ $product->description }}
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="full-width-minus flex-w flex-m ">
                                    <form action="/add-cart" method="post">
                                        @if ($product->price !== NULL)
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10 ">
                                                <div class="btn-num-product-down text-medium-dark hover-btn-primary trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="text-medium-title text-muted txt-center num-product " type="number"
                                                       name="num_product" value="1">

                                                <div class="btn-num-product-up text-medium-dark hover-btn-primary trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>


                                            <button type="submit"
                                                    class="flex-c-m text-uppercase-bold text-white btn-large clo-background-primary border-rounded hover-btn-dark p-r-100 p-l-100 p-lr-15 trans-04 ">
                                                Add to cart
                                            </button>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @endif
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="border-light m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab0 text-bold-large">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10 ">
                            <a class="nav-link active " data-toggle="tab" href="#description" role="tab">Description:</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="text-normal text-grey">
                                    {!! $product->content !!}
                                </p>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <div class="clo-background-light flex-c-m flex-w sz-h-80 m-t-73 p-tb-15">

            <span class="text-bold-large text-grey p-lr-25">
				Categories: {{ $product->menu->name }}
			</span>
        </div>
    </section>

    <section class=" clo-background-white p-t-45 p-b-105">
        <div class="content-wrapper-give">
            <div class="p-b-45">
                <h3 class="text-bold-large text-darkest txt-center">
                    Related Products
                </h3>
            </div>

            @include('products.list')
        </div>
    </section>

@endsection
