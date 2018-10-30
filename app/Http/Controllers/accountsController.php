<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateaccountsRequest;
use App\Http\Requests\UpdateaccountsRequest;
use App\Repositories\accountsRepository;
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
        $accounts = $this->accountsRepository->all();

        return view('accounts.index')
            ->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new accounts.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounts.create');
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

        return redirect(route('accounts.index'));
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

            return redirect(route('accounts.index'));
        }

        return view('accounts.show')->with('accounts', $accounts);
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

            return redirect(route('accounts.index'));
        }

        return view('accounts.edit')->with('accounts', $accounts);
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

            return redirect(route('accounts.index'));
        }

        $accounts = $this->accountsRepository->update($request->all(), $id);

        Flash::success('Accounts updated successfully.');

        return redirect(route('accounts.index'));
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

            return redirect(route('accounts.index'));
        }

        $this->accountsRepository->delete($id);

        Flash::success('Accounts deleted successfully.');

        return redirect(route('accounts.index'));
    }
}
