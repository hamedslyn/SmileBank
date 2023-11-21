<?php

namespace Smile\Bank\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Smile\Bank\Http\Requests\CreateCustomerRequest;
use Smile\Bank\Http\Requests\UpdateCustomerRequest;
use Smile\Bank\Http\Resources\CustomerResource;
use Smile\Bank\Models\Customer;

class CustomerController extends Controller
{
    public function index(): CustomerResource
    {
        return new CustomerResource(Customer::all());
    }

    public function store(CreateCustomerRequest $request): CustomerResource
    {
        $customer = Customer::create($request->all());
        return new CustomerResource($customer);
    }

    public function show(Customer $customer): CustomerResource
    {
        return new CustomerResource($customer);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer): CustomerResource
    {
        $customer->update($request->all());
        return new CustomerResource($customer);
    }

    public function destroy(Customer $customer): JsonResponse
    {
        if ($customer->delete()) {
            return response()->json(status: 204);
        } else {
            return response()->json(status: 500);
        }
    }
}

