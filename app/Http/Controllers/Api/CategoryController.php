<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
        /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function index() 
    {
        $dataCategory = Category::all();

        $respone = [
            'data' => $dataCategory,
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
            'name' => 'required|max:255',
        ]);
        try 
        {
            $data                = new Category();
            $data->category_name = $request->name;

            $data->save();
            DB::commit();

            $respone = [
                'data' => $data,
            ];
            return response()->json($respone);
            
        } catch (\Exception $e) {
            DB::rollBack();
            $errors = [
                'Failed add category',
                $e->getMessage(),
            ];
            $respone = [
                'errors' => $errors
            ];
            return response()->json($errors);
        }
    }
}