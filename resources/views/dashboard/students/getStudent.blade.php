
@php $i=0; @endphp
@foreach($data as $data)
  @php $i++; @endphp
<tr>
  <td>{{ $i }}</td>
  <td>{{ $data->name }}</td>
  @if ($data->avatar)
    <td><img src="{{ asset($data->avatar) }}" width="70px" height="70px" alt=""></td>
      @else
      <td><img src="{{ asset('images/login/logo.svg') }}" width="70px" height="70px" alt=""></td>
  @endif
  <td>{{ $data->school->name ??  'نا مشخص'  }}</td>
  <td>
   <div class="d-flex align-items-center justify-space-around">


    <button class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $data->id }}">حذف</button>


    
    <a class="mr-1"  href="{{ route('dashboard.students.edit', ['student'=>$data->id]) }}">
      <button class="btn btn-outline-primary btn-sm">ویرایش</button>
      
    </a>
    
    <a class="mr-1"  href="{{ route('dashboard.students.show', ['student'=>$data->id]) }}">
      <button class="btn btn-outline-success btn-sm">مشاهده</button>
      
    </a>
  </div>
  </td>
</tr>
@endforeach

