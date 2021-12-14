@extends('frontend.layouts.main')

@section('title')
    Cart
@endsection

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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

                <div class="col-md-10">
                    <div class="product-content-right">
                    <table id="cart" class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $total = 0 ?>


                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)

                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <form action="{{ route('change-cart', $id) }}" method="POST">
                                            @csrf
                                        {{ method_field('PATCH') }}
                                        
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img src="/photo/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">Rs. {{ $details['price'] }}.00</td>
                                        <td data-th="Quantity">
                                            <input type="number" value="{{ $details['quantity'] }}" name="quantity" id="quantity" class="form-control quantity" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center">Rs. {{ $details['price'] * $details['quantity'] }}.00</td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-refresh"></i></button>
                                            </form>
                                                {!! Form::open(['method' => 'DELETE','url' => ['remove-cart', $id],'style'=>'display:inline']) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" style="color:red;"></i>', ['class'=>'btn remove-from-cart', 'type'=>'submit']) !!}
                                                {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            

                            </tbody>
                            <tfoot>
                            <tr class="visible-xs">
                                <td class="text-center"><strong>Total Rs. {{ $total }}.00</strong></td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                <td colspan="2" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total Rs. {{ $total }}.00</strong></td>
                                <td><a class="btn btn-success"><strong>Checkout</strong> <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection
