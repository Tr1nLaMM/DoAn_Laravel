<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(request $request)
    {
        $page=$request->query("page");
        $size=$request->query("size");
        if(!$page)
            $page= 1;
        if(!$size)
            $size= 12;
        $order = $request->query("order");
        if(!$order)
            $order= -1;
        $o_clumn="";
        $o_order="";
        switch ($order) {
            case 1:
                $o_clumn= "created_at";
                $o_order="DESC";
                break;
            case 2;
                $o_clumn= "created_at";
                $o_order="ASC";
                break;
            case 3;
                $o_clumn= "created_price";
                $o_order="ASC";
                break;
            case 4;
                $o_clumn= "created_price";
                $o_order="DESC";
                break;
            default;
                $o_clumn= "id";
                $o_order="DESC"; 
        }
        $categories = Category::orderBy("name","ASC")->get();
        $q_categories = $request->query("categories");
        $prange = $request->query("prange");
        if(!$prange)
            $prange= "o,500";
        $from = explode(",",$prange)[0];
        $to = explode(",",$prange)[1];
        $products = Product::where(function($query) use($q_categories){
                            $query->whereIn('category_id',explode(',',$q_categories))
                            ->orWhereRaw("'".$q_categories."'=''");         
                        })
                        ->whereBetween('price',[$from,$to])
        ->orderBy("created_at", "DESC")
        ->orderBy($o_clumn, $o_order)
        ->paginate($size);
        return view('shop',['products'=>$products,'page'=>$page,'size'=>$size,'order'=>$order,'categories'=>$categories,'q_categories'=>$q_categories,'from'=>$from,'to'=>$to]);
    }

    public function productDetails($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('details',['product'=>$product]);
    }
}
