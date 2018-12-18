<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Requests\Inventory\CreateInventoryTransactionsRequest;
use App\Http\Requests\Inventory\UpdateInventoryTransactionsRequest;
use App\Repositories\Inventory\InventoryTransactionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InventoryTransactionsController extends AppBaseController
{
    /** @var  InventoryTransactionsRepository */
    private $inventoryTransactionsRepository;

    public function __construct(InventoryTransactionsRepository $inventoryTransactionsRepo)
    {
        $this->inventoryTransactionsRepository = $inventoryTransactionsRepo;
    }

    /**
     * Display a listing of the InventoryTransactions.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->inventoryTransactionsRepository->pushCriteria(new RequestCriteria($request));
        $inventoryTransactions = $this->inventoryTransactionsRepository->paginate(10);

        return view('inventory.inventory_transactions.index')
            ->with('inventoryTransactions', $inventoryTransactions);
    }

    /**
     * Show the form for creating a new InventoryTransactions.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.inventory_transactions.create');
    }

    /**
     * Store a newly created InventoryTransactions in storage.
     *
     * @param CreateInventoryTransactionsRequest $request
     *
     * @return Response
     */
    public function store(CreateInventoryTransactionsRequest $request)
    {
        $input = $request->all();

        $inventoryTransactions = $this->inventoryTransactionsRepository->create($input);

        Flash::success('Inventory Transactions saved successfully.');

        return redirect(route('inventory.inventoryTransactions.index'));
    }

    /**
     * Display the specified InventoryTransactions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inventoryTransactions =  \App\Models\Inventory\InventoryTransactions::with('warehouse')->with('items')->with('user')->where('item_id', $id)->get();
        $avilableqty = \App\Models\Inventory\StockDetails::where('item_id' , $id)->with('items')->get();
  // dd($avilableqty[0]->items->units->name);
  //dd($avilableqty->sum('qty'));
        if ($inventoryTransactions->isEmpty()) {
            // dd('dfsfd');
            Flash::error('Transaction  not found');
            return redirect(route('inventory.inventory_transactions.index'));
        }

        return view('inventory.inventory_transactions.show')->with('inventoryTransactions', $inventoryTransactions)->with('avilableqty' , $avilableqty->sum('qty'))->with('unit' , $avilableqty[0]->items->units->name);
    }

    /**
     * Show the form for editing the specified InventoryTransactions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inventoryTransactions = $this->inventoryTransactionsRepository->findWithoutFail($id);

        if (empty($inventoryTransactions)) {
            Flash::error('Inventory Transactions not found');

            return redirect(route('inventory.inventoryTransactions.index'));
        }

        return view('inventory.inventory_transactions.edit')->with('inventoryTransactions', $inventoryTransactions);
    }

    /**
     * Update the specified InventoryTransactions in storage.
     *
     * @param  int              $id
     * @param UpdateInventoryTransactionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInventoryTransactionsRequest $request)
    {
        $inventoryTransactions = $this->inventoryTransactionsRepository->findWithoutFail($id);

        if (empty($inventoryTransactions)) {
            Flash::error('Inventory Transactions not found');

            return redirect(route('inventory.inventoryTransactions.index'));
        }

        $inventoryTransactions = $this->inventoryTransactionsRepository->update($request->all(), $id);

        Flash::success('Inventory Transactions updated successfully.');

        return redirect(route('inventory.inventoryTransactions.index'));
    }

    /**
     * Remove the specified InventoryTransactions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inventoryTransactions = $this->inventoryTransactionsRepository->findWithoutFail($id);

        if (empty($inventoryTransactions)) {
            Flash::error('Inventory Transactions not found');

            return redirect(route('inventory.inventoryTransactions.index'));
        }

        $this->inventoryTransactionsRepository->delete($id);

        Flash::success('Inventory Transactions deleted successfully.');

        return redirect(route('inventory.inventoryTransactions.index'));
    }
}
