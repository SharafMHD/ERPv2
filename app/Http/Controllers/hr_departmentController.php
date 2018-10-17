<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createhr_departmentRequest;
use App\Http\Requests\Updatehr_departmentRequest;
use App\Repositories\hr_departmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class hr_departmentController extends AppBaseController
{
    /** @var  hr_departmentRepository */
    private $hrDepartmentRepository;

    public function __construct(hr_departmentRepository $hrDepartmentRepo)
    {
        $this->hrDepartmentRepository = $hrDepartmentRepo;
    }

    /**
     * Display a listing of the hr_department.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hrDepartmentRepository->pushCriteria(new RequestCriteria($request));
        $hrDepartments = $this->hrDepartmentRepository->paginate(10);

        return view('hr_departments.index')
            ->with('hrDepartments', $hrDepartments);
    }

    /**
     * Show the form for creating a new hr_department.
     *
     * @return Response
     */
    public function create()
    {
        return view('hr_departments.create');
    }

    /**
     * Store a newly created hr_department in storage.
     *
     * @param Createhr_departmentRequest $request
     *
     * @return Response
     */
    public function store(Createhr_departmentRequest $request)
    {
        $input = $request->all();

        $hrDepartment = $this->hrDepartmentRepository->create($input);

        Flash::success('Hr Department saved successfully.');

        return redirect(route('hrDepartments.index'));
    }

    /**
     * Display the specified hr_department.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hrDepartment = $this->hrDepartmentRepository->findWithoutFail($id);

        if (empty($hrDepartment)) {
            Flash::error('Hr Department not found');

            return redirect(route('hrDepartments.index'));
        }

        return view('hr_departments.show')->with('hrDepartment', $hrDepartment);
    }

    /**
     * Show the form for editing the specified hr_department.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hrDepartment = $this->hrDepartmentRepository->findWithoutFail($id);

        if (empty($hrDepartment)) {
            Flash::error('Hr Department not found');

            return redirect(route('hrDepartments.index'));
        }

        return view('hr_departments.edit')->with('hrDepartment', $hrDepartment);
    }

    /**
     * Update the specified hr_department in storage.
     *
     * @param  int              $id
     * @param Updatehr_departmentRequest $request
     *
     * @return Response
     */
    public function update($id, Updatehr_departmentRequest $request)
    {
        $hrDepartment = $this->hrDepartmentRepository->findWithoutFail($id);

        if (empty($hrDepartment)) {
            Flash::error('Hr Department not found');

            return redirect(route('hrDepartments.index'));
        }

        $hrDepartment = $this->hrDepartmentRepository->update($request->all(), $id);

        Flash::success('Hr Department updated successfully.');

        return redirect(route('hrDepartments.index'));
    }

    /**
     * Remove the specified hr_department from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hrDepartment = $this->hrDepartmentRepository->findWithoutFail($id);

        if (empty($hrDepartment)) {
            Flash::error('Hr Department not found');

            return redirect(route('hrDepartments.index'));
        }

        $this->hrDepartmentRepository->delete($id);

        Flash::success('Hr Department deleted successfully.');

        return redirect(route('hrDepartments.index'));
    }
}
