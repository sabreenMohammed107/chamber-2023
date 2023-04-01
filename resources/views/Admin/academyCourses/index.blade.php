@extends('Admin.adminLayout.main')

@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> {{ __('الرئيسية') }} </a></li>
    </ol>
</nav>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>الدورات</h6>
                <a href="{{ route('academyCourses.create') }}" class="btn btn-dark"> اضافة</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>

                            <th>الصورة</th>
                            <th>الاسم عربى </th>
                            <th> الاسم انجليزى</th>
                            <th>الساعات</th>
                            <th>التكلفة</th>
                            <th>نشط</th>
                            <th></th>


                        </thead>
                        <tbody>

                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td><img src="{{ asset('uploads/academy')}}/{{ $row->image }}" alt=""></td>
                                <td>{{$row->ar_name}}</td>
                                <td>{{$row->en_name}}</td>
                                <td>{{$row->course_hourse}}</td>
                                <td>{{$row->course_cost}}</td>

                                @if($row->active == 1)
                                <td><i class="fas fa-check"></i></td>
                                @else
                                <td><i class="fas fa-times"></i></td>
                                @endif


                                <td>
                                    <a href="{{ route('academyCourses.edit',$row->id) }}" class="btn btn-info d-inline-block">تعديل</a>
                                    <a href="#" onclick="destroy('this academyCourses','{{$row->id}}')" class="btn d-inline-block btn-danger">حذف</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('academyCourses.destroy', $row->id) }}" method="POST" style="display: none;">
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
<!-- /.row -->


</div>

<!--end-->

</div>
@endsection