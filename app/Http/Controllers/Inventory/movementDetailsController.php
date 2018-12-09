<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Requests\Inventory\CreatemovementDetailsRequest;
use App\Http\Requests\Inventory\UpdatemovementDetailsRequest;
use App\Repositories\Inventory\movementDetailsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class movementDetailsController extends AppBaseController
{
    /** @var  movementDetailsRepository */
    private $movementDetailsRepository;

    public function __construct(movementDetailsRepository $movementDetailsRepo)
    {
        $this->movementDetailsRepository = $movementDetailsRepo;
    }

    /**
     * Display a listing of the movementDetails.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->movementDetailsRepository->pushCriteria(new RequestCriteria($request));
        $movementDetails = $this->movementDetailsRepository->paginate(10);

        return view('inventory.movement_details.index')
            ->with('movementDetails', $movementDetails);
    }

    /**
     * Show the form for creating a new movementDetails.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.movement_details.create');
    }

    /**
     * Store a newly created movementDetails in storage.
     *
     * @param CreatemovementDetailsRequest $request
     *
     * @return Response
     */
    public function store(CreatemovementDetailsRequest $request)
    {
        $input = $request->all();

        $movementDetails = $this->movementDetailsRepository->create($input);

        Flash::success('Movement Details saved successfully.');

        return redirect(route('inventory.movementDetails.index'));
    }

    /**
     * Display the specified movementDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $movementDetails = $this->movementDetailsRepository->findWithoutFail($id);

        if (empty($movementDetails)) {
            Flash::error('Movement Details not found');

            return redirect(route('inventory.movementDetails.index'));
        }

        return view('inventory.movement_details.show')->with('movementDetails', $movementDetails);
    }

    /**
     * Show the form for editing the specified movementDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $movementDetails = $this->movementDetailsRepository->findWithoutFail($id);

        if (empty($movementDetails)) {
            Flash::error('Movement Details not found');

            return redirect(route('inventory.movementDetails.index'));
        }

        return view('inventory.movement_details.edit')->with('movementDetails', $movementDetails);
    }

    /**
     * Update the specified movementDetails in storage.
     *
     * @param  int              $id
     * @param UpdatemovementDetailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemovementDetailsRequest $request)
    {
        $movementDetails = $this->movementDetailsRepository->findWithoutFail($id);

        if (empty($movementDetails)) {
            Flash::error('Movement Details not found');

            return redirect(route('inventory.movementDetails.index'));
        }

        $movementDetails = $this->movementDetailsRepository->update($request->all(), $id);

        Flash::success('Movement Details updated successfully.');

        return redirect(route('inventory.movementDetails.index'));
    }

    /**
     * Remove the specified movementDetails from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $movementDetails = $this->movementDetailsRepository->findWithoutFail($id);

        if (empty($movementDetails)) {
            Flash::error('Movement Details not found');

            return redirect(route('inventory.movementDetails.index'));
        }

        $this->movementDetailsRepository->delete($id);

        Flash::success('Movement Details deleted successfully.');

        return redirect(route('inventory.movementDetails.index'));
    }
}
