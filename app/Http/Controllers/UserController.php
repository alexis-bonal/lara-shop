<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Order;

    class UserController extends Controller
    {
        public function orders()
        {
            $orders = Auth::user()->orders()->with('products')->get();
            return view('user.orders', compact('orders'));
        }

        public function orderDetails($id)
        {
            $order = Order::where('id', $id)->where('user_id', Auth::id())->with('products')->firstOrFail();
            return view('user.order_details', compact('order'));
        }
    }
?>
