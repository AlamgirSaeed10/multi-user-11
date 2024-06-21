<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'customer_name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:customers,customer_email',
            'customer_phone' => 'required|string|max:20',
            'customer_city' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_postcode' => 'required|string|max:20',
            'customer_task' => 'required|string|max:255',
            'task_description' => 'required|string',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([

            'customer_name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'customer_city' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_postcode' => 'required|string|max:20',
            'customer_task' => 'required|string|max:255',
            'task_description' => 'required|string',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
