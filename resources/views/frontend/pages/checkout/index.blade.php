@extends('frontend.layouts.main')

@section('title')
    Checkout
@endsection

@section('content')

<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>your Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <h4>Your Pending Orders to Deliver</h4>
                <br>
            

                <div class="row">
                    @foreach ($data as $key => $item)
                        <div class="col-md-6">
                            <table class="shop_table" style="width:400px;">

                                <tr class="cart_item">
                                    <th class="product-name">Order Number</th>
                                    <td class="product-name">
                                            {{ $item->order_number }} 
                                    </td>
                                </tr>

                                <tr>
                                    <th class="product-total">Total Item</th>
                                    <td class="product-total">
                                        <span class="amount">{{ $item->item_count }} </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="cart-subtotal">Total Price</th>
                                    <td>
                                        <span class="amount">Rs. {{ $item->grand_total }}.00</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    @foreach($orders as $order)

                        <div class="col-md-6">
                            <table class="shop_table">
                                <thead>
                                <tr>
                                    <th class="product-name">Order Number</th>
                                    <th>Picture</th>
                                    <th class="product-total">quantity</th>
                                    <th class="cart-subtotal">Price</th>
                                    <th class="cart-subtotal">Sub total</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                <tr class="cart_item">
                                    <td class="product-name">
                                        {{ $order->order_number }} 
                                    </td>

                                    <td class="product-name">
                                        <img src="/photo/{{ $order->avatar }} " alt="image" style="width:120px; height:120px;">
                                    </td>

                                    <td class="product-total">
                                        <span class="amount">{{ $order->quantity }} </span>
                                    </td>

                                    <td>
                                        <span class="amount">Rs. {{ $order->price }}.00</span>
                                    </td>

                                    <td><span class="amount">Rs. {{ $order->price * $order->quantity }}.00</span></td>
                                </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    @endforeach

                </div>
                
        </div>
    </div>
</div>

@endsection


