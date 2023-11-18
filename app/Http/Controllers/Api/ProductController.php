<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
        /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function index() 
    {
        $dataProduct = Product::with('category')->get();

        $respone = [
            'data' => $dataProduct,
        ];
        return response()->json($respone);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $validated = $request->validate([
            'sku' => 'required|unique:ms_products|max:255',
            'name' => 'required|max:255',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gt:0',
            'categoryId' => 'required',
        ]);
        try 
        {
            $data               = new Product();
            $data->sku          = $request->sku;
            $data->name         = $request->name;
            $data->price        = $request->price;
            $data->stock        = $request->stock;
            $data->category_id  = $request->categoryId;

            $data->save();
            DB::commit();

            $respone = [
                'data' => Product::with('category')->where('id', $data->id)->first(),
            ];

            return response()->json($respone);
            
        } catch (\Exception $e) {
            DB::rollBack();
            $errors = [
                'Failed add product',
                $e->getMessage(),
            ];
            $respone = [
                'errors' => $errors
            ];
            return response()->json($respone);
        }
    }

    public function search(Request $request) 
    {
        $list_sku      = explode(',', $request->sku);
        $list_category = explode(',', $request->category);

        $filter = Product::with('category')->whereNull('deleted_at');
        
        if ($request->sku) {
            $filter->whereIn('sku', $list_sku);
        }
        
        if ($request->name) {
            $filter->where('name', 'like','%'.$request->name.'%');
        }

        if ($request->price_min) {
            $filter->where('price', '>=', $request->price_min);
        }

        if ($request->price_max) {
            $filter->where('price', '<=', $request->price_max);
        }

        if ($request->stock_min) {
            $filter->where('stock', '>=', $request->stock_min);
        }

        if ($request->stock_max) {
            $filter->where('stock', '<=', $request->stock_max);
        }

        if ($request->category) {
            $filter->whereIn('category_id', $list_category);
        }
        
        $filter = $filter->paginate(10);

        return response()->json($filter);
    }
}