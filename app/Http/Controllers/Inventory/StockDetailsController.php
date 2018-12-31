<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateStockDetailsRequest;
use App\Http\Requests\Inventory\UpdateStockDetailsRequest;
use App\Models\Inventory\warehouses;
use App\Repositories\Inventory\StockDetailsRepository;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use \App\Models\Inventory\InventoryTransactions;
use \App\Models\Inventory\items;
use App\Models\Inventory\StockDetails;

class StockDetailsController extends AppBaseController
{
    /** @var  StockDetailsRepository */
    private $stockDetailsRepository;

    public function __construct(StockDetailsRepository $stockDetailsRepo)
    {
        $this->stockDetailsRepository = $stockDetailsRepo;
    }

    /**
     * Display a listing of the StockDetails.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stockDetailsRepository->pushCriteria(new RequestCriteria($request));
        $stockDetails =  $this->stockDetailsRepository->paginate(10);
        //  dd($stockDetails);
        return view('inventory.stock_details.index')
            ->with('stockDetails', $stockDetails);
    }

    /**
     * Show the form for creating a new StockDetails.
     *
     * @return Response
     */
    public function create()
    {
        $warehouses = \App\Models\Inventory\warehouses::pluck('name', 'id');
        $items = \App\Models\Inventory\items::pluck('name', 'id');
        return view('inventory.stock_details.create')->with('warehouses', $warehouses)->with('items', $items);
    }

    /*

     */
    public function print($id, $title)
    {
        $movment = \App\Models\Inventory\InventoryTransactions::with('warehouse')->with('items')->with('user')->where('no', $id)->get();
        // dd($movment[0]->warehouse->name);
        if ($movment->isEmpty()) {
            // dd('dfsfd');
            Flash::error('Transaction  not found');
            return redirect(route('inventory.inventory_transactions.index'));
        }
        return view('inventory.inventory_transactions.print-transaction')->with('movment', $movment)->with('title', $title);
    }
    /**
     * Store a newly created StockDetails in storage.
     *
     * @param CreateStockDetailsRequest $request
     *
     * @return Response
     */
    public function store(CreateStockDetailsRequest $request)
    {
        foreach ($request->inventory__details as $data) {
            // update or insert new record to inventory details
            $inventory = \App\Models\Inventory\StockDetails::firstOrNew(
                ['warehouse_id' => $data['warehouse_id'],
                    'item_id' => $data['item_id'],
                    'expiry_date' => $data['expiry_date'],
                ]
            );
            $inventory->qty = ($inventory->qty + $data['qty']);
            $inventory->save();
            // insert transaction
            $InventoryTransactions = new InventoryTransactions;
            $InventoryTransactions->no = $request->no;
            $InventoryTransactions->warehouse_id = $data['warehouse_id'];
            $InventoryTransactions->item_id = $data['item_id'];
            $InventoryTransactions->transaction_type = "Import";
            $InventoryTransactions->qty = $data['qty'];
            $InventoryTransactions->expiry_date = $data['expiry_date'];
            $InventoryTransactions->description = "Warehouse Stock in";
            $InventoryTransactions->user_id = Auth::id();
            $InventoryTransactions->save();
        }
        return response()->json(['id' => $InventoryTransactions->no]);
    }
    /**
     *
     */
    public function stockout(Request $request)
    {
        $warehouses = \App\Models\Inventory\warehouses::pluck('name', 'id');
        $items = \App\Models\Inventory\items::pluck('name', 'id');
        return view('inventory.stock_details.stockout')->with('warehouses', $warehouses)->with('items', $items);
    }
    public function dostockout(Request $request)
    {
        if ($request->ajax()) {
            foreach ($request->inventory__details as $data) {
                // update  record in inventory details
                $stockDetails = $this->stockDetailsRepository->findWithoutFail($data['inventory_id']);
                $stockDetails->qty = $stockDetails->qty - $data['qty'];
                $stockDetails->save();
                // insert transaction
                $InventoryTransactions = new InventoryTransactions;
                $InventoryTransactions->no = $request->no;
                $InventoryTransactions->warehouse_id = $data['warehouse_id'];
                $InventoryTransactions->item_id = $data['item_id'];
                $InventoryTransactions->transaction_type = "Export";
                $InventoryTransactions->qty = $data['qty'];
                $InventoryTransactions->expiry_date = $data['expiry_date'];
                $InventoryTransactions->description = "Warehouse Stock Out" . '/ ' . $data['notes'];
                $InventoryTransactions->user_id = Auth::id();
                $InventoryTransactions->save();
            }
            return response()->json(['id' => $InventoryTransactions->no]);
        }
    }
    /**
     * Display the specified StockDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockDetails = $this->stockDetailsRepository->findWithoutFail($id);

        if (empty($stockDetails)) {
            Flash::error('Stock Details not found');

            return redirect(route('inventory.stockDetails.index'));
        }

        return view('inventory.stock_details.show')->with('stockDetails', $stockDetails);
    }

    /**
     * Show the form for editing the specified StockDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockDetails = $this->stockDetailsRepository->findWithoutFail($id);

        if (empty($stockDetails)) {
            Flash::error('Stock Details not found');

            return redirect(route('inventory.stockDetails.index'));
        }

        return view('inventory.stock_details.edit')->with('stockDetails', $stockDetails);
    }

    /**
     * Update the specified StockDetails in storage.
     *
     * @param  int              $id
     * @param UpdateStockDetailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockDetailsRequest $request)
    {
        $stockDetails = $this->stockDetailsRepository->findWithoutFail($id);

        if (empty($stockDetails)) {
            Flash::error('Stock Details not found');

            return redirect(route('inventory.stockDetails.index'));
        }

        $stockDetails = $this->stockDetailsRepository->update($request->all(), $id);

        Flash::success('Stock Details updated successfully.');

        return redirect(route('inventory.stockDetails.index'));
    }

    /**
     * Remove the specified StockDetails from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockDetails = $this->stockDetailsRepository->findWithoutFail($id);

        if (empty($stockDetails)) {
            Flash::error('Stock Details not found');

            return redirect(route('inventory.stockDetails.index'));
        }

        $this->stockDetailsRepository->delete($id);

        Flash::success('Stock Details deleted successfully.');

        return redirect(route('inventory.stockDetails.index'));
    }
}
