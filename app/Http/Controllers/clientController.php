<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Client;
use App\Models\Order;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Authate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class clientController extends Controller
{
    public function home()
    {
        $sliders = Slider::where('status', 1)->get();
        $produits = Product::where('status', 1)->get();
        return view('client.home')->with('sliders', $sliders)->with('produits', $produits);
    }

    public function shop()
    {
        $categories = Category::get();
        $produits = Product::where('status', 1)->get();
        return view('client.shop')->with('categories', $categories)->with('produits', $produits);
    }

    public function select_par_cat($name)
    {
        $categories = Category::get();
        $produits = Product::where('product_category', $name)->where('status', 1)->get();
        return view('client.shop')->with('produits', $produits)->with('categories', $categories);
    }

    public function ajouter_au_panier($id)
    {
        $produit = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($produit, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/shop');
    }

    public function panier()
    {
        if (!Session::has('cart')) {
            return view('client.cart');
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }

    public function modifier_panier(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/cart');
    }

    public function retirer_produit($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect('/cart');
    }

    public function checkout()
    {
        if (!Session::has('client')) {
            return view('client.login');
        }

        if (!Session::has('cart')) {
            return view('client.cart');
        }
        return view('client.checkout');
    }

    public function payer(Request $request)
    {
        if (!Session::has('cart')) {
            return view('client.cart');
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_gHGtV3Z6vh4jCV25BRju3hCv');

        try {

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

            $order = new Order();

            $order->nom = $request->input('name');
            $order->adresse = $request->input('address');
            $order->panier = serialize($cart);
            $order->payment_id = $charge->id;
            $order->save();

            $orders = Order::where('payment_id', $charge->id)->first();
            $orders->transform(function ($order, $key) {
                $order->panier = unserialize($order->panier);
                return $order;

                $email = Session::get('client')->email;
                Mail::to($email)->send(new SendMail($orders));
            });
        } catch (\Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect('/checkout');
        }

        Session::forget('cart');
        //Session::put('success', 'Purchase accomplished successfully !');
        return redirect('/cart')->with('status', 'achat accompli avec succes');
    }
    public function creer_compte(Request $request)
    {

        $this->validate($request, [
            'email' => 'email|unique:clients',
            'password' => 'required|min:4'
        ]);
        $client = new Client();
        $client->email = $request->input(('email'));
        $client->password = bcrypt($request->input(('password')));
        $client->save();
        return back()->with('status', 'Votre compte a été créé avec succès');
    }

    public function acceder_compte(Request $request)
    {
        $this->validate($request, [
            'email' => 'email',
            'password' => 'required'
        ]);

        $client = Client::where('email', $request->input('email'))->first();
        if ($client) {
            # code...
            if (Hash::check($request->input('password'), $client->password)) {
                Session::put('client', $client);

                return redirect('/shop');
            } else {
                return back()->with('status', 'Mauvais mot de passe ou email');
            }
        } else {
            return back()->with('status', 'vous n avez pas de compte');
        }
    }
    public function logout()
    {
        Session::forget('client');
        return back();
    }

    public function client_login()
    {
        return view('client.login');
    }

    public function signup()
    {
        return view('client.signup');
    }
}
