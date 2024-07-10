<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    // Product
    public function listProduct()
    {
        $listProduct = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->select('product.id', 'product.name', 'product.price', 'product.view', 'product.category_id', 'category.category_name')
            ->get();

        return view('product/listProduct')
            ->with([
                'listProduct' => $listProduct
            ]);
    }

    public function addProduct()
    {
        $category = DB::table('category')
            ->select('id', 'category_name')
            ->get();

        return view('product/addProduct')->with([
            'category' => $category
        ]);
    }

    public function postProduct(Request $req)
    {
        $data = [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'view' => $req->viewProduct,
            'category_id' => $req->categoryProduct,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->insert($data);
        return redirect()->route('product.listProduct');
    }

    public function deleteProduct($idProduct)
    {
        DB::table('product')->where('id', $idProduct)->delete();
        return redirect()->route('product.listProduct');
    }

}