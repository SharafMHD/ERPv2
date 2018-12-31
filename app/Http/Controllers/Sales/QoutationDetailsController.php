<?php

namespace App\Http\Controllers\Sales;

use App\Http\Requests\Sales\CreateQoutationDetailsRequest;
use App\Http\Requests\Sales\UpdateQoutationDetailsRequest;
use App\Repositories\Sales\QoutationDetailsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class QoutationDetailsController extends AppBaseController
{
    /** @var  QoutationDetailsRepository */
    private $qoutationDetailsRepository;

    public function __construct(QoutationDetailsRepository $qoutationDetailsRepo)
    {
        $this->qoutationDetailsRepository = $qoutationDetailsRepo;
    }

    /**
     * Display a listing of the QoutationDetails.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->qoutationDetailsRepository->pushCriteria(new RequestCriteria($request));
        $qoutationDetails = $this->qoutationDetailsRepository->all();

        return view('sales.qoutation_details.index')
            ->with('qoutationDetails', $qoutationDetails);
    }

    /**
     * Show the form for creating a new QoutationDetails.
     *
     * @return Response
     */
    public function create()
    {
        return view('sales.qoutation_details.create');
    }

    /**
     * Store a newly created QoutationDetails in storage.
     *
     * @param CreateQoutationDetailsRequest $request
     *
     * @return Response
     */
    public function store(CreateQoutationDetailsRequest $request)
    {
        $input = $request->all();

        $qoutationDetails = $this->qoutationDetailsRepository->create($input);

        Flash::success('Qoutation Details saved successfully.');

        return redirect(route('sales.qoutationDetails.index'));
    }

    /**
     * Display the specified QoutationDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $qoutationDetails = $this->qoutationDetailsRepository->findWithoutFail($id);

        if (empty($qoutationDetails)) {
            Flash::error('Qoutation Details not found');

            return redirect(route('sales.qoutationDetails.index'));
        }

        return view('sales.qoutation_details.show')->with('qoutationDetails', $qoutationDetails);
    }

    /**
     * Show the form for editing the specified QoutationDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $qoutationDetails = $this->qoutationDetailsRepository->findWithoutFail($id);

        if (empty($qoutationDetails)) {
            Flash::error('Qoutation Details not found');

            return redirect(route('sales.qoutationDetails.index'));
        }

        return view('sales.qoutation_details.edit')->with('qoutationDetails', $qoutationDetails);
    }

    /**
     * Update the specified QoutationDetails in storage.
     *
     * @param  int              $id
     * @param UpdateQoutationDetailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQoutationDetailsRequest $request)
    {
        $qoutationDetails = $this->qoutationDetailsRepository->findWithoutFail($id);

        if (empty($qoutationDetails)) {
            Flash::error('Qoutation Details not found');

            return redirect(route('sales.qoutationDetails.index'));
        }

        $qoutationDetails = $this->qoutationDetailsRepository->update($request->all(), $id);

        Flash::success('Qoutation Details updated successfully.');

        return redirect(route('sales.qoutationDetails.index'));
    }

    /**
     * Remove the specified QoutationDetails from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $qoutationDetails = $this->qoutationDetailsRepository->findWithoutFail($id);

        if (empty($qoutationDetails)) {
            Flash::error('Qoutation Details not found');

            return redirect(route('sales.qoutationDetails.index'));
        }

        $this->qoutationDetailsRepository->delete($id);

        Flash::success('Qoutation Details deleted successfully.');

        return redirect(route('sales.qoutationDetails.index'));
    }
}
