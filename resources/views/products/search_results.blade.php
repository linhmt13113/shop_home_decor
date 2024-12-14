@extends('main')

@section('content')
<section class="bg0 p-t-130 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-30 cl5">
                @isset($title)
                     Results for: {{ $title }}
                @else
                    Product Overview
                @endisset
            </h3>
        </div>


        <div class="row" id="product-list">

            <div class="col-sm-12">
                <div class="product-wrapper">
                    @include('products.list', ['products' => $products])
                </div>
            </div>

        </div>


    </div>
</section>
@endsection
