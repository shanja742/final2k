<?php

namespace App\Http\Controllers;

use App\Models\Details;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;


class DetailsController extends Controller
{

    public function index()
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

    public function create()
    {
        
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
                        "photo" => $product->photo
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
            "photo" => $product->photo
        ];
        session()->put('cart', $cart);

        dd($cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function show($id)
    {
        $data = Product::get();
        $products = Product::find($id);
        $brand = $products->brand;
        $data = Product::where('brand',$brand)->get();
        return view('frontend.pages.product_details', compact('products', 'data'));
    }

}
