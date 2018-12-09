<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Requests\Accounting\CreatedepositRequest;
use App\Http\Requests\Accounting\UpdatedepositRequest;
use App\Repositories\Accounting\depositRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use \App\Models\Accounting\accounts;
use \App\Models\Accounting\deposit;
use Auth;
use Response;

class depositController extends AppBaseController
{
    /** @var  depositRepository */
    private $depositRepository;

    public function __construct(depositRepository $depositRepo)
    {
        $this->depositRepository = $depositRepo;
    }

    /**
     * Display a listing of the deposit.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->depositRepository->pushCriteria(new RequestCriteria($request));
        $deposits = $this->depositRepository->paginate(10);

        return view('accounting.deposits.index')
            ->with('deposits', $deposits);
    }

    /**
     * Show the form for creating a new deposit.
     *
     * @return Response
     */
    public function create()
    {
        $accounts = accounts::pluck('name', 'id');
        return view('accounting.deposits.create')->with('accounts', $accounts);
    }

    /**
     * Store a newly created deposit in storage.
     *
     * @param CreatedepositRequest $request
     *
     * @return Response
     */
    public function store(CreatedepositRequest $request)
    {
        // $input = $request->all();
        $input = new deposit;
        $input->date = $request->date;
        $input->no = $request->no;
        $input->account_id = $request->account_id;
        $input->transaction_type = "Credit";
        $input->credit = $request->credit;
        $input->debit = 0;
        $input->pay_type = $request->pay_type;
        $input->description = $request->description;
        $input->cheque_no = $request->cheque_no;
        $input->cheque_date = $request->cheque_date;
        $input->cheque_bank = $request->cheque_bank;
        $input->cheque_status = $request->cheque_status;
        $input->ref_no = "--";
        $input->user_id = Auth::id();
        $input->save();
        //$deposit = $this->depositRepository->create($input);

        Flash::success('Deposit saved successfully.');

        return redirect(route('accounting.deposits.index'));
    }

    /**
     * Display the specified deposit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deposit = $this->depositRepository->findWithoutFail($id);

        if (empty($deposit)) {
            Flash::error('Deposit not found');

            return redirect(route('accounting.deposits.index'));
        }

        return view('accounting.deposits.show')->with('deposit', $deposit);
    }

    /**
     * Show the form for editing the specified deposit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deposit = $this->depositRepository->findWithoutFail($id);

        if (empty($deposit)) {
            Flash::error('Deposit not found');

            return redirect(route('accounting.deposits.index'));
        }

        return view('accounting.deposits.edit')->with('deposit', $deposit);
    }

    /**
     * Update the specified deposit in storage.
     *
     * @param  int              $id
     * @param UpdatedepositRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedepositRequest $request)
    {
        
        $deposit = $this->depositRepository->findWithoutFail($id);

        if (empty($deposit)) {
            Flash::error('Deposit not found');

            return redirect(route('accounting.deposits.index'));
        }

        //$deposit = $this->depositRepository->update($request->all(), $id);
        $deposit->date = $request->date;
        $deposit->no = $request->no;
        $deposit->account_id = $request->account_id;
        $deposit->transaction_type = "Credit";
        $deposit->credit = $request->credit;
        $deposit->debit = 0;
        $deposit->pay_type = $request->pay_type;
        $deposit->description = $request->description;
        $deposit->cheque_no = $request->cheque_no;
        $deposit->cheque_date = $request->cheque_date;
        $deposit->cheque_bank = $request->cheque_bank;
        $deposit->cheque_status = $request->cheque_status;
        $deposit->ref_no = "--";
        $deposit->user_id = Auth::id();
        $deposit->save();
        Flash::success('Deposit updated successfully.');

        return redirect(route('accounting.deposits.index'));
    }

    /**
     * Remove the specified deposit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deposit = $this->depositRepository->findWithoutFail($id);

        if (empty($deposit)) {
            Flash::error('Deposit not found');

            return redirect(route('accounting.deposits.index'));
        }

        $this->depositRepository->delete($id);

        Flash::success('Deposit deleted successfully.');

        return redirect(route('accounting.deposits.index'));
    }
}
