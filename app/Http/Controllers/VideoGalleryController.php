<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoGalleryRequest;
use App\Models\Product;
use App\Models\VidoeGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Yajra\DataTables\Facades\DataTables;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        if (request()->ajax()) {
            $query = VidoeGallery::where('products_id', $product->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <form class="inline-block" action="' . route('dashboard.vidio.destroy', $item->id) . '" method="POST">
                    <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                        Hapus
                    </button>
                        ' . method_field('delete') . csrf_field() . '
                    </form>';
                        
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
        }

        return view('pages.dashboard.vidio.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('pages.dashboard.vidio.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        VidoeGallery::create(['products_id' => $product->id,
            'url'=>$request->url,
            
        ]);

        return redirect()->route('dashboard.product.vidio.index', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VidoeGallery  $vidoeGallery
     * @return \Illuminate\Http\Response
     */
    public function show(VidoeGallery $vidoeGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VidoeGallery  $vidoeGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(VidoeGallery $vidoeGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VidoeGallery  $vidoeGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VidoeGallery $vidoeGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VidoeGallery  $vidoeGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(VidoeGallery $vidoeGallery, Product $product)
    {
       VidoeGallery::where( $vidoeGallery->products_id)->delete();
        return  back();
    }
}
