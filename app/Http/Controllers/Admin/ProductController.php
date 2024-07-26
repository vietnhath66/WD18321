<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controllers;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProductController extends Product
{
    public function listProducts()
    {
        $listProducts = Product::paginate(8);
        return view('admin.products.list-product')
            ->with([
                'products' => $listProducts
            ]);
    }

    public function addProducts()
    {
        return view('admin.products.add-product');
    }

    public function addPostProducts(Request $req)
    {
        $imgUrl = '';
        if ($req->hasFile('imgProduct')) {
            $img = $req->file('imgProduct');
            $nameImg = time() . '.' . $img->getClientOriginalExtension();
            $link = 'imageProducts/';
            $img->move(public_path($link), $nameImg);

            $imgUrl = $link . $nameImg;
        }

        $data = [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'img' => $imgUrl,
        ];
        Product::create($data);

        return redirect()->route('admin.products.listProducts')
            ->with([
                'message' => 'Thêm mới thành công!!!'
            ]);
    }

    public function deleteProducts(Request $req)
    {
        $product = Product::find($req->idProduct);

        if ($product->img != null && $product->img != '') {
            File::delete(public_path($product->img));
        }
        $product->delete();
        return redirect()->back()->with([
            'message' => 'Xoá thành công!!!'
        ]);
    }

    public function detailProducts($idProduct)
    {
        $product = Product::where('product_id', $idProduct)->first();
        return view('admin.products.detail-product')->with([
            'products' => $product
        ]);
    }

    public function editProducts($idProduct)
    {
        $product = Product::where('product_id', $idProduct)->first();
        return view('admin.products.edit-product')->with([
            'products' => $product
        ]);
    }

    public function editPatchProducts($idProduct, Request $req)
    {
        $product = Product::where('product_id', $idProduct)->first();
        $imgUrl = $product->img;
        if ($req->hasFile('imgProduct')) {
            File::delete(public_path($product->img));
            $img = $req->file('imgProduct');
            $nameImg = time() . '.' . $img->getClientOriginalExtension();
            $link = 'imageProducts/';
            $img->move(public_path($link), $nameImg);

            $imgUrl = $link . $nameImg;

        }
        $data = [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'img' => $imgUrl,
        ];
        Product::where('product_id', $idProduct)->update($data);
        return redirect()->route('admin.products.listProducts')
            ->with([
                'message' => 'Sửa thành công!!!'
            ]);

    }
}
