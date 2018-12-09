<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Requests\Accounting\CreateaccountsRequest;
use App\Http\Requests\Accounting\UpdateaccountsRequest;
use App\Repositories\Accounting\accountsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class accountsController extends AppBaseController
{
    /** @var  accountsRepository */
    private $accountsRepository;

    public function __construct(accountsRepository $accountsRepo)
    {
        $this->accountsRepository = $accountsRepo;
    }

    /**
     * Display a listing of the accounts.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->accountsRepository->pushCriteria(new RequestCriteria($request));
        $accounts = $this->accountsRepository->paginate(10);

        return view('accounting.accounts.index')
            ->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new accounts.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.accounts.create');
    }

    /**
     * Store a newly created accounts in storage.
     *
     * @param CreateaccountsRequest $request
     *
     * @return Response
     */
    public function store(CreateaccountsRequest $request)
    {
        $input = $request->all();

        $accounts = $this->accountsRepository->create($input);

        Flash::success('Accounts saved successfully.');

        return redirect(route('accounting.accounts.index'));
    }

    /**
     * Display the specified accounts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accounts = $this->accountsRepository->findWithoutFail($id);

        if (empty($accounts)) {
            Flash::error('Accounts not found');

            return redirect(route('accounting.accounts.index'));
        }

        return view('accounting.accounts.show')->with('accounts', $accounts);
    }

    /**
     * Show the form for editing the specified accounts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accounts = $this->accountsRepository->findWithoutFail($id);

        if (empty($accounts)) {
            Flash::error('Accounts not found');

            return redirect(route('accounting.accounts.index'));
        }

        return view('accounting.accounts.edit')->with('accounts', $accounts);
    }

    /**
     * Update the specified accounts in storage.
     *
     * @param  int              $id
     * @param UpdateaccountsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaccountsRequest $request)
    {
        $accounts = $this->accountsRepository->findWithoutFail($id);

        if (empty($accounts)) {
            Flash::error('Accounts not found');

            return redirect(route('accounting.accounts.index'));
        }

        $accounts = $this->accountsRepository->update($request->all(), $id);

        Flash::success('Accounts updated successfully.');

        return redirect(route('accounting.accounts.index'));
    }

    /**
     * Remove the specified accounts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accounts = $this->accountsRepository->findWithoutFail($id);

        if (empty($accounts)) {
            Flash::error('Accounts not found');

            return redirect(route('accounting.accounts.index'));
        }

        $this->accountsRepository->delete($id);

        Flash::success('Accounts deleted successfully.');

        return redirect(route('accounting.accounts.index'));
    }
}
