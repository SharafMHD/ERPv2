<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Requests\Inventory\CreateunitsRequest;
use App\Http\Requests\Inventory\UpdateunitsRequest;
use App\Repositories\Inventory\unitsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class unitsController extends AppBaseController
{
    /** @var  unitsRepository */
    private $unitsRepository;

    public function __construct(unitsRepository $unitsRepo)
    {
        $this->unitsRepository = $unitsRepo;
    }

    /**
     * Display a listing of the units.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->unitsRepository->pushCriteria(new RequestCriteria($request));
        $units = $this->unitsRepository->paginate(10);

        return view('inventory.units.index')
            ->with('units', $units);
    }

    /**
     * Show the form for creating a new units.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.units.create');
    }

    /**
     * Store a newly created units in storage.
     *
     * @param CreateunitsRequest $request
     *
     * @return Response
     */
    public function store(CreateunitsRequest $request)
    {
        $input = $request->all();

        $units = $this->unitsRepository->create($input);

        Flash::success('Units saved successfully.');

        return redirect(route('inventory.units.index'));
    }

    /**
     * Display the specified units.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $units = $this->unitsRepository->findWithoutFail($id);

        if (empty($units)) {
            Flash::error('Units not found');

            return redirect(route('inventory.units.index'));
        }

        return view('inventory.units.show')->with('units', $units);
    }

    /**
     * Show the form for editing the specified units.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $units = $this->unitsRepository->findWithoutFail($id);

        if (empty($units)) {
            Flash::error('Units not found');

            return redirect(route('inventory.units.index'));
        }

        return view('inventory.units.edit')->with('units', $units);
    }

    /**
     * Update the specified units in storage.
     *
     * @param  int              $id
     * @param UpdateunitsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateunitsRequest $request)
    {
        $units = $this->unitsRepository->findWithoutFail($id);

        if (empty($units)) {
            Flash::error('Units not found');

            return redirect(route('inventory.units.index'));
        }

        $units = $this->unitsRepository->update($request->all(), $id);

        Flash::success('Units updated successfully.');

        return redirect(route('inventory.units.index'));
    }

    /**
     * Remove the specified units from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $units = $this->unitsRepository->findWithoutFail($id);

        if (empty($units)) {
            Flash::error('Units not found');

            return redirect(route('inventory.units.index'));
        }

        $this->unitsRepository->delete($id);

        Flash::success('Units deleted successfully.');

        return redirect(route('inventory.units.index'));
    }
}
