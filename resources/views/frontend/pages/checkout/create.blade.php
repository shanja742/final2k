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
                        <h2>Checkout Product</h2>
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
            @if (! Session :: has ('cart') || empty (Session :: get ('cart')))
                <div class="container" style="margin-top: 25px;width: 40%;">
                    <div class="container-fluid">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <center>
                                    <h4>Your shopping cart is empty! <i class="fa fa-smile-o"></i></h4>
                                    <a href="{{ route('welcome') }}">back to the homepage</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-3">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">All Products</h2>
                        <ul>
                            @foreach($data as $brand)
                            <li><a href="{{ $brand->name }}">{{ $brand->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-1"></div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                            <h3 id="order_review_heading">Your order</h3>
                            <hr>
                            <?php $total = 0 ?>
                            <?php $totalquantity = 0 ?>

                        
                            <div id="order_review" style="position: relative;">
                                <table class="shop_table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product Name</th>
                                            <th class="product-total">Quantity</th>
                                            <th class="cart-subtotal">Sub Total</th>
                                        </tr>
                                    </thead>
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <?php $totalquantity +=$details['quantity'] ?>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $details['name'] }} 
                                            </td>

                                            <td class="product-total">
                                                <span class="amount">Rs. {{ $details['price']}}.00</span> <strong class="product-quantity">× {{ $details['quantity'] }}</strong>
                                            </td>

                                            <td>
                                                <span class="amount">Rs. {{ $details['price'] * $details['quantity'] }}.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                        @endif
                                </table>
                                    
                                <div class="row">

                                    <div class="col-md-9">
                                        <table class="shop_table">
                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>
                                                    Free Shipping
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">Rs. {{ $total }}.00</span></strong> </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                    <form role="form" action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                    <div class="woocommerce">
                        <h3 id="order_review_heading">Place order</h3>
                        <hr>
                        <div class="row">

                            <input type="text" id="user_id" name="user_id" value="{{Auth::user()->id}}" style="display:none;">
                            <input type="text" id="grand_total" name="grand_total" value="{{ $total }}" style="display:none;">
                            <input type="text" id="item_count" name="item_count" value="{{ $totalquantity }}" style="display:none;">

                            <div class="col-md-6">
                                <label for="firstname">{{ __('First Name') }} *</label>
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="Enter your First Name here..." required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="lastname">{{ __('Last Name') }} *</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Enter your Last Name here..." required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                            </div>

                            <div class="col-md-8">
                                <label for="phone">{{ __('Phone Number') }} *</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter your phone number.." required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                            </div>
                            <div class="col-md-8">
                                <label for="address">{{ __('Delivering Address') }}</label>
                                <p style="color:red;">Note: * Due to corona pandamic! This service only available for jaffna city.</p>
                            </div>
                            <div class="col-md-6">
                                <label for="line1">{{ __('Address line 1') }} *</label>
                                <input id="line1" type="text" class="form-control @error('line1') is-invalid @enderror" name="line1"  required autocomplete="line1" autofocus>

                                @error('line1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="line2">{{ __('Address line 2') }}</label>
                                <input id="line2" type="text" class="form-control @error('line2') is-invalid @enderror" name="line2" required autocomplete="line2" autofocus>

                                @error('line2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                            <br>
                                <label for="post_code">{{ __('Postal Code') }}</label>
                                <input id="post_code" type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" required autocomplete="post_code" autofocus>

                                @error('post_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-9">
                            <br>
                                <label for="note">{{ __('Order Notes') }}</label>
                                <textarea id="note" rows="4" type="text" class="form-control @error('note') is-invalid @enderror" name="note" placeholder="Notes about your order. eg. special notes for delivery" required autocomplete="note" autofocus></textarea>

                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="woocommerce">
                    <br><br>
                        <h3 id="order_review_heading">Payment Method</h3>
                        <hr>
                        <div id="payment">
                            <ul class="payment_methods methods">

                                <li class="payment_method_bacs">
                                    <input type="radio" data-order_button_text=""  value="cash" name="payment_method" class="input-radio" id="payment_method_bacs">
                                    <label for="payment_method_bacs">Cash on Delivery </label>
                                    <div class="cash selectt" style="color: red; padding: 10px; display: none; margin-top: 30px; width: 90%; border: 2px solid gray;  border-radius: 25px; ">
                                        <p>Pay with cash upon delivery. This payment method is available only for customers within Jaffna 1-15 and Suburbs.</p>
                                    </div>
                                </li>

                                <li class="payment_method_bacs">
                                    <input type="radio" data-order_button_text=""  value="bank" name="payment_method" class="input-radio" id="payment_method_bacs">
                                    <label for="payment_method_bacs">Direct Bank Transfer </label>
                                    <div class="bank selectt" style="color: red; padding: 10px; display: none; margin-top: 30px; width: 90%; border: 2px solid grey;  border-radius: 25px; ">
                                        <p>Make your payment + delivery charges directly to our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have been cleared in our account.

                                            <br><strong>You can view our bank details on the next screen once you place the order.</strong></p>
                                    </div>
                                </li>

                                <li class="payment_method_paypal">
                                    <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal"  name="payment_method" class="input-radio" id="payment_method_paypal">
                                    <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">What is PayPal?</a></label>
                                    <div class="paypal selectt" style="color: red; padding: 30px; display: none; margin-top: 30px; width: 90%; border: 2px solid grey;  border-radius: 25px; ">
                                        <p>Pay via PayPal.<strong> you can pay with your credit card if you don’t have a PayPal account.</strong></p>
                                    </div>
                                </li>
                            </ul>

                            <div class="form-row place-order">
                                <button type="submit" id="place_order" name="woocommerce_checkout_place_order" class="button alt">Place Order</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('script')

    <script type="text/javascript"> 
        $(document).ready(function() { 
            $('input[type="radio"]').click(function() { 
                var inputValue = $(this).attr("value"); 
                var targetBox = $("." + inputValue); 
                $(".selectt").not(targetBox).hide(); 
                $(targetBox).show(); 
            }); 
        }); 
    </script>

@endsection

