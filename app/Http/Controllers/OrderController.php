<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Storage;
use Auth;
use DB;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function checkout_index()
    {
        $data = Order::where('user_id',Auth::user()->id)
                       ->orderBy('id','DESC')
                       ->get();

        $orders = DB::table('orders')
                       ->join('order_items','order_items.order_id','=','orders.id')
                       ->select('orders.*','order_items.quantity','order_items.price','order_items.avatar', 'order_items.user_id')
                       ->get();

        return view('frontend.pages.checkout.index', compact('data', 'orders'));
    }
    
    public function create_order()
    {
        $data = Category::paginate(20);
        return view('frontend.pages.checkout.create',compact('data'));
    }

    public function store_order(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'grand_total' => 'required',
            'item_count' => 'required',
            'payment_method' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'line1' => 'required',
            'post_code' => 'required',
            'phone' => 'required',
        ]);
        
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => Auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  $request['grand_total'],
            'item_count'        =>  $request['item_count'],
            'payment_status'    =>  '0',
            'payment_method'    =>  $request['payment_method'],
            'note'             =>  $request['note'],
            'firstname'             =>  $request['firstname'],
            'lastname'             =>  $request['lastname'],
            'line1'             =>  $request['line1'],
            'line2'             =>  $request['line2'],
            'post_code'             =>  $request['post_code'],
            'phone'             =>  $request['phone'],
        ]);


        if ($order) {
    
            if(session('cart'))
            {   $items = session()->get('cart');
                foreach ($items as $id => $details)
                {
                    $product = Product::where('name', $details['name'])->first();
        
                    $orderItem = new OrderItem([
                        'product_id'    =>  $product->id,
                        'quantity'      =>  $details['quantity'],
                        'price'         =>  $details['price'],
                        'avatar'        =>  $details['photo'],
                        'user_id'       =>  Auth::user()->id,
                    ]);
        
                    $order->items()->save($orderItem);
                }
            }
        }

        $orders = Order::find($order['id']);


        echo "success";

        $notification = array(
            'message' => 'Created successfully!', 
            'alert-type' => 'success'
        );

        
        if($orders->payment_method == 'cash'){
            
            $item = OrderItem::where('order_id','=',$orders['id'])->get();
            return view('frontend.pages.checkout.pay_cash', compact('orders', 'item'));
        }
        elseif($orders->payment_method == 'bank'){
            $item = OrderItem::where('order_id','=',$orders['id'])->get();

            return view('frontend.pages.checkout.pay_bank', compact('orders', 'item'));
        }
        elseif($orders->payment_method == 'paypal'){
            $item = OrderItem::where('order_id','=',$orders['id'])->get();

            return view('frontend.pages.checkout.pay_paypal', compact('orders', 'item'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'payment_status' => 'required'
        ]);

        $input = $request->all();

        $order = Order::find($id);
        $order->update($input);

        echo "success";

        $notification = array(
            'message' => 'Updated successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('order.index')
                    ->with($notification);

    }

    public function remove($id)
    {
        Order::find($id)->delete();

        echo "success";

        $notification = array(
            'message' => 'Order Cancelled!', 
            'alert-type' => 'success'
        );

        return redirect()->route('welcome')
                    ->with($notification);
    }

}
