@extends('frontend.layouts.main')

@section('title')
    Payment
@endsection

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Payment</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="container" style="margin-top: 25px;width: 90%;">
                    <div class="container-fluid">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <center>
                                    <h4>You can pay directly to bank account. <i class="fa fa-smile-o"></i></h4>
                                    <p>Here are the details to the payment. use your order number for the payment.</p>
                                    <p>Account No.: 2465346</p>
                                    <p>Bank: BOC</p>
                                    <p>Name: Sunshine Fashions</p>
                                    <p></p>
                                    <p>check your deliver items and details here.. and you can cancel your order</p>
                                    <p style="color:red;"><strong>Note: once you were proceed the order you cannot cancel the order. If oyu want to cancel order you can directly contact to our company. Thank you !.</strong></p>

                                </center>

                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="shop_table">
                                            <caption>Your Order <br><br></caption>
                                            
                                                <tr>
                                                    <th>Order Number</th>
                                                    <td>{{ $orders->order_number }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Total Number of items</th>
                                                    <td>{{ $orders->item_count }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Total Price</th>
                                                    <td>Rs. {{ $orders->grand_total }}.00</td>
                                                </tr>

                                        </table>
                                    </div>

                                    <div class="col-md-6">
                                        <table class="shop_table" >
                                            <caption>Order Reciver Details <br><br></caption>

                                            <tr>
                                                <th>Full Name</th>
                                                <td>{{ $orders->firstname }} {{ $orders->lastname }}</td>
                                            </tr>

                                            <tr>
                                                <th>Address</th>
                                                <td>{{ $orders->line1 }} {{ $orders->line2 }}</td>
                                            </tr>

                                            <tr>
                                                <th>Postal Code</th>
                                                <td>{{ $orders->post_code }}</td>
                                            </tr>

                                            <tr>
                                                <th>Phone Number</th>
                                                <td>{{ $orders->phone }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>


                                <h2>Your Order Items</h2>

                                    <table class="shop_table" style="width:80%;">
                                        <thead>
                                            <tr>
                                                <td>Picture</td>
                                                <td>Qunatity</td>
                                                <td>Price</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($item as $item)
                                            <tr class="cart_item">
                                                <td><img src="/photo/{{ $item->avatar }}" alt="" style="height:200; width:200;"></td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>Rs.{{  $item->price }}.00</td>
                                                <td>Rs. {{ $item->price * $item->quantity }}.00</td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>

                                    <div class="form-row place-order">
                                        <form method="post" action="{{ route('order.update',$orders->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <input type="text" id="payment_status" name="payment_status" value="1" style="display:none;">
                                            <button type="submit" id="place_order" name="woocommerce_checkout_place_order" class="button alt">Proceed Order</button>
                                                
                                        </form>
                                            {!! Form::open(['method' => 'DELETE','route' => ['order.remove', $orders->id],'style'=>'display:inline']) !!}
                                                {!! Form::button('Cancel Order', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                                                {!! Form::close() !!}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection