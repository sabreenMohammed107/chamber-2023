@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page"> بيانات الدول </li>
    </ol>
</nav>

@endsection

@section('content')

<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>بيانات الدول</h6>
                <a href="{{route('countries-data.create') }}" class="btn btn-dark"> add </a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>

                            <th>الإسم إنجليزى</th>
                            <th>الإسم عربي</th>
                            <th>الملف إنجليزى </th>
                            <th>الملف عربي </th>
                            <th>علم الدولة </th>
                            <th>المنطقة</th>
                          
                            <th></th>



                        </thead>
                        <tbody>

                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->en_name}}</td>
                                <td>{{$row->ar_name}}</td>
                                <td>{{$row->en_file}}</td>
                                <td> {{$row->ar_file}}</td>
                                <td><img src="{{ asset('uploads/encyclo')}}/{{ $row->flag }}" alt=""></td>
                                <td>
                                @if($row->type)    
                                {{$row->type->ar_name}}
                                @endif
                            </td>

                               



                                <td>
                                    <a href="{{ route('countries-data.edit',$row->id) }}" class="btn btn-info d-inline-block">تعديل</a>
                                    <a href="#" onclick="destroy('this countries-data','{{$row->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('countries-data.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>





</div>
</div>
</div>
</div>
</div>
<hr>

</div>
</div>



@endsection
@section('scripts')

@endsection