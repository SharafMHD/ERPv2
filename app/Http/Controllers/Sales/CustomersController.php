<?php

namespace App\Http\Controllers\Sales;

use App\Http\Requests\Sales\CreateCustomersRequest;
use App\Http\Requests\Sales\UpdateCustomersRequest;
use App\Repositories\Sales\CustomersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CustomersController extends AppBaseController
{
    /** @var  CustomersRepository */
    private $customersRepository;

    public function __construct(CustomersRepository $customersRepo)
    {
        $this->customersRepository = $customersRepo;
    }

    /**
     * Display a listing of the Customers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->customersRepository->pushCriteria(new RequestCriteria($request));
        $customers = $this->customersRepository->all();

        return view('sales.customers.index')
            ->with('customers', $customers);
    }
    /**
     * Show the form for creating a new Customers.
     *
     * @return Response
     */
    public function create()
    {
        return view('sales.customers.create');
    }

    /**
     * Store a newly created Customers in storage.
     *
     * @param CreateCustomersRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomersRequest $request)
    {
        $input = $request->all();

        $customers = $this->customersRepository->create($input);

        Flash::success('Customers saved successfully.');

        return redirect(route('sales.customers.index'));
    }

    /**
     * Display the specified Customers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customers = $this->customersRepository->findWithoutFail($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('sales.customers.index'));
        }

        return view('sales.customers.show')->with('customers', $customers);
    }

    /**
     * Show the form for editing the specified Customers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customers = $this->customersRepository->findWithoutFail($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('sales.customers.index'));
        }

        return view('sales.customers.edit')->with('customers', $customers);
    }

    /**
     * Update the specified Customers in storage.
     *
     * @param  int              $id
     * @param UpdateCustomersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomersRequest $request)
    {
        $customers = $this->customersRepository->findWithoutFail($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('sales.customers.index'));
        }

        $customers = $this->customersRepository->update($request->all(), $id);

        Flash::success('Customers updated successfully.');

        return redirect(route('sales.customers.index'));
    }

    /**
     * Remove the specified Customers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customers = $this->customersRepository->findWithoutFail($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('sales.customers.index'));
        }

        $this->customersRepository->delete($id);

        Flash::success('Customers deleted successfully.');

        return redirect(route('sales.customers.index'));
    }
}
