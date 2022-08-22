<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function all(Request $request){
        $id=$request->input('id');
        $limit=$request->input('limit');
        $name=$request->input('name');
        $tags=$request->input('tags');
        $categories=$request->input('categories');

        if($id)
        {
            $product=Product::with(['category','vidoegallary','gallaries'])->find($id);
            if ($product) {
                return ResponseFormatter::success(
                    $product,
                    'Data product Berhasil diambil'
                );
            }
            else {
                    return ResponseFormatter::error(
                        null,
                        'Data product gagal diambil',
                        404
                    );
                }
        

         }
         $product=Product::with(['category','vidoegallary','gallaries']);

         if($name){
            $product->where('name','like','%'.$name.'%');
         }
         if($tags){
            $product->where('tags','like','%'.$tags.'%');
         }
         if($categories){
            $product->where('categories_id',$categories);
         }

         return response()->json([
            $product->paginate($limit),
            'Data product Berhasil diambil'
        ]);
        //  return ResponseFormatter::success(
        //     $product->paginate($limit),
        //     'Data product Berhasil diambil'
        // );

    }
}
