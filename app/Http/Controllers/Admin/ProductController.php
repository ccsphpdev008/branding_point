<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product as MyModel;
use App\Models\City;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use View, DB;

class ProductController extends Controller
{
    /**
     * Validation Rules For the Incoming Request
     */
    private function getrules($id = 0){
        $table = $this->model->getTable();
        $rules = [
            // 'name' => 'required|unique:'.$table.',name,NULL,id,deleted_at,NULL'
        ];
        if($id != 0){
            // $rules['name'] = 'required|unique:'.$table.',name,'.$id.',id,deleted_at,NULL';
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
        $this->city = new City;
        $this->category = new Category;
        $this->title = $this->getPascalName('Product');
        View::share('title', $this->title);

        $this->url = Str::lower('Product');
        View::share('url', $this->url);

        $this->link = 'admin.product.';

        $this->path = 'admin.'.$this->getSnackName('Product').'.';
        View::share('path', $this->link);

        View::share('categories', $this->category->where('is_blog', false)->pluck('name', 'id'));
        View::share('cities', $this->city->pluck('name', 'id'));
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

        $data = $request->except('backgroundimage');
        $data['created_by'] = auth('admin')->id();
        $data['is_check'] = $request->has('is_check') ? true : false;

        $backgroundimage = $request->file('backgroundimage');
        if(!is_null($backgroundimage)){
            $data['backgroundimage'] = $this->uploadImage($backgroundimage, 'public/media/product/background-image/', 'backgroundimage');
        }

        $record = $this->model->create($data);

        $msg = $this->msg;
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Added with id:'.$record->id);
            return $this->index();
        }
        return json_encode($msg);
    }

    public function customImage($id)
    {
        $data = [];
        $data['data_type'] = 'create';
        $data['title'] = 'Add New '.$this->title.' (450x450)';
        $data['images'] = $this->images->where('model_name', $this->model->getTable())->where('ref_id', $id)->pluck('image', 'id');
        $data['action'] = '<a href="#'.$this->url.'" data-type="'.$this->url.'" data-href="'.route($this->path.'index').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>';
        $data['id'] = $id;

        return view('admin.add_image_view', $data);
    }

    public function customImageSave(Request $request, MyModel $product)
    {
        $data = [];
        $photo = $request->file('photo');
        if ($product && ! is_null($photo)) {
            $data['ref_id'] = $product->id;
            $data['model_name'] = $this->model->getTable();
            $data['image'] = $this->uploadImageSize($photo, 'public/media/product/photo/', 'photo', 450, 300);
            $record = $this->images->create($data);

            if ($record) {
                $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Image Added with id:'.$product->id);
                return $this->customImage($product->id);
            }
        }
        return json_encode($this->msg);
    }

    public function customImageDelete(Images $image)
    {
        $msg = $this->msg;
        if ($image) {
            if (file_exists($image->image)) {
                unlink($image->image);
            }
            $image->delete();
            $msg = ['status' => 200, 'message' => 'Image Removed Successfully...', 'type' => 'success'];

            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Image Removed with id:'.$image->id);
        }
        return json_encode($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(MyModel $product)
    {
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(MyModel $product)
    {
        if($product->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $data['data_type'] = 'edit';
        $data['title'] = 'Edit '.$this->title;
        $data['action'] = '<a href="#'.$this->url.'" data-type="'.$this->url.'" data-href="'.route($this->link.'index').'" class="ajax-url btn btn-md btn-theme waves-effect waves-light">Back</a>';
        $data['record'] = $product;

        return view($this->path.'data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyModel $product)
    {
        $validatedData = $request->validate($this->getrules($product->id));

        $data = $request->except('backgroundimage');
        $data['updated_by'] = auth('admin')->id();
        $data['is_check'] = $request->has('is_check') ? true : false;

        $backgroundimage = $request->file('backgroundimage');
        if(!is_null($backgroundimage)){
            if($product->backgroundimage){
                unlink($product->backgroundimage);
            }
            $data['backgroundimage'] = $this->uploadImage($backgroundimage, 'public/media/product/background-image/', 'backgroundimage');
        }

        $record = $product->update($data);

        $msg = $this->msg;
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Edited with id:'.$product->id);
            return $this->index();
        }
        return json_encode($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyModel $product)
    {
        $msg = $this->msg;
        if($product->created_by != auth('admin')->id() && auth('admin')->user()->role_id != 1){
            $msg =  ['status' => 400, 'message' => config('message.delete_not_auth'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $check_dep = $this->checkDependencies($this->model->dependencies(), $product);
        if(!$check_dep['status']){
            $msg =  ['status' => 400, 'message' => config('message.delete_dependency_start').$check_dep['table'].config('message.delete_dependency_end'), 'type' => 'warning', 'method' => 'delete'];
            return json_encode($msg);
        }
        $record = $product->delete();
        if($record){
            $this->logEntry(auth('admin')->user(), 'The '.$this->title.' Deleted with id:'.$product->id);
            return $this->index();
        }
        return json_encode($msg);
    }
}
