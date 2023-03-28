@extends('front.layout.master')



@section('content')

    <!-- Start Banner Area -->
@section('breadcrumb')
    @include('front.layout.partials.breadcrumb')
@endsection


<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0
                            @endphp
                            @forelse ($cart as $item)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="img/cart.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $item['name'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>${{ $item['price'] }}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input readonly type="text" name="qty" id="sst" maxlength="12"
                                                value="{{ $item['quantity'] }}" title="Quantity:" class="input-text qty">
                                        </div>
                                    </td>
                                    <td>
                                        <h5>${{ $item['quantity'] * $item['price'] }}</h5>
                                    </td>
                                </tr>
                                @php

                                    $total += $item['quantity'] * $item['price']
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <h3 class="text-center">No item in cart</h3>
                                    </td>
                                </tr>


                            @endforelse


                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>${{ $total }}</h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <input type="hidden" name="amount" value="{{ $total }}">
                                        <button class="primary-btn" href="#">Proceed to checkout</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

@endsection
