@extends('frontend.layouts.main')

@section('title')
    category
@endsection

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">All Products</h2>
                        <ul>
                            @foreach($brand as $ps)
                                <li><a href="{{route($ps->name)}}">{{$ps->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="mx-auto" align="center" justify="center">
                        <h2 class="sidebar-title">Products</h2>
                        </div>
                        @foreach($data as $product)
                            <div class="col-md-4">
                                <div class="single-product">
                                
                                    <div class="product-f-image">
                                        <img src="/photo/{{ $product->avatar }}" style="height:400px; width:400px;" alt="">
                                        <div class="product-hover">
                                            <a href="{{route('details',$product->id)}}" class="add-to-cart-link"><i class="fa fa-eye fa-lg"></i> </a>
                                        </div>
                                    </div>
                                    <h2 style="color:maroon;">{{$product->name}}</h2>
                                    <div class="product-carousel-price">
                                        <ins>Rs. {{$product->real_price}}.00</ins> <del style="color:red;">Rs. {{$product->price}}.00</del>
                                    </div>  
                                    
                                    <div class="product-option-shop">
                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('add-to-cart/'.$product->id) }}">Add to cart</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection