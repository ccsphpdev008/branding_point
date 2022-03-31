<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="theme-custom-text font-bold page-title">{!! $title !!}</h2>
                <ul class="header-dropdown m-r--5">
                    {!! $action !!}
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead class="theme-custom-bg-color">
                            <tr>
                                @if(auth('admin')->user()->role_id == 1)
                                    <th scope="col">{{ ucwords(str_replace('_', ' ', 'created_by')) }}</th>
                                @endif
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'title')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'category')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'keywords')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'longitude')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'latitude')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'city')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'address')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'email')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'phone')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'website')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'backgroundimage')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'is_check')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'facebook')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'twitter')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'instagram')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'whatsapp')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'linkedin')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'remarks')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'position')) }}</th>
                                <th style="width: auto;">Action</th>
                            </tr>
                        </thead>
                        <tfoot class="theme-custom-bg-color">
                            <tr>
                                @if(auth('admin')->user()->role_id == 1)
                                    <th scope="col">{{ ucwords(str_replace('_', ' ', 'created_by')) }}</th>
                                @endif
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'title')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'category')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'keywords')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'longitude')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'latitude')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'city')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'address')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'email')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'phone')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'website')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'backgroundimage')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'is_check')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'facebook')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'twitter')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'instagram')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'whatsapp')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'linkedin')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'remarks')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'position')) }}</th>
                                <th style="width: auto;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(isset($records) && count($records) > 0)
                                @foreach ($records as $key => $item)
                                    <tr class="theme-custom-text">
                                        @if(auth('admin')->user()->role_id == 1)
                                            <td>{{ $item->bywhom->name ?? '' }}</td>
                                        @endif
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->name ?? '' }}</td>
                                        <td>{{ $item->keywords }}</td>
                                        <td>{{ $item->latitude }}</td>
                                        <td>{{ $item->longitude }}</td>
                                        <td>{{ $item->city->name ?? '' }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->website }}</td>
                                        <td>{{ $item->backgroundimage }}</td>
                                        <td>{{ $item->is_check }}</td>
                                        <td>{{ $item->fb_link }}</td>
                                        <td>{{ $item->insta_link }}</td>
                                        <td>{{ $item->wp_link }}</td>
                                        <td>{{ $item->linkedin_link }}</td>
                                        <td>{{ $item->twitter_link }}</td>
                                        <td>{{ $item->remarks }}</td>
                                        <td><input type="text" data-model="{{ $item->getTable() }}" data-id="{{ $item->id }}" name="position" class="position form-control" value="{{ $item->position }}" style="width: 70px"></td>
                                        <td>
                                            <a href="#{{ $url }}-edit" data-type="{{ $url }}" data-href="{{ route($path.'edit', $item->id) }}" class="btn btn-xs btn-success waves-effect waves-light ajax-url"><i class="material-icons">mode_edit</i></a>
                                            <a href="#{{ $url }}" data-type="{{ $url }}" data-href="{{ route($path.'delete', $item->id) }}" class="btn btn-xs btn-danger waves-effect waves-light ajax-url" data-method-type="delete"><i class="material-icons">delete_forever</i></a>
                                            <a href="#{{ $url }}-image" data-type="{{ $url }}" data-href="{{ route($path.'image', $item->id) }}" class="btn btn-xs btn-info waves-effect waves-light ajax-url"><i class="material-icons">image</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.chunk.paginate', ['records' => $records, 'url' => $url, 'path' => $path])