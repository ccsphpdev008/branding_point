<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\UserMaster as MyModel;
use App\Models\Roles;
use View, Hash;

class UserMasterController extends Controller
{
    private function getrules($id = 0){
        $rules = [
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required|unique:user_masters,email',
            'contact' => 'required|unique:user_masters,contact',
            'password' => 'required',
        ];
        if($id != 0){
            $rules['email'] = 'required|unique:user_masters,email,'.$id;
            $rules['contact'] = 'required|unique:user_masters,contact,'.$id;
            $rules['password'] = '';
        }
        return $rules;
    }

    public function __construct()
    {
        parent::__construct();

        $this->model = new MyModel;
        $this->roles = new Roles;
        $this->title = 'Vendors';
        View::share('title', $this->title);

        $this->url = 'vendor';
        View::share('url', $this->url);

        $this->path = 'admin.user_master.';
        View::share('path', $this->path);
    }

    public function index()
    {
        if(auth('admin')->user()->role_id != 1){return;}

        $action = '<a href="#'.$this->url.'-create" data-type="'.$this->url.'" data-href="'.route($this->path.'create').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Add New '.$this->title.'</a>';
        $records = $this->model->with(['bywhom', 'role'])->paginate(100);

        return view($this->path.'index', compact('records', 'action'));
    }

    public function create()
    {
        if(auth('admin')->user()->role_id != 1){return;}
        $data_type = 'create';
        View::share('title', 'Add New '.$this->title);
        $action = '<a href="#'.$this->url.'" data-type="'.$this->url.'" data-href="'.route($this->path.'index').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>';

        View::share('roles', $this->roles->pluck('name', 'id'));
        return view($this->path.'data', compact('action', 'data_type'));
    }

    public function store(Request $request)
    {
        if(auth('admin')->user()->role_id != 1){return;}
        $validatedData = $request->validate($this->getrules());

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['created_by'] = auth('admin')->id();

        $business_logo = $request->file('business_logo');
        if(!is_null($business_logo)){
            $data['business_logo'] = $this->uploadImage($business_logo, 'public/media/user/business/'.auth('admin')->id().'/logo/', 'business_logo');
        }

        $pdf_bg_logo = $request->file('pdf_bg_logo');
        if(!is_null($pdf_bg_logo)){
            $data['pdf_bg_logo'] = $this->uploadImage($pdf_bg_logo, 'public/media/user/business/'.auth('admin')->id().'/logo/', 'pdf_bg_logo');
        }

        $record = $this->model->create($data);

        $msg = $this->msg;
        if($record){
            
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Added with id:'.$record->id);

            return $this->index();
            // $msg =  ['status' => 200, 'message' => $this->title.config('message.add_msg'), 'type' => 'success'];
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
    public function edit(MyModel $user_master)
    {
        if(auth('admin')->user()->role_id != 1){return;}
        if($user_master->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.edit_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $data_type = 'edit';
        View::share('title', 'Edit '.$this->title);
        $action = '<a href="#'.$this->url.'" data-type="'.$this->url.'" data-href="'.route($this->path.'index').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>';
        $record = $user_master;

        View::share('roles', $this->roles->pluck('name', 'id'));
        return view($this->path.'data', compact('action', 'record', 'data_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyModel $user_master)
    {
        if(auth('admin')->user()->role_id != 1){return;}
        $validatedData = $request->validate($this->getrules($user_master->id));

        $data = $request->except('password', 'change_password', 'business_logo', 'pdf_bg_logo');
        $data['updated_by'] = auth('admin')->id();

        $business_logo = $request->file('business_logo');
        if(!is_null($business_logo)){
            if($user_master->business_logo){
                unlink($user_master->business_logo);
            }
            $data['business_logo'] = $this->uploadImage($business_logo, 'public/media/user/business/'.auth('admin')->id().'/logo/', 'business_logo');
        }

        $pdf_bg_logo = $request->file('pdf_bg_logo');
        if(!is_null($pdf_bg_logo)){
            if($user_master->pdf_bg_logo){
                unlink($user_master->pdf_bg_logo);
            }
            $data['pdf_bg_logo'] = $this->uploadImage($pdf_bg_logo, 'public/media/user/business/'.auth('admin')->id().'/logo/', 'pdf_bg_logo');
        }

        if($request->change_password){
            $data['password'] = Hash::make($request->password);
        }
        $record = $user_master->update($data);

        $msg = $this->msg;
        if($record){
            
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Edited with id:'.$user_master->id);

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
    public function destroy(MyModel $user_master)
    {
        if(auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        if($user_master->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $check_dep = $this->checkDependencies($this->model->dependencies(), $user_master);
        if(!$check_dep['status']){
            $msg =  ['status' => 400, 'message' => config('message.delete_dependency_start').$check_dep['table'].config('message.delete_dependency_end'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        if($user_master->business_logo){
            if(file_exists($user_master->business_logo)){
                unlink($user_master->business_logo);
            }
        }
        if($user_master->pdf_bg_logo){
            if(file_exists($user_master->pdf_bg_logo)){
                unlink($user_master->pdf_bg_logo);
            }
        }
        $record = $user_master->delete();
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Deleted with id:'.$user_master->id);
            return $this->index();
        }
        return json_encode($msg);
    }
}
