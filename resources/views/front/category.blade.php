@extends('front.layout.master')



@section('content')

    <!-- Start Banner Area -->
@section('breadcrumb')
    @include('front.layout.partials.breadcrumb')
@endsection
<!-- End Banner Area -->
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Browse Categories</div>
                <ul class="main-categories">
                    @foreach ($categories as $category)
                        <li class="main-nav-list">
                            <a data-toggle="collapse" href="#{{ $category->name }}" aria-expanded="false"
                                aria-controls="{{ $category->name }}">
                                <span class="lnr lnr-arrow-right"></span>{{ $category->name }}
                            </a>
                            <ul class="collapse" id="{{ $category->name }}" data-toggle="collapse" aria-expanded="false"
                                aria-controls="{{ $category->name }}">
                                @foreach ($category->childrens as $child)
                                    <li class="main-nav-list child">
                                        <a
                                            href="{{ route('category') }}?category={{ $child->id }}">{{ $child->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="flex-wrap filter-bar d-flex align-items-center">
                <div class="sorting">
                    <select onchange="location= this.value">
                        <option value="{{ route('category') }}?select=2">2</option>
                        <option value="{{ route('category') }}?select=5">5</option>
                        <option value="{{ route('category') }}?select=7">7</option>
                        <option value="{{ route('category') }}?select=9">9</option>
                    </select>
                </div>
                <div class="mr-auto sorting">
                    <select>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                    </select>
                </div>
                {{ $products->links() }}
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="pb-40 lattest-product-area category-list">
                <div class="row">
                    @forelse ($products as $product)
                        <!-- single product -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="">
                                <div class="product-details">
                                    <h6>{{ $product->name }}</h6>
                                    <div class="price">
                                        <h6>${{ $product->price }}</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                    <div class="prd-bottom d-flex">
                                        @auth

                                        <form action="{{ route('cart.add' , $product->id) }}" method="post">
                                            @csrf
                                            <button class="border-0 social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">add to bag</p>
                                            </button>
                                        </form>
                                        @endauth

                                        @guest
                                        <a href="{{ route('signin') }}" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        @endguest


                                        <a href="{{ route('products.show' , $product->id) }}" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <div class="flex-wrap filter-bar d-flex align-items-center">
                <div class="mr-auto sorting">
                    <select>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                    </select>
                </div>
                {{ $products->links() }}
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>

@endsection
