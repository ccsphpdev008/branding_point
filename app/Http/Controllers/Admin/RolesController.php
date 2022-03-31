<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Roles as MyModel;
use View;

class RolesController extends Controller
{
    private function getrules($id = 0){
        $rules = [
            'name' => 'required|unique:roles,name'
        ];
        if($id != 0){
            $rules['name'] = 'required|unique:roles,name,'.$id;
        }
        return $rules;
    }

    public function __construct()
    {
        parent::__construct();

        $this->model = new MyModel;
        $this->title = 'Roles';
        View::share('title', $this->title);

        $this->url = 'roles';
        View::share('url', $this->url);

        $this->path = 'admin.roles.';
        View::share('path', $this->path);
    }

    public function index()
    {
        if(auth('admin')->user()->role_id != 1){return;}

        $action = '<a href="#'.$this->url.'-create" data-type="'.$this->url.'" data-href="'.route($this->path.'create').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Add New '.$this->title.'</a>';
        $records = $this->model->paginate(100);

        return view($this->path.'index', compact('records', 'action'));
    }

    public function create()
    {
        if(auth('admin')->user()->role_id != 1){return;}
        $data_type = 'create';
        View::share('title', 'Add New '.$this->title);
        $action = '<a href="#'.$this->url.'" data-type="'.$this->url.'" data-href="'.route($this->path.'index').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>';

        return view($this->path.'data', compact('action', 'data_type'));
    }

    public function store(Request $request)
    {
        if(auth('admin')->user()->role_id != 1){return;}
        $validatedData = $request->validate($this->getrules());

        $data = $request->all();
        $data['created_by'] = auth('admin')->id();
        $record = $this->model->create($data);

        $msg = $this->msg;
        if($record){
            
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Added with id:'.$record->id);

            return $this->index();
            // $msg =  ['status' => 200, 'message' => $this->title.config('message.add_msg'), 'type' => 'success', 'view' => $this->index()];
        }
        return json_encode($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MyModel $role)
    {
        if(auth('admin')->user()->role_id != 1){return;}
        if($role->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.edit_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $data_type = 'edit';
        View::share('title', 'Edit '.$this->title);
        $action = '<a href="#'.$this->url.'" data-type="'.$this->url.'" data-href="'.route($this->path.'index').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>';
        $record = $role;

        return view($this->path.'data', compact('action', 'record', 'data_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyModel $role)
    {
        if(auth('admin')->user()->role_id != 1){return;}
        $validatedData = $request->validate($this->getrules($role->id));

        $data = $request->all();
        $data['updated_by'] = auth('admin')->id();
        $record = $role->update($data);

        $msg = $this->msg;
        if($record){
            
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Edited with id:'.$role->id);

            return $this->index();
            // $msg =  ['status' => 200, 'message' => $this->title.config('message.update_msg'), 'type' => 'success', 'method' => 'update'];
        }
        return json_encode($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyModel $role)
    {
        if(auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        if($role->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $check_dep = $this->checkDependencies($this->model->dependencies(), $role);
        if(!$check_dep['status']){
            $msg =  ['status' => 400, 'message' => config('message.delete_dependency_start').$check_dep['table'].config('message.delete_dependency_end'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $record = $role->delete();
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Deleted with id:'.$role->id);
            return $this->index();
        }
        return json_encode($msg);
    }
}
