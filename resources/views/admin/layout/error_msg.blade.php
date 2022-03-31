@php
    $arr = ['success', 'danger', 'warning', 'info'];
@endphp
@foreach($arr as $item)
    @if(session()->has($item))
        <div class="alert 5stime alert-{{ $item }}">{{ session()->get($item) }}</div>
    @endif
@endforeach
