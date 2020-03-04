<?php

namespace App\Http\Controllers;

use App\Category;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
 {

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index( Request $request ): JsonResponse
 {

        $category = $request->user()->categories;
        return new JsonResponse( [
            'message' => 'success',
            'data' => $category,
        ] );
    }

    /**
    * Create a resource.
    *
    * @param Request $request
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function create( Request $request ): JsonResponse
 {

        $this->validate( $request, [
            'name' => ['required', 'max:128']
        ] );

        $category = Category::create( $request->only( [
            'name'
        ] ) + [
            'user_id' => $request->user()->getKey()
        ] );

        return new JsonResponse( [
            'message' => 'Successfully created new category.',
            'data' => $category,
        ] );
    }

    /**
    * Update a resource.
    *
    * @param int     $id
    * @param Request $request
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function update( $id, Request $request ): JsonResponse
 {
        $this->validate( $request, [
            'name' => ['required', 'max:128'],
        ] );

        $category = Category::where( [
            'id' => $id,
            'user_id' => $request->user()->getKey(),
        ] )->firstOrFail();

        $category->update( $request->only( [
            'name'
        ] ) );

        return new JsonResponse( [
            'message' => 'Successfully updated a category.',
            'data' => $category,
        ] );
    }

    /**
    * Delete a resource.
    *
    * @param int     $id
    * @param Request $request
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function delete( $id, Request $request ): JsonResponse
 {

        Category::where( [
            'id' => $id,
            'user_id' => $request->user()->id,
        ] )->firstOrFail()->delete();

        return new JsonResponse( [
            'message' => 'Successfully deleted a category.',
        ] );
    }
}
