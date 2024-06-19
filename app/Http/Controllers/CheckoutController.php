<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Order;
    use App\Models\Coupon;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;

    class CheckoutController extends Controller
    {
        public function index()
        {
            return view('checkout.index');
        }

        public function applyCoupon(Request $request)
        {
            $request->validate([
                'coupon_code' => 'required|string',
            ]);

            $coupon = Coupon::where('code', $request->coupon_code)->first();

            if (!$coupon) {
                return redirect()->back()->with('error', 'Code promo invalide.');
            }

            $total = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, session('cart', [])));

            $discount = $coupon->discount;
            $newTotal = $total - $discount;

            Session::put('total', $newTotal);
            Session::put('applied_coupon', $coupon->code);
            Session::put('discount', $discount);

            return redirect()->back()->with('success', 'Code promo appliqué avec succès.');
        }

        public function process(Request $request)
        {
            $user = Auth::user();
            $cart = session()->get('cart', []);
            $total = session()->get('total', array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart)));
            $couponCode = session()->get('applied_coupon');
            $discount = session()->get('discount', 0);

            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $total,
                'status' => 'pending',
                'coupon_code' => $couponCode,
                'discount' => $discount,
            ]);

            foreach ($cart as $id => $details) {
                $order->products()->attach($id, [
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ]);
            }

            session()->forget('cart');
            session()->forget('total');
            session()->forget('applied_coupon');
            session()->forget('discount');

            return redirect()->route('user.orders')->with('success', 'Commande passée avec succès');
        }
    }

?>
