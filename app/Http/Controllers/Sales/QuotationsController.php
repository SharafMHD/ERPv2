<?php

namespace App\Http\Controllers\Sales;

use App\Http\Requests\Sales\CreateQuotationsRequest;
use App\Http\Requests\Sales\UpdateQuotationsRequest;
use App\Repositories\Sales\QuotationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Sales\Customers;
use App\Models\Inventory\items;
use App\Models\Inventory\StockDetails;

class QuotationsController extends AppBaseController
{
    /** @var  QuotationsRepository */
    private $quotationsRepository;

    public function __construct(QuotationsRepository $quotationsRepo)
    {
        $this->quotationsRepository = $quotationsRepo;
    }

    /**
     * Display a listing of the Quotations.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->quotationsRepository->pushCriteria(new RequestCriteria($request));
        $quotations = $this->quotationsRepository->all();

        return view('sales.quotations.index')
            ->with('quotations', $quotations);
    }
    /**
     * Get Qty
     */
    public function getqty($id)
    {
        $item = StockDetails::where('item_id',$id)->get();

        if (empty($item)) {
            Flash::error('item not found');

            return redirect(route('inventory.transfers.index'));
        }
        return Response::json($item);

    }
    /**
     * Get items
     */
    public function getItems(Request $request)
    {
          $items = items::select("name","id")
                    ->get();;
      //  dd($items);
        // if (empty($item)) {
        //     Flash::error('item not found');
        //
        //     return redirect(route('inventory.items.index'));
        // }
        return Response::json($items);
    }
    /**
     * Show the form for creating a new Quotations.
     *
     * @return Response
     */
    public function create()
    {
        $customers = Customers::pluck('name', 'id');

        return view('sales.quotations.create') ->with('customers', $customers);
    }

    /**
     * Store a newly created Quotations in storage.
     *
     * @param CreateQuotationsRequest $request
     *
     * @return Response
     */
    public function store(CreateQuotationsRequest $request)
    {
        $input = $request->all();

        $quotations = $this->quotationsRepository->create($input);

        Flash::success('Quotations saved successfully.');

        return redirect(route('sales.quotations.index'));
    }

    /**
     * Display the specified Quotations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quotations = $this->quotationsRepository->findWithoutFail($id);

        if (empty($quotations)) {
            Flash::error('Quotations not found');

            return redirect(route('sales.quotations.index'));
        }

        return view('sales.quotations.show')->with('quotations', $quotations);
    }

    /**
     * Show the form for editing the specified Quotations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quotations = $this->quotationsRepository->findWithoutFail($id);

        if (empty($quotations)) {
            Flash::error('Quotations not found');

            return redirect(route('sales.quotations.index'));
        }

        return view('sales.quotations.edit')->with('quotations', $quotations);
    }

    /**
     * Update the specified Quotations in storage.
     *
     * @param  int              $id
     * @param UpdateQuotationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuotationsRequest $request)
    {
        $quotations = $this->quotationsRepository->findWithoutFail($id);

        if (empty($quotations)) {
            Flash::error('Quotations not found');

            return redirect(route('sales.quotations.index'));
        }

        $quotations = $this->quotationsRepository->update($request->all(), $id);

        Flash::success('Quotations updated successfully.');

        return redirect(route('sales.quotations.index'));
    }

    /**
     * Remove the specified Quotations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quotations = $this->quotationsRepository->findWithoutFail($id);

        if (empty($quotations)) {
            Flash::error('Quotations not found');

            return redirect(route('sales.quotations.index'));
        }

        $this->quotationsRepository->delete($id);

        Flash::success('Quotations deleted successfully.');

        return redirect(route('sales.quotations.index'));
    }
}
