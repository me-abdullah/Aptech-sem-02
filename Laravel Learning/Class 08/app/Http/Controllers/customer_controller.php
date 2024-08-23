<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class customer_controller extends Controller
{
    public function create()
    {
        $url = url("/customer");
        $title = "Customer Registration";
        $data = compact('url');
        return view('customer')->with($data);
    }

    public function store(Request $request)
    {
        //echo "<pre>";
        //print_r($request->all());
        // $customer->date_of_birth = ['date_of_birth']; // Change date format

        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        $customer->city = $request['city'];
        $customer->gender = $request['gender'];
        $customer->points = $request['points'];
        $customer->status = $request['status'];
        $customer->password = md5($request['password']);
        $customer->save();

        //return redirect()->back()->with('success', 'Customer registered successfully.');
        return redirect('/customer/view');
    }

    public function view()
    {
        $customers = Customer::all();
        // echo "<pre>";
        // print_r($customers);
        // echo "</pre>";
        // die;
        $data = compact('customers');
        return view('customer-view')->with($data);
    }

    public function delete($id)
    {
        Customer::find($id)->delete();
        return redirect('/customer/view');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            # code...
            return redirect('/customer/view');
        } else {
            $title = "Update Customer";
            $url = url('/customer/update') . "/" . $id;
            $data = compact('customer', 'url', 'title');
            return view('customer')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->address = $request['address'];
        $customer->city = $request['city'];
        $customer->gender = $request['gender'];
        $customer->points = $request['points'];
        $customer->status = $request['status'];
        $customer->save();
        return redirect('customer'); 
    }
}
