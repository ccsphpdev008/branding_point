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
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'details')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'category')) }}</th>
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
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'details')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'category')) }}</th>
                                <th scope="col">{{ ucwords(str_replace('_', ' ', 'position')) }}</th>
                                <th style="width: auto;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(isset($records) && count($records) > 0)
                                @foreach ($records as $key => $item)
                                    <tr class="theme-custom-text">
                                        @if(auth('admin')->user()->role_id == 1)
                                            <td>{{ $item->bywhom ? $item->bywhom->name : '' }}</td>
                                        @endif
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->details }}</td>
                                        <td>{{ $item->category->name ?? '' }}</td>
                                        <td><input type="text" data-model="{{ $item->getTable() }}" data-id="{{ $item->id }}" name="position" class="position form-control" value="{{ $item->position }}" style="width: 70px"></td>
                                        <td>
                                            <a href="#{{ $url }}-edit" data-type="{{ $url }}" data-href="{{ route($path.'edit', $item->id) }}" class="btn btn-xs btn-success waves-effect waves-light ajax-url"><i class="material-icons">mode_edit</i></a>
                                            <a href="#{{ $url }}" data-type="{{ $url }}" data-href="{{ route($path.'delete', $item->id) }}" class="btn btn-xs btn-danger waves-effect waves-light ajax-url" data-method-type="delete"><i class="material-icons">delete_forever</i></a>
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