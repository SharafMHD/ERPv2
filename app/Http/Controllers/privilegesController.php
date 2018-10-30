<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateprivilegesRequest;
use App\Http\Requests\UpdateprivilegesRequest;
use App\Repositories\privilegesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class privilegesController extends AppBaseController
{
    /** @var  privilegesRepository */
    private $privilegesRepository;

    public function __construct(privilegesRepository $privilegesRepo)
    {
        $this->privilegesRepository = $privilegesRepo;
    }

    /**
     * Display a listing of the privileges.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->privilegesRepository->pushCriteria(new RequestCriteria($request));
        $privileges = $this->privilegesRepository->all();

        return view('privileges.index')
            ->with('privileges', $privileges);
    }

    /**
     * Show the form for creating a new privileges.
     *
     * @return Response
     */
    public function create()
    {
        return view('privileges.create');
    }

    /**
     * Store a newly created privileges in storage.
     *
     * @param CreateprivilegesRequest $request
     *
     * @return Response
     */
    public function store(CreateprivilegesRequest $request)
    {
        $input = $request->all();

        $privileges = $this->privilegesRepository->create($input);

        Flash::success('Privileges saved successfully.');

        return redirect(route('privileges.index'));
    }

    /**
     * Display the specified privileges.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $privileges = $this->privilegesRepository->findWithoutFail($id);

        if (empty($privileges)) {
            Flash::error('Privileges not found');

            return redirect(route('privileges.index'));
        }

        return view('privileges.show')->with('privileges', $privileges);
    }

    /**
     * Show the form for editing the specified privileges.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $privileges = $this->privilegesRepository->findWithoutFail($id);

        if (empty($privileges)) {
            Flash::error('Privileges not found');

            return redirect(route('privileges.index'));
        }

        return view('privileges.edit')->with('privileges', $privileges);
    }

    /**
     * Update the specified privileges in storage.
     *
     * @param  int              $id
     * @param UpdateprivilegesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprivilegesRequest $request)
    {
        $privileges = $this->privilegesRepository->findWithoutFail($id);

        if (empty($privileges)) {
            Flash::error('Privileges not found');

            return redirect(route('privileges.index'));
        }

        $privileges = $this->privilegesRepository->update($request->all(), $id);

        Flash::success('Privileges updated successfully.');

        return redirect(route('privileges.index'));
    }

    /**
     * Remove the specified privileges from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $privileges = $this->privilegesRepository->findWithoutFail($id);

        if (empty($privileges)) {
            Flash::error('Privileges not found');

            return redirect(route('privileges.index'));
        }

        $this->privilegesRepository->delete($id);

        Flash::success('Privileges deleted successfully.');

        return redirect(route('privileges.index'));
    }
}
