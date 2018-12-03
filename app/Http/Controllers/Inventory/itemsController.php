<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Requests\Inventory\CreateitemsRequest;
use App\Http\Requests\Inventory\UpdateitemsRequest;
use App\Repositories\Inventory\itemsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use \App\Models\Inventory\categories ;
use \App\Models\Inventory\units;
class itemsController extends AppBaseController
{
    /** @var  itemsRepository */
    private $itemsRepository;

    public function __construct(itemsRepository $itemsRepo)
    {
        $this->itemsRepository = $itemsRepo;
    }

    /**
     * Display a listing of the items.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->itemsRepository->pushCriteria(new RequestCriteria($request));
        $items = $this->itemsRepository->paginate(10);

        return view('inventory.items.index')
            ->with('items', $items);
    }

    /**
     * Show the form for creating a new items.
     *
     * @return Response
     */
    public function create()
    {
        $categories = categories::pluck('name', 'id');
        $units= units::pluck('name','id');
        return view('inventory.items.create')->with('categories', $categories)->with('units', $units);
    }

    /**
     * Store a newly created items in storage.
     *
     * @param CreateitemsRequest $request
     *
     * @return Response
     */
    public function store(CreateitemsRequest $request)
    {
        $input = $request->all();

        $items = $this->itemsRepository->create($input);

        Flash::success('Items saved successfully.');

        return redirect(route('inventory.items.index'));
    }

    /**
     * Display the specified items.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $items = $this->itemsRepository->findWithoutFail($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('inventory.items.index'));
        }

        return view('inventory.items.show')->with('items', $items);
    }

    /**
     * Show the form for editing the specified items.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $items = $this->itemsRepository->findWithoutFail($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('inventory.items.index'));
        }

        return view('inventory.items.edit')->with('items', $items);
    }

    /**
     * Update the specified items in storage.
     *
     * @param  int              $id
     * @param UpdateitemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateitemsRequest $request)
    {
        $items = $this->itemsRepository->findWithoutFail($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('inventory.items.index'));
        }

        $items = $this->itemsRepository->update($request->all(), $id);

        Flash::success('Items updated successfully.');

        return redirect(route('inventory.items.index'));
    }

    /**
     * Remove the specified items from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $items = $this->itemsRepository->findWithoutFail($id);

        if (empty($items)) {
            Flash::error('Items not found');

            return redirect(route('inventory.items.index'));
        }

        $this->itemsRepository->delete($id);

        Flash::success('Items deleted successfully.');

        return redirect(route('inventory.items.index'));
    }
}
