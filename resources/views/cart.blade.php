<!-- Cart -->
<div class="wrap-h-cart js-panel-cart">
    <!-- Overlay (Background) -->
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-50 p-r-20">
        <!-- Cart Title and Close Button -->
        <div class="h-cart-title flex-w flex-sb-m p-b-16">
            <span class="text-title">Your Cart</span>

            <div class="fs-40 lh-10 p-lr-6 pointer hover-close trans-05 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <!-- Cart Content -->
        <div class="h-cart-content flex-w js-pscroll">
            @php
                $sumPriceCart = 0;
            @endphp

            <!-- Cart Item List -->
            <ul class="h-cart-wrapitem w-full">
                <!-- If cart is empty -->
                @if(isset($products) && count($products) === 0)
                    <div class="h-cart-empty-message">
                        Your cart is empty.
                    </div>
                @elseif(isset($products) && count($products) > 0)
                            @foreach ($products as $key => $product)
                                        @php
                                            $price = \App\Helpers\Helper::price($product->price, $product->price_sale);
                                            $sumPriceCart += $product->price_sale != 0 ? $product->price_sale : $product->price;
                                        @endphp

                                        <li class="h-cart-item flex-w flex-t m-b-12">
                                            <!-- Product Image -->
                                            <div class="h-cart-item-img">
                                                <img src="{{$product->thumb}}" alt="IMG">
                                            </div>

                                            <!-- Product Info -->
                                            <div class="h-cart-item-txt p-t-8">
                                                <a href="#" class="h-cart-item-name m-b-18 hover-close trans-04">
                                                    {{$product->name}}
                                                </a>

                                                <span class="h-cart-item-info">
                                                    {!! $price !!}
                                                </span>
                                            </div>
                                        </li>
                            @endforeach
                @endif
            </ul>

            <!-- Total Price and Cart Buttons -->
            <div class="w-full">
                <!-- Total Price -->
                <div class="h-cart-total w-full p-tb-20">
                    Total: £{{ number_format($sumPriceCart, '0', '', '.') }}
                </div>

                <!-- Cart Action Buttons -->
                <div class="h-cart-buttons flex-w w-full p-tb-40">
                    <a href="/carts"
                        class="flex-c-m new-text-style white-text size-button dark-bg rounded-border hover-effect-btn p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="/carts"
                        class="flex-c-m new-text-style white-text size-button dark-bg rounded-border hover-effect-btn p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
