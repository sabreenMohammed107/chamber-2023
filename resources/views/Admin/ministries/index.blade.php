@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i>الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page"> الإدارات والوزارات </li>
    </ol>
</nav>

@endsection

@section('content')

<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>الإدارات والوزارات</h6>
                <a href="{{route('ministries.create') }}" class="btn btn-dark">إضافة</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>
                            <th>المسمى إنجليزى</th>
                            <th>المسمى عربي</th>
                            <th>الهاتف </th>
                            <th>البريد الإلكترونى</th>
                            <th>موقع الإنترنت </th>
                           
                            <th>نوع الجهة</th>
                           
                            <th>اسم الرئيس عربي</th>
                            <th>اسم الرئيس إنجليزى</th>
                            <th>الترتيب</th>

                            <th></th>



                        </thead>
                        <tbody>

                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>

                                <td>{{$row->ar_name}}</td>
                                <td>{{$row->en_name}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->website}}</td>
                              
                                <td>
                                    @if($row->type)
                                    {{$row->type->ar_type}}
                                    @endif
                                </td>
                                <td>{{$row->manager_ar_name}}</td>
                                <td>{{$row->manager_en_name}}</td>
                                <td>{{$row->order}}</td>


                                <td>
                                    <a href="{{ route('ministries.edit',$row->id) }}" class="btn btn-info d-inline-block">تعديل</a>
                                    <a href="#" onclick="destroy('this ministries','{{$row->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('ministries.destroy', $row->id) }}" method="POST" style="display: none;">
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