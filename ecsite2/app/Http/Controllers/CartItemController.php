<?php

namespace App\Http\Controllers;

use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function index()
    {
        $cartitems = CartItem::select('cart_items.*', 'items_name', 'items.amount')
            ->where('user_id', Auth::id())
            ->join('items', 'items.id', '=', 'cart_items.item_id')
            ->get();
        $subtotal = 0;
        foreach($cartitems as $cartitem) {
            $subtotal += $cartitem->amount * $cartitem->quantity;
        }
        return view('cartitem/index', ['cartitems' => $cartitems, 'subtotal' => $subtotal]);
    }

    public function store(Request $request)
    {
        CartItem::updateOrCreate( // updateOrCreateはレコードの登録と更新を兼ねるメソッド
            [
                'user_id' => Auth::id(), // ログインしているユーザー
                'item_id' => $request->post('item_id'), // 商品ID
            ],
            [
                'quantity' => \DB::raw('quantity + ' . $request->post('quantity')), // 数量
            ]
        );
        return redirect('/')->with('flash_message', 'カートに追加しました');
    }
}
