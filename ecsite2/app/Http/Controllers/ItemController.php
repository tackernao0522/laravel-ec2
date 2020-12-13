<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $items = Item::where('name', 'like', '%' . $request->get('keyword') . '%')->paginate(15);
        } else {
            $items = Item::paginate(15);
        }

        return view('item.index', ['items' => $items]);
    }
}
