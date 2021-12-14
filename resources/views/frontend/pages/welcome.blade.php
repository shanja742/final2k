@extends('frontend.layouts.main')


@section('title')
    Home
@endsection

@section('content')

<div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="{{asset('store/img/h4-slide.jpg')}}" style="height:400px;" alt="Slide">
					</li>
					<li>
                        <img src="{{asset('store/img/h4-slide2.jpg')}}" style="height:400px;" alt="Slide">
					</li>
					<li>
                        <img src="{{asset('store/img/h4-slide3.jpg')}}" style="height:400px;" alt="Slide">
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            @foreach($data as $product)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="/photo/{{ $product->avatar }}" style="height:300px; width:400px;" alt="">
                                        <div class="product-hover">
                                            <a href="{{ url('add-to-cart/'.$product->id) }}" class="add-to-cart-link"><i class="fa fa-shopping-cart fa-lg" size="20px"></i></a>
                                            <a href="{{route('details',$product->id)}}" class="view-details-link"><i class="fa fa-eye fa-lg"></i> </a>
                                        </div>
                                    </div>
                                    
                                    <h2><a href="{{route('details',$product->id)}}">{{ $product->name }}</a></h2>
                                    
                                    <div class="product-carousel-price">
                                    <ins>Rs. {{$product->real_price}}.00</ins> <del style="color:red;">Rs. {{$product->price}}.00</del>
                                    </div> 
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="{{asset('store/img/1.png')}}" alt="" style="height:120px; width:150px;">
                            <img src="{{asset('store/img/2.png')}}" alt="" style="height:120px; width:150px;">
                            <img src="{{asset('store/img/3.png')}}" alt="" style="height:120px; width:150px;">
                            <img src="{{asset('store/img/4.png')}}" alt="" style="height:120px; width:150px;">
                            <img src="{{asset('store/img/5.png')}}" alt="" style="height:120px; width:150px;">
                            <img src="{{asset('store/img/6.png')}}" alt="" style="height:120px; width:150px;">
                            <img src="{{asset('store/img/7.png')}}" alt="" style="height:120px; width:150px;">
                            <img src="{{asset('store/img/8.png')}}" alt="" style="height:120px; width:150px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top Sarees</h2>
                        <a href="{{route('Saree')}}" class="wid-view-more">View All</a>
                        @foreach($saree as $pt)
                        <div class="single-wid-product">
                            <a href="{{route('details',$pt->id)}}"><img src="/photo/{{ $pt->avatar }}" alt="" class="product-thumb"></a>
                            <h2><a href="{{route('details',$pt->id)}}">{{ $pt->name }}</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>Rs. {{$pt->real_price}}.00</ins> <del style="color:red;">Rs. {{$pt->price}}.00</del>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recent Tops</h2>
                        <a href="{{route('Top')}}" class="wid-view-more">View All</a>
                        @foreach($top as $pz)
                        <div class="single-wid-product">
                            <a href="{{route('details',$pz->id)}}"><img src="/photo/{{ $pz->avatar }}" alt="" class="product-thumb"></a>
                            <h2><a href="{{route('details',$pz->id)}}">{{ $pz->name }}</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>Rs. {{$pz->real_price}}.00</ins> <del style="color:red;">Rs. {{$pz->price}}.00</del>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top Salwars</h2>
                        <a href="{{route('Salwar')}}" class="wid-view-more">View All</a>
                        @foreach($salwar as $salwar)
                        <div class="single-wid-product">
                            <a href="{{route('details',$salwar->id)}}"><img src="/photo/{{ $salwar->avatar }}" alt="" class="product-thumb"></a>
                            <h2><a href="{{route('details',$salwar->id)}}">{{ $salwar->name }}</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                            <ins>Rs. {{$salwar->real_price}}.00</ins> <del style="color:red;">Rs. {{$salwar->price}}.00</del>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection