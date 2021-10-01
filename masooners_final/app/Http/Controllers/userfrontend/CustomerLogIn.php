<?php

namespace App\Http\Controllers\userfrontend;

use App\Http\Controllers\Controller;
use App\Models\CustomerLogin as ModelsCustomerLogin;
use Illuminate\Http\Request;

class CustomerLogIn extends Controller
{
    public function store(Request $request){
        $customer = ModelsCustomerLogin::create($request->all());
        dd($customer);
    }
}
