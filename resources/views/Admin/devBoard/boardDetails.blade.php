@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page">إجتماعات المجلس </li>
    </ol>
</nav>

@endsection

@section('content')
<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>{{$row->ar_title}}</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addnumber"> إضافة </a>
            </div>
            <div class="ms-panel-body">

                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>


                            <th>اسم الرئيس إنجليزى</th>
                            <th>اسم الرئيس عربي</th>
                            <th>من سنة</th>
                            <th>إلى سنة</th>

                            <th></th>


                        </thead>
                        <tbody>
                            @foreach($boards as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->manager_en_name}}</td>
                                <td>{{$row->manager_ar_name}}</td>
                                <td>
                                    @if($row->from_date)
                                <?php $date = date_create($row->from_date) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                    @endif
                                  
                                </td>
                                <td>
                                @if($row->to_date)
                                <?php $date = date_create($row->to_date) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                    @endif
                                   
                                </td>

                                <td>
                                    <a href="{{ route('editAdminDevBoard',$row->id) }}" class="btn btn-info d-inline-block">تعديل</a>
                                    <a href="#" onclick="destroy('this News','{{$row->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('devBoard.destroy', $row->id) }}" method="POST" style="display: none;">

                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="department_id" value="{{$row->id}}">
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
    <div class="input-group d-flex justify-content-end text-center">
        <a href="{{ route('devBoard.index') }}" style="float: right;margin-right: 50px;margin-bottom: 20px" class="btn btn-danger "> إلغاء</a>

    </div>

</div>





</div>
<!-- HERE -->

</div>


<!-- Add SubCat Modal -->
<div class="modal fade" id="addnumber" tabindex="-1" role="dialog" aria-labelledby="addnumber">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

            </button>
            <h3>إضافة </h3>

            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{route('devBoard.store')}}" method="POST">
                            @csrf



                            <div class="ms-auth-container row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="department_id" value="{{$row->id}}">
                                        <label class="exampleInputPassword1" for="exampleCheck1">من سنة </label>

                                        <input class="form-control" for="exampleCheck1" data-date-format="dd/mm/yyyy" name="from_date" type="date" id="datepicker">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">إلى سنة</label>

                                        <input class="form-control" for="exampleCheck1" data-date-format="dd/mm/yyyy" name="to_date" type="date" id="datepicker">


                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">اسم الرئيس إنجليزى</label>
                                        <input type="text" name="manager_en_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">اسم الرئيس عربي</label>
                                        <input type="text" name="manager_ar_name" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <!-- <div class="custom-control custom-checkbox">

                                        <input type="checkbox" id="partener" name="current" checked>

                                        <label for="category">Current</label>
                                    </div> -->
                                    <div class="form-group">
                                    <select id="current" name="current" class="form-control">
                                        <option value="" >اختر...</option>
                                        <option value="0">الحالى</option>
                                        <option value="1">السابق</option>
                                        <option value="2">قديما</option>
                                    </select>
                                    </div>
                                </div>



                                <div class="input-group d-flex justify-content-end text-center">
                                    <input type="button" value="الغاء" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                    <input type="submit" value="حفظ" class="btn btn-success ">
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Add Sub Modal -->

@endsection