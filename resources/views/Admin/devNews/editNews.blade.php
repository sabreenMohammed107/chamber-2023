@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">أخبار الشعبة </li>
    </ol>
</nav>

@endsection

@section('content')
<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6> أخبار شعبة - {{$devisionrow->ar_title}} </h6>

            </div>
            <div class="ms-panel-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('devNews.update',$row->id)}}" method="POST">

                            {{ csrf_field() }}

                            @method('PUT')
                            <div class="ms-auth-container row">


                                <input type="hidden" name="department_id" value="{{$devisionrow->id}}">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">
                                            المسمى عربي</label>
                                        <input type="text" name="ar_title" value="{{$row->ar_title}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">
                                            المسمى إنجليزى</label>
                                        <input type="text" name="en_title" value="{{$row->en_title}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> التاريخ </label>
                                        <br>
                                        <?php $date = date_create($row->news_date) ?>
                                        <input class="form-control" for="exampleCheck1" value="{{ date_format($date,'Y-m-d') }}" data-date-format="dd/mm/yyyy" name="meeting_date" type="date" id="datepicker">
                                    </div>
                                </div>

                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example2"> النص عربي</label>
                                        <div class="form-group">
                                            <textarea class="content" name="ar_text">{{$row->ar_text}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example2"> النص إنجليزى</label>
                                        <div class="form-group">
                                            <textarea class="content" name="en_text">{{$row->en_text}}</textarea>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <br>
                                        @if($row->active == 1)
                                        <input type="checkbox" id="" name="active" checked>
                                        @else
                                        <input type="checkbox" id="" name="active">
                                        @endif

                                        <label for="category">نشط</label>
                                    </div>

                                </div>






                                <div class="input-group d-flex justify-content-end text-center">
                                    <a href="{{ route('devNews.edit',$devisionrow->id) }}" class="btn btn-dark mx-2"> إلغاء</a>
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
                        الجاليرى </a>
                </li>
                <li class="btn btn-light ">
                    <a href="#tab_default_2" data-toggle="tab" role="tab">
                        الملفات </a>
                </li>
                <li class="btn btn-light ">
                    <a href="#tab_default_3" data-toggle="tab" role="tab">
                        أخبار متعلقة</a>
                </li>


            </ul>
            <div class="tab-content test ">
                <div class="tab-pane active" id="tab_default_1">
                    <!-- Add Category -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#add-Annoucement-Gallery">إضافة جاليرى</button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th scope="col">صورة</th>
                                                    <th scope="col">فيديو</th>
                                                    <th scope="col">الترتيب</th>
                                                    <th scope="col">نشط</th>
                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($galleries as $index => $gallery)
                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td><img src="{{ asset('uploads/division')}}/{{ $gallery->image }}" alt=""></td>
                                                    <td class="sorting_1">
                                                        <a href="{{$gallery->vedio}}" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
                                                            {{$gallery->vedio}}
                                                        </a>
                                                    </td>
                                                    <td>{{$gallery->order}}</td>


                                                    @if($gallery->active == 1)
                                                    <td><i class="fas fa-check"></i></td>
                                                    @else
                                                    <td><i class="fas fa-times"></i></td>
                                                    @endif

                                                    <td>
                                                        <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#add-Annoucement-Gallery{{$gallery->id}}">تعديل</a>
                                                        <a href="#" onclick="destroy('this News','{{$gallery->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                                        <form id="delete_{{$gallery->id}}" action="{{ route('deleteDevNewsGallery', $gallery->id) }}" method="POST" style="display: none;">
                                                            @csrf

                                                            <button type="submit" value=""></button>
                                                        </form>
                                                    </td>



                                                </tr>



                                                <!-- ADD -->
                                                <div class="modal fade" id="add-Annoucement-Gallery{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="addCat">
                                                    <div class="modal-dialog modal-lg " role="document">
                                                        <div class="modal-content">
                                                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                                            </button>
                                                            <h3>تعديل جاليرى الخبر </h3>
                                                            <div class="modal-body">


                                                                <div class="ms-auth-container row no-gutters">
                                                                    <div class="col-12 p-3">
                                                                        <form action="{{route('updateDevNewsGallery')}}" method="POST" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}


                                                                            <input type="hidden" name="department_news_id" value="{{$row->id}}">
                                                                            <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                                                                            <div class="ms-auth-container row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <div class="img-upload">
                                                                                            <img src="{{ asset('uploads/division')}}/{{ $gallery->image }}" alt="">
                                                                                            <div class="upload-icon">
                                                                                                <input type="file" name="image" class="upload">
                                                                                                <i class="fas fa-camera    "></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <div class="upload-icon">
                                                                                            <i class="fas fa-video "></i>
                                                                                            <label> رابط الفيديو </label>
                                                                                            <div class="input-group">
                                                                                                <input type="url" value="{{$gallery->vedio}}" name="vedio" class="form-control" id="url-type-styled-input">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <div class="upload-icon">

                                                                                            <label> Order </label>
                                                                                            <div class="input-group">
                                                                                                <input type="number" value="{{$gallery->order}}" name="order" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <br>
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        @if($gallery->active == 1)
                                                                                        <input type="checkbox" id="" name="active" checked>
                                                                                        @else
                                                                                        <input type="checkbox" id="" name="active">
                                                                                        @endif

                                                                                        <label for="category">active</label>
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
                                                <!-- /news gallery  Modal -->
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
                <div class="tab-pane" id="tab_default_2">
                    <!-- Add img -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#add-Announce-Files"> إضافة ملفات</button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">الملف</th>
                                                    <th scope="col">الإسم</th>
                                                    <th scope="col">اللغة</th>
                                                    <th></th>
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

                                                        <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#add-Announce-Files{{$file->id}}">تعديل</a>
                                                        <a href="#" onclick="destroy('this Announcement','{{$file->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                                        <form id="delete_{{$file->id}}" action="{{ route('deleteDevNewsFile', $file->id) }}" method="POST" style="display: none;">
                                                            @csrf

                                                            <button type="submit" value=""></button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                <!-- Edit-File -->
                                                <div class="modal fade" id="add-Announce-Files{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="addCat">
                                                    <div class="modal-dialog modal-lg " role="document">
                                                        <div class="modal-content">
                                                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                                            </button>
                                                            <h3>تعديل ملفات الخبر </h3>
                                                            <div class="modal-body">


                                                                <div class="ms-auth-container row no-gutters">
                                                                    <div class="col-12 p-3">
                                                                        <form action="{{route('updateDevNewsFile')}}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="department_news_id" value="{{$row->id}}">
                                                                            <input type="hidden" name="file_id" value="{{$file->id}}">
                                                                            <div class="ms-auth-container row">
                                                                                <div class="col-md-12">
                                                                                    <label> الملف </label>

                                                                                    <div class="fileUpload">
                                                                                        <div class="upload-icon">
                                                                                            <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                                                                            <input type="file" name="path" class="upload up" id="path" onchange="readURLFile(this);" />
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
                                                <!-- End Edit File -->
                                            </tbody>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="tab_default_3">
                    <!-- Add Category -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#addRelated"> إضافة </button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="rowEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>

                                                    <th scope="col">متعلقة</th>

                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($related as $index => $relat)
                                                <tr>
                                                    <td>{{$index+1}}</td>




                                                    <td>{{$relat->relatednews->ar_title}}</td>

                                                    <td>
                                                        <a href="#" onclick="destroy('this Related','{{$relat->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                                        <form id="delete_{{$relat->id}}" action="{{ route('deleteRelatedNewsDev', $relat->id) }}" method="POST" style="display: none;">
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
                    <!--End Cat-->
                </div>


                <!-- ADD -->
                <div class="modal fade" id="add-Annoucement-Gallery" tabindex="-1" role="dialog" aria-labelledby="addCat">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                            </button>
                            <h3>إضافة جاليرى </h3>
                            <div class="modal-body">


                                <div class="ms-auth-container row no-gutters">
                                    <div class="col-12 p-3">
                                        <form action="{{route('addDevNewsGallery')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="department_news_id" value="{{$row->id}}">
                                            <div class="ms-auth-container row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="img-upload">
                                                            <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
                                                            <div class="upload-icon">
                                                                <input type="file" name="image" class="upload">
                                                                <i class="fas fa-camera    "></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">
                                                            <i class="fas fa-video "></i>
                                                            <label> رابط الفيديو </label>
                                                            <div class="input-group">
                                                                <input type="url" name="vedio" class="form-control" id="url-type-styled-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label> الترتيب </label>
                                                            <div class="input-group">
                                                                <input type="number" name="order" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <br>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="" name="active" checked>
                                                        <label for="category">نشط</label>
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
                <!-- /news gallery  Modal -->
                <!-- add _ -->
                <div class="modal fade" id="add-Announce-Files" tabindex="-1" role="dialog" aria-labelledby="addCat">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                            </button>
                            <h3>إضافة ملفات الخبر </h3>
                            <div class="modal-body">


                                <div class="ms-auth-container row no-gutters">
                                    <div class="col-12 p-3">
                                        <form action="{{route('addDevNewsFile')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="department_news_id" value="{{$row->id}}">

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
                                                    <label>اللغة</label>
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
                <!-- end./model -->


                <!--  addRelated  Modal -->
                <div class="modal fade" id="addRelated" tabindex="-1" role="dialog" aria-labelledby="addRelated">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                                X

                            </button>
                            <h3>Rمتعلقة</h3>
                            <div class="modal-body">


                                <div class="ms-auth-container row no-gutters">
                                    <div class="col-12 p-3">
                                        <form action="{{route('saveRelatedNewsDev')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="department_news_id" value="{{$row->id}}">
                                            <div class="ms-auth-container row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>الخبر</label>
                                                        <div class="input-group">
                                                            <select data-size="7" name="related_department_news_id" data-live-search="true" class="selectpicker  fill_selectbtn_in own_selectbox" data-title="course" id="state_list" data-width="100%">

                                                                <option value="">اختر...</option>
                                                                @if($relateds !=null)
                                                                @foreach ($relateds as $related)
                                                                <option value='{{$related->id}}'>
                                                                    {{ $related->ar_title }}</option>
                                                                @endforeach
                                                                @endif

                                                            </select>

                                                        </div>
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
                <!-- /addRelated  Modal -->




            </div>
        </div>
    </div>
</div>


<!--  Setup  -->
@endsection
@section('scripts')

@endsection