<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Selector as SelectorResource;
use Illuminate\Http\Request;
use App\Customer;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(Customer::get(), 200)
                                 ->header('Content-Type', 'text/plain');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request_body = $request->input('name');
        $maxId = Customer::max('id') + 1;
        $datetime = Carbon::now();
        Customer::insert(
                        [
                            'id' => $maxId,
                            'created_at' => $datetime,
                            'updated_at' => $datetime,
                            'name' =>  $request_body
                        ]
                        );
        return response(200)->header('Content-Type', 'text/plain');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
            $id = $request->input('id');
            $name = $request->input('name');
            Customer::where('id', $id)->update(
             ['name' =>  $name]
            );
            return response(204)->header('Content-Type', 'text/plain');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
            $request_body = $request->input('id');
            Customer::where('id', $request_body)->delete();
            return response(204)->header('Content-Type', 'text/plain');
        //
    }
}
