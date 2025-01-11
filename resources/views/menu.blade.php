@extends('main')

@section('content')
<link rel="stylesheet" type="text/css" href="/template/css/main/menu.css">

    <div class="bg0 m-t-23 p-b-140 p-t-120">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                   <h1>{{ $title }}</h1>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m text-18 text-color button-size styles-border pointer hv-button trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter menu-color-2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter menu-color-2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="text-20 menu-color-2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="{{ request()->url() }}" class="click-filter text-18 trans-04 act-fil" >
                                        Default
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'desc']) }}" class="click-filter text-18 trans-04">
                                        Price: High to Low
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'asc']) }}" class="click-filter text-18 trans-04">
                                        Price: Low to High
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="text-20 menu-color-2 p-b-15">
                                Price
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="{{ request()->url() }}" class="click-filter text-18 trans-04 act-fil">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price_min' => 0, 'price_max' => 50]) }}" class="click-filter text-18 trans-04">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price_min' => 50, 'price_max' => 100]) }}" class="click-filter text-18 trans-04">
                                        $50.00 - $100.00
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>

            @include('products.list')

            {!! $products->links() !!}
        </div>
    </div>
<div class="spacer" style="height: 100px;"></div>

@endsection



