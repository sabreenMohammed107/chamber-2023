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
                <h6> شعبة - {{$devisionrow->ar_title}} </h6>

            </div>
            <div class="ms-panel-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('devBoard.update',$row->id)}}" method="POST">

                            {{ csrf_field() }}

                            @method('PUT')
                            <div class="ms-auth-container row">
                                <input type="hidden" name="department_id" value="{{$devisionrow->id}}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">من سنة</label>
                                        <?php $date = date_create($row->from_date) ?>
                                        <input style="height: 40px; border-radius: 5px;" class="col-md-12 exampleInputPassword1" for="exampleCheck1" data-date-format="dd/mm/yyyy" name="from_date" type="date" id="datepicker" value="{{ date_format($date,'Y-m-d') }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">إلى سنة</label>
                                        <?php $dateTo = date_create($row->to_date) ?>
                                        <input style="height: 40px; border-radius: 5px;" class="col-md-12 exampleInputPassword1" for="exampleCheck1" data-date-format="dd/mm/yyyy" name="to_date" type="date" id="datepicker" value="{{ date_format($dateTo,'Y-m-d') }}">


                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">اسم الرئيس إنجليزى</label>
                                        <input type="text" name="manager_en_name" value="{{$row->manager_en_name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">اسم الرئيس عربي</label>
                                        <input type="text" name="manager_ar_name" value="{{$row->manager_ar_name}}" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-6">

                                    <div class="form-group">
                                        <select id="current" name="current" class="form-control">
                                            <option value="">
                                                @if($row->current == 0)
                                                Current
                                                @endif
                                                @if($row->current == 1)
                                                Previous
                                                @endif
                                                @if($row->current == 2)
                                                old
                                                @endif

                                            </option>
                                            <option value="0">الحالى</option>
                                            <option value="1">السابق</option>
                                            <option value="2">قديما</option>
                                        </select>
                                    </div>

                                </div>



                                <div class="input-group d-flex justify-content-end text-center">
                                    <a href="{{ route('devBoard.edit',$devisionrow->id) }}" class="btn btn-dark mx-2"> الغاء</a>
                                    <input type="submit" value="حفظ" class="btn btn-success ">
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- add category -->


    <div class="tabbable-panel">
        <div class="tabbable-line">
            <ul class="nav nav-tabs " role="tablist">

                <li class="btn btn-light test">
                    <a href="#tab_default_1" class="active" data-toggle="tab" role="tab">
                        عضو المجلس </a>
                </li>



            </ul>
            <div class="tab-content test ">
                <div class="tab-pane active" id="tab_default_1">
                    <!-- Add Category -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#add-news-gallery">اضافة عضو للمجلس </button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th scope="col">صورة</th>
                                                    <th scope="col">الإسم إنجليزى</th>
                                                    <th scope="col">الإسم عربي</th>
                                                    <th scope="col">المركز إنجليزى</th>
                                                    <th scope="col">المركز عربي</th>

                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($members as $index => $member)
                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td><img src="{{ asset('uploads/people')}}/{{ $member->image }}" alt=""></td>
                                                    <td>{{$member->en_name}}</td>
                                                    <td>{{$member->ar_name}}</td>
                                                    <td>{{$member->en_position}}</td>
                                                    <td>{{$member->ar_position}}</td>



                                                    <td>
                                                        <a href="#add-news-gallery{{$member->id}}" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#add-news-gallery{{$member->id}}">تعديل</a>
                                                        <a href="#" onclick="destroy('this Data','{{$member->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                                        <form id="delete_{{$member->id}}" action="{{ route('deleteBoardMemberDev', $member->id) }}" method="POST" style="display: none;">
                                                            @csrf

                                                            <button type="submit" value=""></button>
                                                        </form>
                                                    </td>



                                                </tr>

                                                <!-- Edit Board Members-->
                                                <div class="modal fade" id="add-news-gallery{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="addCat">
                                                    <div class="modal-dialog modal-lg " role="document">
                                                        <div class="modal-content">
                                                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                                            </button>
                                                            <h3>إضافة عضو للمجلس </h3>
                                                            <div class="modal-body">


                                                                <div class="ms-auth-container row no-gutters">
                                                                    <div class="col-12 p-3">
                                                                        <form action="{{route('updateBoardMemberDev')}}" method="POST" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}

                                                                            <input type="hidden" name="board_directors_id" value="{{$row->id}}">
                                                                            <input type="hidden" name="member" value="{{$member->id}}">

                                                                            <div class="ms-auth-container row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <div class="img-upload">
                                                                                            <img src="{{ asset('uploads/people')}}/{{ $member->image }}" alt="">
                                                                                            <div class="upload-icon">
                                                                                                <input type="file" name="pic" class="upload">
                                                                                                <i class="fas fa-camera    "></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="exampleInputPassword1" for="exampleCheck1">الإسم إنجليزى</label>
                                                                                        <input type="text" name="en_name" value="{{$member->en_name}}" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="exampleInputPassword1" for="exampleCheck1">الإسم عربي</label>
                                                                                        <input type="text" name="ar_name" value="{{$member->ar_name}}" class="form-control">
                                                                                    </div>
                                                                                </div>



                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="exampleInputPassword1" for="exampleCheck1">المركز إنجليزى </label>
                                                                                        <input type="text" name="en_position" value="{{$member->en_position}}" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="exampleInputPassword1" for="exampleCheck1">المركز عربي </label>
                                                                                        <input type="text" name="ar_position" value="{{$member->ar_position}}" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="exampleInputPassword1" for="exampleCheck1">مركز الشخص</label>
                                                                                        <input type="number" value="{{$member->position_order}}" name="person_position" class="form-control">

                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="example2">السيرة الذاتية EN</label>
                                                                                        <div class="form-group">
                                                                                            <textarea class="content" name="en_cv">{{$member->en_cv}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="example2">السيرة الذاتية - عربي</label>
                                                                                        <div class="form-group">
                                                                                            <textarea class="content" name="ar_cv">{{$member->ar_cv}}</textarea>
                                                                                        </div>
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
                                                <!-- /Board Members  Modal -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Cat-->
                </div>


                <!-- ADD Board Members-->
                <div class="modal fade" id="add-news-gallery" tabindex="-1" role="dialog" aria-labelledby="addCat">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                            </button>
                            <h3>إضافة عضو المجلس </h3>
                            <div class="modal-body">


                                <div class="ms-auth-container row no-gutters">
                                    <div class="col-12 p-3">
                                        <form action="{{route('addBoardMemberDev')}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <input type="hidden" name="board_directors_id" value="{{$row->id}}">

                                            <div class="ms-auth-container row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="img-upload">
                                                            <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
                                                            <div class="upload-icon">
                                                                <input type="file" name="pic" class="upload">
                                                                <i class="fas fa-camera    "></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="exampleInputPassword1" for="exampleCheck1">الإسم إنجليزى</label>
                                                        <input type="text" name="en_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="exampleInputPassword1" for="exampleCheck1"> الإسم عربي</label>
                                                        <input type="text" name="ar_name" class="form-control">
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="exampleInputPassword1" for="exampleCheck1">المركز إنجليزى </label>
                                                        <input type="text" name="en_position" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="exampleInputPassword1" for="exampleCheck1">المركز عربي </label>
                                                        <input type="text" name="ar_position" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="exampleInputPassword1">مركز الشخص</label>
                                                        <input type="number" name="position_order" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example2">السيرة الذاتية - EN</label>
                                                        <div class="form-group">
                                                            <textarea class="content" name="en_cv"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example2">السيرة الذاتية - عربي</label>
                                                        <div class="form-group">
                                                            <textarea class="content" name="ar_cv"></textarea>
                                                        </div>
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
                <!-- /Board Members  Modal -->







            </div>
        </div>
    </div>
</div>

<!--  Setup  -->


@endsection
@section('scripts')

@endsection