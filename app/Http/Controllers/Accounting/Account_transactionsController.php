<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Requests\Accounting\CreateAccount_transactionsRequest;
use App\Http\Requests\Accounting\UpdateAccount_transactionsRequest;
use App\Repositories\Accounting\Account_transactionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Account_transactionsController extends AppBaseController
{
    /** @var  Account_transactionsRepository */
    private $accountTransactionsRepository;

    public function __construct(Account_transactionsRepository $accountTransactionsRepo)
    {
        $this->accountTransactionsRepository = $accountTransactionsRepo;
    }

    /**
     * Display a listing of the Account_transactions.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->accountTransactionsRepository->pushCriteria(new RequestCriteria($request));
        $accountTransactions = $this->accountTransactionsRepository->paginate(10);

        return view('accounting.account_transactions.index')
            ->with('accountTransactions', $accountTransactions);
    }

    /**
     * Show the form for creating a new Account_transactions.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.account_transactions.create');
    }

    /**
     * Store a newly created Account_transactions in storage.
     *
     * @param CreateAccount_transactionsRequest $request
     *
     * @return Response
     */
    public function store(CreateAccount_transactionsRequest $request)
    {
        $input = $request->all();

        $accountTransactions = $this->accountTransactionsRepository->create($input);

        Flash::success('Account Transactions saved successfully.');

        return redirect(route('accounting.accountTransactions.index'));
    }

    /**
     * Display the specified Account_transactions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountTransactions = $this->accountTransactionsRepository->findWithoutFail($id);

        if (empty($accountTransactions)) {
            Flash::error('Account Transactions not found');

            return redirect(route('accounting.accountTransactions.index'));
        }

        return view('accounting.account_transactions.show')->with('accountTransactions', $accountTransactions);
    }

    /**
     * Show the form for editing the specified Account_transactions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountTransactions = $this->accountTransactionsRepository->findWithoutFail($id);

        if (empty($accountTransactions)) {
            Flash::error('Account Transactions not found');

            return redirect(route('accounting.accountTransactions.index'));
        }

        return view('accounting.account_transactions.edit')->with('accountTransactions', $accountTransactions);
    }

    /**
     * Update the specified Account_transactions in storage.
     *
     * @param  int              $id
     * @param UpdateAccount_transactionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccount_transactionsRequest $request)
    {
        $accountTransactions = $this->accountTransactionsRepository->findWithoutFail($id);

        if (empty($accountTransactions)) {
            Flash::error('Account Transactions not found');

            return redirect(route('accounting.accountTransactions.index'));
        }

        $accountTransactions = $this->accountTransactionsRepository->update($request->all(), $id);

        Flash::success('Account Transactions updated successfully.');

        return redirect(route('accounting.accountTransactions.index'));
    }

    /**
     * Remove the specified Account_transactions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountTransactions = $this->accountTransactionsRepository->findWithoutFail($id);

        if (empty($accountTransactions)) {
            Flash::error('Account Transactions not found');

            return redirect(route('accounting.accountTransactions.index'));
        }

        $this->accountTransactionsRepository->delete($id);

        Flash::success('Account Transactions deleted successfully.');

        return redirect(route('accounting.accountTransactions.index'));
    }
}
