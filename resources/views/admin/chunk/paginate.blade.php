@if($records->hasPages())
    <div class="mypagination theme-custom-text">
        <u class="m-r-20">Showing {{ $records->firstItem() }} - {{ $records->lastItem() }} Out of {{ $records->total() }} Records</u>

        @if($records->currentPage() > 1)
            <a href="#{{ $url }}-1" data-type="{{ $url }}" data-href="{{ route($path.'index') }}?page=1" class="ajax-url mylink m-r-10" title="Goto To First Page"><i class="material-icons">skip_previous</i></a>
            <a href="#{{ $url }}-{{ $records->currentPage()-1 }}" data-type="{{ $url }}" data-href="{{ route($path.'index') }}?page={{ $records->currentPage()-1 }}" class="ajax-url mylink" title="Load Previous 50 Records"><i class="material-icons">keyboard_arrow_left</i></a>
        @endif
        @if($records->hasMorePages() && $records->currentPage() != $records->lastPage())
            <a href="#{{ $url }}-{{ $records->currentPage()+1 }}" data-type="{{ $url }}" data-href="{{ route($path.'index') }}?page={{ $records->currentPage()+1 }}" class="ajax-url mylink" title="Load Next 50 Records"><i class="material-icons">keyboard_arrow_right</i></a>
            <a href="#{{ $url }}-{{ $records->lastPage() }}" data-type="{{ $url }}" data-href="{{ route($path.'index') }}?page={{ $records->lastPage() }}" class="ajax-url mylink m-l-10" title="Goto To Last Page"><i class="material-icons">skip_next</i></a>
        @endif
    </div>
@endif