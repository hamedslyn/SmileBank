<?php

namespace Smile\Bank\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Smile\Bank\Http\Requests\CreateAccountRequest;
use Smile\Bank\Http\Requests\UpdateAccountRequest;
use Smile\Bank\Http\Resources\AccountResource;
use Smile\Bank\Models\Account;
use Smile\Bank\Models\Transfer;

class AccountController extends Controller
{
    public function index(): AccountResource
    {
        return new AccountResource(Account::all());
    }

    public function store(CreateAccountRequest $request): AccountResource
    {
        $account = Account::create($request->all());
        return new AccountResource($account);
    }

    public function show(Account $account): AccountResource
    {
        return new AccountResource($account);
    }

    public function update(UpdateAccountRequest $request, Account $account): AccountResource
    {
        $account->update($request->all());
        return new AccountResource($account);
    }

    public function destroy(Account $account): JsonResponse
    {
        if ($account->delete()) {
            return response()->json(status: 204);
        } else {
            return response()->json(status: 500);
        }
    }

    public function getBalance(Request $request): JsonResponse
    {
        $accountNumber = $request->input('account_number');
        $account       = Account::where('account_number', $accountNumber)->firstOrFail();
        return response()->json(['balance' => $account->balance]);
    }

    public function getTransferHistory(Request $request): JsonResponse
    {
        $accountNumber = $request->input('account_number');
        $account       = Account::where('account_number', $accountNumber)->firstOrFail();

        $transferHistory = Transfer::verified()
                                   ->where('sender_account_id', $account->id)
                                   ->orWhere('receiver_account_id', $account->id)
                                   ->get();

        return response()->json($transferHistory);
    }
}
