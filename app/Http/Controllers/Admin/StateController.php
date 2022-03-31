<?php

namespace App\Http\Controllers\Admin;

use App\Models\State as MyModel;
use App\Models\Country;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use View, DB;

class StateController extends Controller
{
    /**
     * Validation Rules For the Incoming Request
     */
    private function getrules($id = 0){
        $table = $this->model->getTable();
        $rules = [
            'name' => 'required|unique:'.$table.',name,NULL,id,deleted_at,NULL'
        ];
        if($id != 0){
            $rules['name'] = 'required|unique:'.$table.',name,'.$id.',id,deleted_at,NULL';
        }
        return $rules;
    }
    
    /**
     * Constructor Initialization
     */
    public function __construct()
    {
        parent::__construct();

        $this->model = new MyModel;
        $this->country = new Country;
        $this->title = $this->getPascalName('State');
        View::share('title', $this->title);

        $this->url = Str::lower('State');
        View::share('url', $this->url);

        $this->link = 'admin.state.';

        $this->path = 'admin.'.$this->getSnackName('State').'.';
        View::share('path', $this->link);
        
        View::share('countries', $this->country->pluck('name', 'id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['action'] = '<a href="#'.$this->url.'-create" data-type="'.$this->url.'" data-href="'.route($this->link.'create').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Add New '.$this->title.'</a>';
        $model = $this->model->with(['bywhom', 'country']);
        if(auth('admin')->user()->role_id != 1){
            $model = $model->mydata();
        }
        $data['records'] = $model->paginate(100);

        return view($this->path.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['data_type'] = 'create';
        $data['title'] = 'Add New '.$this->title;
        $data['action'] = '<a href="#'.$this->url.'" data-type="'.$this->url.'" data-href="'.route($this->link.'index').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>';

        return view($this->path.'data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->getrules());

        $data = $request->all();
        $data['created_by'] = auth('admin')->id();
        $record = $this->model->create($data);

        $msg = $this->msg;
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Added with id:'.$record->id);
            return $this->index();
        }
        return json_encode($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(MyModel $state)
    {
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(MyModel $state)
    {
        if($state->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $data['data_type'] = 'edit';
        $data['title'] = 'Edit '.$this->title;
        $data['action'] = '<a href="#'.$this->url.'" data-type="'.$this->url.'" data-href="'.route($this->link.'index').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>';
        $data['record'] = $state;

        return view($this->path.'data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyModel $state)
    {
        $validatedData = $request->validate($this->getrules($state->id));

        $data = $request->all();
        $data['updated_by'] = auth('admin')->id();
        $record = $state->update($data);

        $msg = $this->msg;
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Edited with id:'.$state->id);
            return $this->index();
        }
        return json_encode($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyModel $state)
    {
        $msg = $this->msg;
        if($state->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $check_dep = $this->checkDependencies($this->model->dependencies(), $state);
        if(!$check_dep['status']){
            $msg =  ['status' => 400, 'message' => config('message.delete_dependency_start').$check_dep['table'].config('message.delete_dependency_end'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $record = $state->delete();
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Deleted with id:'.$state->id);
            return $this->index();
        }
        return json_encode($msg);
    }
}
