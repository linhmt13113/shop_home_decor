@extends('main')

@section('content')

<form class="color-white-bg p-t-130 p-b-85" method="post">
    @include('admin.alert')

    @if (count($products) != 0)
    <div class="content-cart-list">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r-38 ">
                    <div class="wrap-table-shopping-cart">
                        @php $total = 0; @endphp
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                    <th class="column-6">&nbsp;</th>
                                </tr>

                                <!-- notice * -->
                                @foreach($products as $key => $product)
                                @php
                                $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                $priceEnd = $price * $carts[$product->id];
                                $total += $priceEnd;
                                @endphp
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="display-item">
                                            <img src="{{ $product->thumb }}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">{{ $product->name }}</td>
                                    <td class="column-3">£{{ number_format($price, 0, '', '.') }}</td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down color-8 hv-3-button trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">

                                            <div class="btn-num-product-up color-8 hv-3-button trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5">£{{ number_format($priceEnd, 0, '', '.') }}</td>
                                    <td class="p-r-15">
                                        <a class="delete-color" href="/carts/delete/{{ $product->id }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m solid-border p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <input type="submit" value="Update Cart" formaction="/update-cart"
                            class="flex-c-m text-15 black-color sz-1 hv-color radius-22 hv-3-button p-lr-15 trans-04 pointer m-tb-10">
                        @csrf
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="radius-0 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="text-20 black-color p-b-10">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t p-t-16 p-b-16">
                        <div class="size-208">
                            <span class="text-18 black-color">
                                Total:
                            </span>
                        </div>

                        <div class="size-208 p-t-1">
                            <span class="text-18 black-color">
                            £{{ number_format($total, 0, '', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor15 p-t-15 p-b-30">

                        <div class="sz-320 p-r-18 p-r-0-sm w-full-ssm">
                            <div class="p-t-15">
                                <span class="text-20 color-8">
                                    Customer Information
                                </span>

                                <div class="radius-2 color-white-bg m-b-12">
                                    <input class="text-13 color-8 sz-40 p-lr-15" type="text" name="name" placeholder="Customer name" >
                                </div>

                                <div class="radius-2 color-white-bg m-b-12">
                                    <input class="text-13 color-8 sz-40 p-lr-15" type="text" name="phone" placeholder="Phone" >
                                </div>

                                <div class="radius-2 color-white-bg m-b-12">
                                    <input class="text-13 color-8 sz-40 p-lr-15" type="text" name="address" placeholder="Delivery Address">
                                </div>

                                <div class="radius-2 color-white-bg m-b-12">
                                    <input class="text-13 color-8 sz-40 p-lr-15" type="text" name="email" placeholder="Email">
                                </div>

                                <div class="radius-2 color-white-bg m-b-12">
                                    <textarea class="color-8 sz-40 p-lr-15" name="content" placeholder="Note"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <button class="flex-c-m text-15 color-white sz-2 color-222 bor15 hv-3-button p-lr-15 trans-04 pointer">
                        Order
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@else
<div class="text-center">
    <h2>Empty Cart</h2>
</div>
<div class="spacer" style="height: 400px;"></div>

@endif
@endsection
