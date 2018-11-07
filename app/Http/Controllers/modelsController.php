<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemodelsRequest;
use App\Http\Requests\UpdatemodelsRequest;
use App\Repositories\modelsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models as db;

class modelsController extends AppBaseController
{
    /** @var  modelsRepository */
    private $modelsRepository;

    public function __construct(modelsRepository $modelsRepo)
    {
        $this->modelsRepository = $modelsRepo;
    }

    /**
     * Display a listing of the models.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modelsRepository->pushCriteria(new RequestCriteria($request));
        $models = $this->modelsRepository->all();

        return view('models.index')
            ->with('models', $models);
    }

    /**
     * Show the form for creating a new models.
     *
     * @return Response
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created models in storage.
     *
     * @param CreatemodelsRequest $request
     *
     * @return Response
     */
    public function store(CreatemodelsRequest $request)
    {
        $input = $request->all();
        //check if model name exist
        if (db\models::where('name',$input['name'])->first()) {
            Flash::error('Model alrady exist.');
            return view('models.create')->with('models', $input);
        }
        

        $models = $this->modelsRepository->create($input);
        //if crud requirde
      if ($input['crud']==true) {
         //dd($models['id']);

         $arr=['index','create','edit','delete','show'];
        foreach ($arr as $key => $value)
          {
            $index =new db\actions;
            $index->name=$value;
            $index->label=$value;
            $index->model=$models['id'];
            $index->save();
            }

        }
        Flash::success('Models saved successfully.');

        return redirect(route('models.index'));
    }


    /**
     * Display the specified models.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $models = $this->modelsRepository->findWithoutFail($id);

        if (empty($models)) {
            Flash::error('Models not found');

            return redirect(route('models.index'));
        }

        return view('models.show')->with('models', $models);
    }

    /**
     * Show the form for editing the specified models.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $models = $this->modelsRepository->findWithoutFail($id);

        if (empty($models)) {
            Flash::error('Models not found');

            return redirect(route('models.index'));
        }

        return view('models.edit')->with('models', $models);
    }

    /**
     * Update the specified models in storage.
     *
     * @param  int              $id
     * @param UpdatemodelsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemodelsRequest $request)
    {
        $models = $this->modelsRepository->findWithoutFail($id);

        if (empty($models)) {
            Flash::error('Models not found');

            return redirect(route('models.index'));
        }

        $models = $this->modelsRepository->update($request->all(), $id);

        Flash::success('Models updated successfully.');

        return redirect(route('models.index'));
    }

    /**
     * Remove the specified models from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $models = $this->modelsRepository->findWithoutFail($id);

        if (empty($models)) {
            Flash::error('Models not found');

            return redirect(route('models.index'));
        }

        $this->modelsRepository->delete($id);

        Flash::success('Models deleted successfully.');

        return redirect(route('models.index'));
    }
}
