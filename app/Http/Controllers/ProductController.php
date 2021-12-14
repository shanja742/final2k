<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use Storage;
use Auth;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select('*');
            return Datatables::of($data)

                    ->filter(function ($instance) use ($request) {

                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('name', 'LIKE', "%$search%")
                                ->orWhere('brand', 'LIKE', "%$search%")
                                ->orWhere('code', 'LIKE', "%$search%")
                                ->orWhere('real_price', 'LIKE', "%$search%")
                                ->orWhere('price', 'LIKE', "%$search%")
                                ->orWhere('status', 'LIKE', "%$search%")
                                ;
                            });
                        }
                    })
                    ->rawColumns(['brand'])
                    ->make(true);
        }
        $brand = Category::all();
        $data = Product::orderBy('id','DESC')->get();
        return view('backend.item.index',compact('data', 'brand'))
                    ->with('i', ($request->input('page', 1) -1) * 5);
    }


    public function create()
    {
        $brand = Category::all();
        return view('backend.item.create',compact('brand'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'required',
            'brand' => 'required',
            'code' => 'required',
            'price' => 'required',
            'status' => 'required',
            'description' => 'required',
            'real_price' => 'required'
        ]);

        $avatar = $request->file('avatar');
        $avatarSaveAsName = "avatar.".time(). '.' . $avatar->getClientOriginalExtension();

        $avatar_upload_path = 'photo';
        $avatar_url = $avatarSaveAsName;
        $success = $avatar->move($avatar_upload_path, $avatarSaveAsName);

        $input = $request->all();
        $input['avatar'] = $avatar_url;
        $product = Product::create($input);

        echo "success";

        $notification = array(
            'message' => 'Created successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.index')
                        ->with($notification);
    }


    public function edit($id)
    {
        $brand = Category::all();
        $product = Product::find($id);
        return view('backend.item.edit',compact('brand', 'product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'required',
            'brand' => 'required',
            'code' => 'required',
            'price' => 'required',
            'status' => 'required',
            'description' => 'required',
            'real_price' => 'required'
        ]);
        
        $product = Product::find($id);
        $oldavatar = '/storage/photo/'.$product->avatar;

        if($request->hasFile('avatar'))
        {
            
            Storage::delete('oldavatar');
            $avatar = $request->file('avatar');

            $avatarSaveAsName = "avatar.".time(). '.' . $avatar->getClientOriginalExtension();

            $avatar_upload_path = 'photo';
            $avatar_url = $avatarSaveAsName;
            $success = $avatar->move($avatar_upload_path, $avatarSaveAsName);
        }

        $input = $request->all();
        $input['avatar'] = $avatar_url;

        
        $product = Product::find($id);
        $product->update($input);

        echo "success";

        $notification = array(
            'message' => 'Updated successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.index')
                    ->with($notification);
    }


    public function edit_price($id)
    {
        $product = Product::find($id);
        return view('backend.item.edit_price',compact('product'));
    }

    public function update_price(Request $request, $id)
    {
        $this->validate($request, [
            'price' => 'required',
            'real_price' => 'required'
        ]);
        
        $input = $request->all();

        $product = Product::find($id);
        $product->update($input);

        echo "success";

        $notification = array(
            'message' => 'Updated successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.index')
                    ->with($notification);
    }


    public function destroy(Product $product)
    {
        //
    }

    public function welcome()
    {
        
        $data = Product::paginate(20);
        $saree = Product::where('brand', 'Saree')->paginate(3);
        $salwar = Product::where('brand', 'Salwar')->paginate(3);
        $top = Product::where('brand', 'Top')->paginate(3);
        return view('frontend.pages.welcome',compact('data', 'saree', 'salwar', 'top'));
    }

    public function Products()
    {
        $data = Category::paginate(20);
        $product = Product::paginate(12);
        return view('frontend.pages.products',compact('data', 'product'));
    }

    public function Saree()
    {
        $brand = Category::get();
        $data = Product::where('brand', 'Saree')->get();
        return view('frontend.pages.single_product',compact('data', 'brand'));
    }

    public function Salwar()
    {
        $brand = Category::get();
        $data = Product::where('brand', 'Salwar')->get();
        return view('frontend.pages.single_product',compact('data', 'brand'));
    }


    public function Top()
    {
        $brand = Category::get();
        $data = Product::where('brand', 'Top')->get();
        return view('frontend.pages.single_product',compact('data', 'brand'));
    }


    public function Skirt()
    {
        $brand = Category::get();
        $data = Product::where('brand', 'Skirt')->get();
        return view('frontend.pages.single_product',compact('data', 'brand'));
    }

    public function Blouse()
    {
        $brand = Category::get();
        $data = Product::where('brand', 'Blouse')->get();
        return view('frontend.pages.single_product',compact('data', 'brand'));
    }

    public function Frock()
    {
        $brand = Category::get();
        $data = Product::where('brand', 'Frock')->get();
        return view('frontend.pages.single_product',compact('data', 'brand'));
    }


    public function cart()
    {
        return view('frontend.pages.cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->avatar
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->avatar
        ];
        session()->put('cart', $cart);


        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function change(Request $request, $id)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }

        return redirect()->back()->with('success', 'Cart edited successfully!');
    }

    public function remove(Request $request, $id)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function show($id)
    {
        $data = Product::get();
        $products = Product::find($id);
        $brand = $products->brand;
        $data = Product::where('brand',$brand)->get();
        return view('frontend.pages.product_details', compact('products', 'data'));
    }

    public function checkout_index()
    {
        return view('frontend.pages.checkout.index');
    }


}
