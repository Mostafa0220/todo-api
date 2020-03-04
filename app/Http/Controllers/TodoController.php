<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TodoController extends Controller
 {

    /**
    * List of resource.
    *
    * @param Request $request
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function search( Request $request ): JsonResponse
 {

        $this->validate( $request, [
            'day' => 'date_format:Y-m-d',
            'month' => 'date_format:m',
            'status' => 'in:New,Completed,Snoozed,Overdue',
            'category_id' => 'integer',
        ] );
        $todo = Todo::where( [
            'user_id' => $request->user()->getKey(),
        ] );

        if ( $request->filled( 'day' ) ) {
            $todo->whereDate( 'todo_date', '=', $request->input( 'day' ) );

        }

        if ( $request->filled( 'month' ) ) {
            $todo->whereMonth( 'todo_date', '=', $request->input( 'month' ) );

        }
        if ( $request->filled( 'status' ) ) {
            $todo->where( 'status',  $request->input( 'status' ) );

        }
        if ( $request->filled( 'category_id' ) ) {
            $todo->where( 'category_id',  $request->input( 'category_id' ) );

        }

        return new JsonResponse( [
            'message' => 'success',
            'data' => $todo->get(),
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
            'name' => ['required', 'max:128'],
            'category_id' => ['required', 'integer'],
            'todo_date' => ['required', 'date_format:Y-m-d H:i:s'],
            'description' => ['required'],
        ] );

        $todo = Todo::create( $request->only( [
            'name',
            'category_id',
            'todo_date',
            'description',
            'status',

        ] ) + [
            'user_id' => $request->user()->getKey()
        ] );

        return new JsonResponse( [
            'message' => 'Successfully created new todo.',
            'data' => $todo,
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
            'category_id' => ['required', 'integer'],
            'status' => 'in:New,Completed,Snoozed,Overdue',
            'todo_date' => ['required', 'date_format:Y-m-d H:i:s'],
            'description' => ['required'],
        ] );
        $todo = Todo::where( [
            'id' => $id,
            'user_id' => $request->user()->getKey(),
        ] )->firstOrFail();

        $todo->update( $request->only( [
            'name',
            'category_id',
            'todo_date',
            'description',
            'status',
        ] ) );

        return new JsonResponse( [
            'message' => 'Successfully updated a todo.',
            'data' => $todo,
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
        Todo::where( [
            'id' => $id,
            'user_id' => $request->user()->id,
        ] )->firstOrFail()->delete();

        return new JsonResponse( [
            'message' => 'Successfully deleted a todo.',
        ] );
    }
}
