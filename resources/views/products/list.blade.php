<div class="row isotope-grid">
    @foreach($products as $key => $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
            <!-- Display Product -->
            <div class="display-product">
                <div class="display-product-pic hv-product">
                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                </div>

                <div class="display-product-txt flex-w flex-t p-t-14">
                    <div class="display-product-txt-child1 flex-col-l ">
                        <a class="a-display-product" href="/products/{{ $product->id }}-{{\Str::slug($product->name, '-') }}.html"
                           class=" text-light-muted trans-04 js-name-b2 p-b-6">
                            {{ $product->name }}
                        </a>



                        <span class="a-display-product text-muted">
							{!!  \App\Helpers\Helper::price($product->price, $product->price_sale)  !!}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
