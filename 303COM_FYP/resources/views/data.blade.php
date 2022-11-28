@php $data = array(); @endphp
@foreach ($result as $row)
@php     $data[] = $row; @endphp
@endforeach

@php print json_encode($data); @endphp