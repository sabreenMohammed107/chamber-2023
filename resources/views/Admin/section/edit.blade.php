@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page">الإدارات </li>
    </ol>
</nav>

@endsection

@section('content')

<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>تعديل الإدارة</h6>

            </div>
            <div class="ms-panel-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('section.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="ms-auth-container row">
                                {{ csrf_field() }}

                                @method('PUT')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="img-upload">
                                            <img src="{{ asset('uploads/sections')}}/{{ $row->image }}" alt="">
                                            <div class="upload-icon">
                                                <input type="file" name="pic" class="upload">
                                                <i class="fas fa-camera    "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">المسمى إنجليزى</label>
                                        <input type="text" name="en_name" value="{{$row->en_name}}" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">المسمى عربي</label>
                                        <input type="text" name="ar_name" value="{{$row->ar_name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example2">النص إنجليزى</label>
                                        <div class="form-group">
                                            <textarea class="content" name="en_text">{{$row->en_text}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example2">النص عربي</label>
                                        <div class="form-group">
                                            <textarea class="content" name="ar_text">{{$row->ar_text}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">الترتيب</label>
                                        <input type="number" name="order" value="{{$row->order}}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <br>
                                        @if($row->active == 1)
                                        <input type="checkbox" id="partener" name="active" checked>
                                        @else
                                        <input type="checkbox" id="partener" name="active">
                                        @endif
                                        <label for="category">active</label>
                                    </div>

                                </div>







                                <div class="input-group d-flex justify-content-end text-center">
                                    <a href="{{ route('section.index') }}" class="btn btn-dark mx-2"> إلغاء</a>
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
                        ملفات الإدارة </a>
                </li>



            </ul>
            <div class="tab-content test ">
                <div class="tab-pane active" id="tab_default_1">
                    <!-- Add Category -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#add-news-gallery">إضافة ملفات الإدارة </button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th scope="col">المسار</th>
                                                    <th scope="col">الإسم</th>
                                                    <th scope="col">اللغة</th>

                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($files as $index => $file)
                                                <tr>
                                                    <td>{{$index+1}}</td>

                                                    <td>{{$file->path}}</td>

                                                    <td>{{$file->name}}</td>
                                                    @if($file->language_id == 1)
                                                    <td>Arabic</td>
                                                    @else
                                                    <td>English</td>
                                                    @endif

                                                    <td>

                                                        <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#add-news-gallery{{$file->id}}">edit</a>
                                                        <a href="#" onclick="destroy('this Data','{{$file->id}}')" class="btn d-inline-block btn-danger">حذف</a>
                                                        <form id="delete_{{$file->id}}" action="{{ route('deleteSectionFile', $file->id) }}" method="POST" style="display: none;">
                                                            @csrf

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
                    <!--End Cat-->
                </div>


                <!-- ADD Board Members-->
                <div class="modal fade" id="add-news-gallery" tabindex="-1" role="dialog" aria-labelledby="addCat">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                            </button>
                            <h3>إضافة ملفات الإدارة </h3>
                            <div class="modal-body">


                                <div class="ms-auth-container row no-gutters">
                                    <div class="col-12 p-3">
                                        <form action="{{route('addSectionFile')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="section_id" value="{{$row->id}}">

                                            <div class="ms-auth-container row">
                                                <div class="col-md-12">
                                                    <label> الملف </label>

                                                    <div class="fileUpload">
                                                        <div class="upload-icon">
                                                            <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                                            <input type="file" name="path" class="upload up" id="up" onchange="readURLFile(this);" />
                                                            <span class="upl" id="upload">رفع الملف</span></div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ms-auth-container row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>الإسم</label>
                                                        <input type="text" name="name" class="form-control">


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ms-auth-container row">
                                                <div class="col-md-12">
                                                    <label>language</label>
                                                    <div class="form-group">

                                                        EN <input type="radio" name="language_id" value="en" checked>
                                                        عربي <input type="radio" name="language_id" value="ar">
                                                    </div>
                                                    <div class="input-group d-flex justify-content-end text-center">
                                                        <input type="button" value="الغاء" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                                        <input type="submit" value="حفظ" class="btn btn-success ">
                                                    </div>


                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Board Members  Modal -->


                @foreach($files as $file)
                <!-- updat Board Members-->
                <div class="modal fade" id="add-news-gallery{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="addCat">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                            </button>
                            <h3>إضافة ملفات الإدارة </h3>
                            <div class="modal-body">


                                <div class="ms-auth-container row no-gutters">
                                    <div class="col-12 p-3">
                                        <form action="{{route('updateSectionFile')}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}


                                            <input type="hidden" name="section_id" value="{{$row->id}}">
                                            <input type="hidden" name="file_id" value="{{$file->id}}">

                                            <div class="ms-auth-container row">
                                                <div class="col-md-12">
                                                    <label> الملف </label>

                                                    <div class="fileUpload">
                                                        <div class="upload-icon">
                                                            <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                                            <input type="file" name="path" class="upload up" id="up" onchange="readURLFile(this);" />
                                                            <span class="upl" id="upload">{{$file->path}}</span></div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ms-auth-container row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>الإسم</label>
                                                        <input type="text" name="name" value="{{$file->name}}" class="form-control">


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ms-auth-container row">
                                                <div class="col-md-12">
                                                    <label>اللغة</label>

                                                    <div class="form-group">
                                                        EN <input type="radio" name="language_id" value="en" <?php echo ($file->language_id == 0) ? 'checked' : '' ?>>
                                                        عربي <input type="radio" name="language_id" value="ar" <?php echo ($file->language_id == 1) ? 'checked' : '' ?>>
                                                    </div>

                                                    <div class="input-group d-flex justify-content-end text-center">
                                                        <input type="button" value="الغاء" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                                        <input type="submit" value="حفظ" class="btn btn-success ">
                                                    </div>


                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /Board Members  Modal -->






            </div>
        </div>
    </div>
</div>

<!--  Setup  -->


@endsection
@section('scripts')

@endsection