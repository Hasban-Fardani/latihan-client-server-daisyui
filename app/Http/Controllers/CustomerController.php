<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customers', [
            'customers' => Customer::paginate(8)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'string'
        ]);

        if ($validator->fails())
        {
            return back()->with('errors', $validator->errors());
        }
        
        Customer::create($validator->validated());
        
        return back()->with('success', 'Success store new customer');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'string'
        ]);

        if ($validator->fails())
        {
            return back()->with('errors', $validator->errors());
        }
        
        $customer->update($validator->validated());
        
        return back()->with('success', 'Success update customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->with('success', 'Success delete customer');
    }
}
