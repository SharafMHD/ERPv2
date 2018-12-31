<?php

namespace App\Http\Controllers\Sales;

use App\Http\Requests\Sales\Createsales__qoutation_detailsRequest;
use App\Http\Requests\Sales\Updatesales__qoutation_detailsRequest;
use App\Repositories\Sales\sales__qoutation_detailsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class sales__qoutation_detailsController extends AppBaseController
{
    /** @var  sales__qoutation_detailsRepository */
    private $salesQoutationDetailsRepository;

    public function __construct(sales__qoutation_detailsRepository $salesQoutationDetailsRepo)
    {
        $this->salesQoutationDetailsRepository = $salesQoutationDetailsRepo;
    }

    /**
     * Display a listing of the sales__qoutation_details.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salesQoutationDetailsRepository->pushCriteria(new RequestCriteria($request));
        $salesQoutationDetails = $this->salesQoutationDetailsRepository->all();

        return view('sales.sales__qoutation_details.index')
            ->with('salesQoutationDetails', $salesQoutationDetails);
    }

    /**
     * Show the form for creating a new sales__qoutation_details.
     *
     * @return Response
     */
    public function create()
    {
        return view('sales.sales__qoutation_details.create');
    }

    /**
     * Store a newly created sales__qoutation_details in storage.
     *
     * @param Createsales__qoutation_detailsRequest $request
     *
     * @return Response
     */
    public function store(Createsales__qoutation_detailsRequest $request)
    {
        $input = $request->all();

        $salesQoutationDetails = $this->salesQoutationDetailsRepository->create($input);

        Flash::success('Sales  Qoutation Details saved successfully.');

        return redirect(route('sales.salesQoutationDetails.index'));
    }

    /**
     * Display the specified sales__qoutation_details.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesQoutationDetails = $this->salesQoutationDetailsRepository->findWithoutFail($id);

        if (empty($salesQoutationDetails)) {
            Flash::error('Sales  Qoutation Details not found');

            return redirect(route('sales.salesQoutationDetails.index'));
        }

        return view('sales.sales__qoutation_details.show')->with('salesQoutationDetails', $salesQoutationDetails);
    }

    /**
     * Show the form for editing the specified sales__qoutation_details.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesQoutationDetails = $this->salesQoutationDetailsRepository->findWithoutFail($id);

        if (empty($salesQoutationDetails)) {
            Flash::error('Sales  Qoutation Details not found');

            return redirect(route('sales.salesQoutationDetails.index'));
        }

        return view('sales.sales__qoutation_details.edit')->with('salesQoutationDetails', $salesQoutationDetails);
    }

    /**
     * Update the specified sales__qoutation_details in storage.
     *
     * @param  int              $id
     * @param Updatesales__qoutation_detailsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatesales__qoutation_detailsRequest $request)
    {
        $salesQoutationDetails = $this->salesQoutationDetailsRepository->findWithoutFail($id);

        if (empty($salesQoutationDetails)) {
            Flash::error('Sales  Qoutation Details not found');

            return redirect(route('sales.salesQoutationDetails.index'));
        }

        $salesQoutationDetails = $this->salesQoutationDetailsRepository->update($request->all(), $id);

        Flash::success('Sales  Qoutation Details updated successfully.');

        return redirect(route('sales.salesQoutationDetails.index'));
    }

    /**
     * Remove the specified sales__qoutation_details from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesQoutationDetails = $this->salesQoutationDetailsRepository->findWithoutFail($id);

        if (empty($salesQoutationDetails)) {
            Flash::error('Sales  Qoutation Details not found');

            return redirect(route('sales.salesQoutationDetails.index'));
        }

        $this->salesQoutationDetailsRepository->delete($id);

        Flash::success('Sales  Qoutation Details deleted successfully.');

        return redirect(route('sales.salesQoutationDetails.index'));
    }
}
