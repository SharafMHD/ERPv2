<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Requests\Inventory\CreatewarehousesRequest;
use App\Http\Requests\Inventory\UpdatewarehousesRequest;
use App\Repositories\Inventory\warehousesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class warehousesController extends AppBaseController
{
    /** @var  warehousesRepository */
    private $warehousesRepository;

    public function __construct(warehousesRepository $warehousesRepo)
    {
        $this->warehousesRepository = $warehousesRepo;
    }

    /**
     * Display a listing of the warehouses.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->warehousesRepository->pushCriteria(new RequestCriteria($request));
        $warehouses = $this->warehousesRepository->all();

        return view('inventory.warehouses.index')
            ->with('warehouses', $warehouses);
    }

    /**
     * Show the form for creating a new warehouses.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.warehouses.create');
    }

    /**
     * Store a newly created warehouses in storage.
     *
     * @param CreatewarehousesRequest $request
     *
     * @return Response
     */
    public function store(CreatewarehousesRequest $request)
    {
        $input = $request->all();

        $warehouses = $this->warehousesRepository->create($input);

        Flash::success('Warehouses saved successfully.');

        return redirect(route('inventory.warehouses.index'));
    }

    /**
     * Display the specified warehouses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $warehouses = $this->warehousesRepository->findWithoutFail($id);

        if (empty($warehouses)) {
            Flash::error('Warehouses not found');

            return redirect(route('inventory.warehouses.index'));
        }

        return view('inventory.warehouses.show')->with('warehouses', $warehouses);
    }

    /**
     * Show the form for editing the specified warehouses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $warehouses = $this->warehousesRepository->findWithoutFail($id);

        if (empty($warehouses)) {
            Flash::error('Warehouses not found');

            return redirect(route('inventory.warehouses.index'));
        }

        return view('inventory.warehouses.edit')->with('warehouses', $warehouses);
    }

    /**
     * Update the specified warehouses in storage.
     *
     * @param  int              $id
     * @param UpdatewarehousesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatewarehousesRequest $request)
    {
        $warehouses = $this->warehousesRepository->findWithoutFail($id);

        if (empty($warehouses)) {
            Flash::error('Warehouses not found');

            return redirect(route('inventory.warehouses.index'));
        }

        $warehouses = $this->warehousesRepository->update($request->all(), $id);

        Flash::success('Warehouses updated successfully.');

        return redirect(route('inventory.warehouses.index'));
    }

    /**
     * Remove the specified warehouses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $warehouses = $this->warehousesRepository->findWithoutFail($id);

        if (empty($warehouses)) {
            Flash::error('Warehouses not found');

            return redirect(route('inventory.warehouses.index'));
        }

        $this->warehousesRepository->delete($id);

        Flash::success('Warehouses deleted successfully.');

        return redirect(route('inventory.warehouses.index'));
    }
}
