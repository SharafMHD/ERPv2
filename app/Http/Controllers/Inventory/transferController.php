<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreatetransferRequest;
use App\Http\Requests\Inventory\UpdatetransferRequest;
use App\Models\Inventory\warehouses;
use App\Repositories\Inventory\transferRepository;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use \App\Models\Inventory\InventoryTransactions;
use \App\Models\Inventory\movementDetails;
use \App\Models\Inventory\StockDetails;
use App\Models\Inventory\transfer;

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
        $transfers = transfer::with('MovementDetails')->paginate(10);

        return view('inventory.transfers.index')->with('transfers', $transfers);
    }

    /**
     * Show the form for creating a new transfer.
     *
     * @return Response
     */
    public function create()
    {
        $warehouses = warehouses::pluck('name', 'id');
        $items = \App\Models\Inventory\items::pluck('name', 'id');
        return view('inventory.transfers.create')->with('warehouses', $warehouses)->with('items', $items);
    }
    /**
     * Do the transfer process
     */

    public function Dotransfer(Request $request)
    {
        if ($request->ajax()) {
            # Save movement
            $Movement = new \App\Models\Inventory\transfer;
            $Movement->no = $request->inventory__movements['no'];
            $Movement->from_warehouse_id = $request->inventory__movements['from_warehouse_id'];
            $Movement->to_warehouse_id = $request->inventory__movements['to_warehouse_id'];
            $Movement->notes = $request->inventory__movements['notes'];
            $Movement->status = "Completed";
            $Movement->user_id = Auth::id();
            $Movement->save();
            foreach ($request->inventory__movement_details as $data) {
                //update from stock qty
                $item = StockDetails::where('item_id', $data['item_id'])->where('warehouse_id', $request->inventory__details['from_warehouse_id'])->where('expiry_date', $data['expiry_date'])->get();
                if (empty($item)) {
                    Flash::error('Item not found in warehouse');
                } else {
                 
                    $item->qty = $item[0]['qty'] - $data['qty'];
           
                    if ($item->qty == 0) {
                        \DB::table('inventory__details')->delete($item[0]['id']);
                        // $this->transferRepository->delete($item[0]['id']);
                    }else {
                        $updatedqty = array('qty' => $item->qty);
                        \DB::table('inventory__details')->where('item_id', $data['item_id'])->where('warehouse_id', $request->inventory__details['from_warehouse_id'])->where('expiry_date', $data['expiry_date'])->update($updatedqty);
                    }
                
                }
                // Chcek if item and to warehouse if exist and update qty to
                $inventory = StockDetails::firstOrNew(
                    [
                        'warehouse_id' => $request->inventory__details['to_warehouse_id'],
                        'item_id' => $data['item_id'],
                        'expiry_date' => $data['expiry_date'],
                    ]
                );
                $inventory->qty = ($inventory->qty + $data['qty']);
                $inventory->save();
                // Save transaction twice
                // save from transaction
                $InventoryTransactions = new InventoryTransactions;
                $InventoryTransactions->no = $request->inventory__transactions['no'];
                $InventoryTransactions->warehouse_id = $request->inventory__transactions['from_warehouse_id'];
                $InventoryTransactions->item_id = $data['item_id'];
                $InventoryTransactions->transaction_type = "Export";
                $InventoryTransactions->qty = $data['qty'];
                $InventoryTransactions->expiry_date = $data['expiry_date'];
                $InventoryTransactions->description = "Warehouse transfer";
                $InventoryTransactions->user_id = Auth::id();
                $InventoryTransactions->save();
                // save To transaction
                $InventoryTransactions = new InventoryTransactions;
                $InventoryTransactions->no = $request->inventory__transactions['no'];
                $InventoryTransactions->warehouse_id = $request->inventory__transactions['to_warehouse_id'];
                $InventoryTransactions->item_id = $data['item_id'];
                $InventoryTransactions->transaction_type = "Import";
                $InventoryTransactions->expiry_date = $data['expiry_date'];
                $InventoryTransactions->qty = $data['qty'];
                $InventoryTransactions->description = "Warehouse transfer";
                $InventoryTransactions->user_id = Auth::id();
                $InventoryTransactions->save();
                # Save  movementDetails
                $movementDetails = new movementDetails;
                $movementDetails->item_id = $data['item_id'];
                $movementDetails->qty = $data['qty'];
                $movementDetails->expiry_date = $data['expiry_date'];
                $movementDetails->notes = $data['notes'];
                $movementDetails->movement_id = $Movement->id;
                $movementDetails->save();

            }
            return response()->json([
                'id' => $Movement->id
            
            ]);
        }
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
     * Display the specified Item.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getitem_qty($item_id, $from_warehouse_id)
    {
        $item = StockDetails::where('item_id', $item_id)->where('warehouse_id', $from_warehouse_id)->paginate(20);
        if (empty($item)) {
            Flash::error('Item not found');
        }
        return Response::json($item);

    }
    public function getqty($id)
    {
        $item = StockDetails::find($id);

        if (empty($item)) {
            Flash::error('item not found');

            return redirect(route('inventory.transfers.index'));
        }
        return Response::json($item);

    }
    /**
     * this to print the movment
     */

    function print($id)
    {
        $movment = \App\Models\Inventory\transfer::with('Warehousefrom')->with('Warehouseto')->with('MovementDetails')->findorfail($id);
        // dd($movment->MovementDetails[0]->items->units->name);
        if (empty($movment)) {
            Flash::error('Transfer not found');
            return redirect(route('inventory.transfers.index'));
        }
        return view('inventory.transfers.print-transfer')->with('movment', $movment);
    }

    /** Display the specified transfer.
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
