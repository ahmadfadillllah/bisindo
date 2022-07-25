<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\ProductGallery;

class ProductCategoryController extends Controller
{
    public function all(Request $request){
        $id=$request->input('id');
        $limit=$request->input('limit');
        $name=$request->input('name');
        $show_product=$request->input('show_product');
        if($id)
        {
            // $category=ProductGallery::with(['products'])->find($id);
            
            $category = ProductGallery::join('products', 'product_galleries.products_id', 'products.id')->find($id);
            if ($category) {
                return ResponseFormatter::success(
                    $category,
                    'Data kategory Berhasil diambil'
                );
            }
            else {
                    return ResponseFormatter::error(
                        null,
                        'Data kategory gagal diambil',
                        404
                    );
                }
            }
            $category=ProductCategory::query();

         if($name){
            $category->where('name','like','%'.$name.'%');
         }
         if($show_product){
            $category->with('products');
         }
         return ResponseFormatter::success(
            $category->paginate($limit),
            'Data kateory Berhasil diambil'
        );
    }
}
