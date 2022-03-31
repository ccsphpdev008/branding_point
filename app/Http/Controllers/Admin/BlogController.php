<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog as MyModel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use View, DB;

class BlogController extends Controller
{
    /**
     * Validation Rules For the Incoming Request
     */
    private function getrules($id = 0){
        $table = $this->model->getTable();
        $rules = [
            'title' => 'required|unique:'.$table.',title,NULL,id,deleted_at,NULL'
        ];
        if($id != 0){
            $rules['title'] = 'required|unique:'.$table.',title,'.$id.',id,deleted_at,NULL';
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
        $this->category = new Category;
        $this->title = $this->getPascalName('Blog');
        View::share('title', $this->title);

        $this->url = Str::lower('Blog');
        View::share('url', $this->url);

        $this->link = 'admin.blog.';

        View::share('categories', $this->category->where('is_blog', true)->pluck('name', 'id'));

        $this->path = 'admin.'.$this->getSnackName('Blog').'.';
        View::share('path', $this->link);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['action'] = '<a href="#'.$this->url.'-create" data-type="'.$this->url.'" data-href="'.route($this->link.'create').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Add New '.$this->title.'</a>';
        $model = $this->model->with(['bywhom']);
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

        $data = $request->except('image');
        $data['created_by'] = auth('admin')->id();
        
        $image = $request->file('image');
        if(!is_null($image)){
            $data['image'] = $this->uploadImage($image, 'public/media/blog/image/', 'image');
        }
        
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
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(MyModel $blog)
    {
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(MyModel $blog)
    {
        if($blog->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $data['data_type'] = 'edit';
        $data['title'] = 'Edit '.$this->title;
        $data['action'] = '<a href="#'.$this->url.'" data-type="'.$this->url.'" data-href="'.route($this->link.'index').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>';
        $data['record'] = $blog;

        return view($this->path.'data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyModel $blog)
    {
        $validatedData = $request->validate($this->getrules($blog->id));

        $data = $request->except('image');
        $data = $request->all();
        $data['updated_by'] = auth('admin')->id();
        
        $image = $request->file('image');
        if(!is_null($image)){
            if($blog->image){
                unlink($blog->image);
            }
            $data['image'] = $this->uploadImage($image, 'public/media/blog/image/', 'image');
        }
        
        $record = $blog->update($data);

        $msg = $this->msg;
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Edited with id:'.$blog->id);
            return $this->index();
        }
        return json_encode($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyModel $blog)
    {
        $msg = $this->msg;
        if($blog->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $check_dep = $this->checkDependencies($this->model->dependencies(), $blog);
        if(!$check_dep['status']){
            $msg =  ['status' => 400, 'message' => config('message.delete_dependency_start').$check_dep['table'].config('message.delete_dependency_end'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $record = $blog->delete();
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Deleted with id:'.$blog->id);
            return $this->index();
        }
        return json_encode($msg);
    }
}
