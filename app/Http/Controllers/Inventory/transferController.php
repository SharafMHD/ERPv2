<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Requests\Inventory\CreatetransferRequest;
use App\Http\Requests\Inventory\UpdatetransferRequest;
use App\Repositories\Inventory\transferRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use \App\Models\Inventory\warehouses;
class transferController extends AppBaseController
{
    /** @var  transferRepository */
    private $transferRepository;

    public function __construct(transferRepository $transferRepo)
    {
        $this->transferRepository = $transferRepo;
    }

    /**
     * Display a listing of the transfer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transferRepository->pushCriteria(new RequestCriteria($request));
        $transfers = $this->transferRepository->paginate(10);

        return view('inventory.transfers.index')
            ->with('transfers', $transfers);
    }

    /**
     * Show the form for creating a new transfer.
     *
     * @return Response
     */
    public function create()
    {
        $warehouses= warehouses::pluck('name','id');
        $items= \App\Models\Inventory\items::pluck('name','id');
        return view('inventory.transfers.create')->with('warehouses', $warehouses)->with('items',$items);
    }

    /**
     * Store a newly created transfer in storage.
     *
     * @param CreatetransferRequest $request
     *
     * @return Response
     */
    public function store(CreatetransferRequest $request)
    {
        $input = $request->all();

        $transfer = $this->transferRepository->create($input);

        Flash::success('Transfer saved successfully.');

        return redirect(route('inventory.transfers.index'));
    }

    /**
     * Display the specified transfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transfer = $this->transferRepository->findWithoutFail($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('inventory.transfers.index'));
        }

        return view('inventory.transfers.show')->with('transfer', $transfer);
    }

    /**
     * Show the form for editing the specified transfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transfer = $this->transferRepository->findWithoutFail($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('inventory.transfers.index'));
        }

        return view('inventory.transfers.edit')->with('transfer', $transfer);
    }

    /**
     * Update the specified transfer in storage.
     *
     * @param  int              $id
     * @param UpdatetransferRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetransferRequest $request)
    {
        $transfer = $this->transferRepository->findWithoutFail($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('inventory.transfers.index'));
        }

        $transfer = $this->transferRepository->update($request->all(), $id);

        Flash::success('Transfer updated successfully.');

        return redirect(route('inventory.transfers.index'));
    }

    /**
     * Remove the specified transfer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transfer = $this->transferRepository->findWithoutFail($id);

        if (empty($transfer)) {
            Flash::error('Transfer not found');

            return redirect(route('inventory.transfers.index'));
        }

        $this->transferRepository->delete($id);

        Flash::success('Transfer deleted successfully.');

        return redirect(route('inventory.transfers.index'));
    }
}
