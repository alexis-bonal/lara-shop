<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Coupon;

    class CouponController extends Controller
    {
        public function index()
        {
            $coupons = Coupon::all();
            return view('admin.coupons.index', compact('coupons'));
        }

        public function create()
        {
            return view('admin.coupons.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'code' => 'required|unique:coupons',
                'discount' => 'required|numeric',
            ]);

            Coupon::create($request->all());

            return redirect()->route('admin.coupons.index')->with('success', 'Coupon créé avec succès.');
        }

        public function edit($id)
        {
            $coupon = Coupon::find($id);
            return view('admin.coupons.edit', compact('coupon'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'code' => 'required|unique:coupons,code,' . $id,
                'discount' => 'required|numeric',
            ]);

            $coupon = Coupon::find($id);
            $coupon->update($request->all());

            return redirect()->route('admin.coupons.index')->with('success', 'Coupon mis à jour avec succès.');
        }

        public function destroy($id)
        {
            $coupon = Coupon::find($id);
            $coupon->delete();

            return redirect()->route('admin.coupons.index')->with('success', 'Coupon supprimé avec succès.');
        }
    }
