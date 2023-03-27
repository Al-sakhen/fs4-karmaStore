@extends('front.layout.master')



@section('content')

    <!-- Start Banner Area -->
@section('breadcrumb')
    @include('front.layout.partials.breadcrumb')
@endsection


<!--================Single Product Area =================-->
<div class="py-3 product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class=" h-50">
                    <div class="single-prd-item">
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$product->image) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>
                    <h2>${{ $product->price }}</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Category</span> : {{ $product->category->name }}</a></li>
                        <li><a href="#"><span>Availibility</span> : {{ $product->quantity > 0 ? 'In Stock'  : 'Out Of Stock'}}</a></li>
                    </ul>
                    <p>{{ $product->description }}</p>
                        @if ($product->quantity > 0)
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" maxlength="12" value="1"
                                title="Quantity:" class="input-text qty">
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <a class="primary-btn" href="#">Add to Cart</a>
                            <a class="icon_btn" href="#"><i class="lnr lnr-diamond"></i></a>
                            <a class="icon_btn" href="#"><i class="lnr lnr-heart"></i></a>
                        </div>

                        @else
                            <div class="card_area d-flex align-items-center">
                                <a class="primary-btn" href="#">Out Of Stock</a>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->


@endsection
