@php
    $arr = [];
    foreach (explode(',', $record) as $rec){
        if(isset($array[$rec])){
            array_push($arr, $array[$rec]);
        }
    }
    echo implode(', ', $arr);
@endphp