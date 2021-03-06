<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Requests\Inventory\CreatecategoriesRequest;
use App\Http\Requests\Inventory\UpdatecategoriesRequest;
use App\Repositories\Inventory\categoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class categoriesController extends AppBaseController
{
    /** @var  categoriesRepository */
    private $categoriesRepository;

    public function __construct(categoriesRepository $categoriesRepo)
    {
        $this->categoriesRepository = $categoriesRepo;
    }

    /**
     * Display a listing of the categories.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoriesRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoriesRepository->paginate(10);

        return view('inventory.categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new categories.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.categories.create');
    }

    /**
     * Store a newly created categories in storage.
     *
     * @param CreatecategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoriesRequest $request)
    {
        $input = $request->all();

        $categories = $this->categoriesRepository->create($input);

        Flash::success('Categories saved successfully.');

        return redirect(route('inventory.categories.index'));
    }

    /**
     * Display the specified categories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categories = $this->categoriesRepository->findWithoutFail($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('inventory.categories.index'));
        }

        return view('inventory.categories.show')->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified categories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->categoriesRepository->findWithoutFail($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('inventory.categories.index'));
        }

        return view('inventory.categories.edit')->with('categories', $categories);
    }

    /**
     * Update the specified categories in storage.
     *
     * @param  int              $id
     * @param UpdatecategoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoriesRequest $request)
    {
        $categories = $this->categoriesRepository->findWithoutFail($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('inventory.categories.index'));
        }

        $categories = $this->categoriesRepository->update($request->all(), $id);

        Flash::success('Categories updated successfully.');

        return redirect(route('inventory.categories.index'));
    }

    /**
     * Remove the specified categories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categories = $this->categoriesRepository->findWithoutFail($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('inventory.categories.index'));
        }

        $this->categoriesRepository->delete($id);

        Flash::success('Categories deleted successfully.');

        return redirect(route('inventory.categories.index'));
    }
}
