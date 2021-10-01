<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerLoginRequest;
use App\Http\Requests\StoreCustomerLoginRequest;
use App\Http\Requests\UpdateCustomerLoginRequest;
use App\Models\CustomerLogin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerLoginController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_login_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerLogins = CustomerLogin::all();

        return view('frontend.customerLogins.index', compact('customerLogins'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_login_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.customerLogins.create');
    }

    public function store(StoreCustomerLoginRequest $request)
    {
        dd("ldasf");
        $customerLogin = CustomerLogin::create($request->all());

        return redirect()->route('frontend.customer-logins.index');
    }

    public function edit(CustomerLogin $customerLogin)
    {
        abort_if(Gate::denies('customer_login_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.customerLogins.edit', compact('customerLogin'));
    }

    public function update(UpdateCustomerLoginRequest $request, CustomerLogin $customerLogin)
    {
        $customerLogin->update($request->all());

        return redirect()->route('frontend.customer-logins.index');
    }

    public function show(CustomerLogin $customerLogin)
    {
        abort_if(Gate::denies('customer_login_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.customerLogins.show', compact('customerLogin'));
    }

    public function destroy(CustomerLogin $customerLogin)
    {
        abort_if(Gate::denies('customer_login_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerLogin->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerLoginRequest $request)
    {
        CustomerLogin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
