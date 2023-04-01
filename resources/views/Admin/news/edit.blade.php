@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">الأخبار </li>
    </ol>
</nav>

@endsection

@section('content')

<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>تعديل الخبر</h6>

            </div>
            <div class="ms-panel-body">
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
                        <form action="{{route('news.update',$row->id)}}" method="POST">
                            {{ csrf_field() }}

                            @method('PUT')
                            <div class="ms-auth-container row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">
                                            العنوان عربي</label>
                                        <input type="text" name="ar_title" class="form-control" value="{{$row->ar_title}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">
                                            العنوان إنجليزى</label>
                                        <input type="text" name="en_title" class="form-control" value="{{$row->en_title}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> تاريخ الخبر
                                        </label>
                                        <br>
                                        <?php $date = date_create($row->news_date) ?>
                                        <input style="height: 40px; border-radius: 5px;" class="col-md-12 exampleInputPassword1" for="exampleCheck1" data-date-format="dd/mm/yyyy" name="announce_date" type="date" id="datepicker" value="{{ date_format($date,'Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">ترتيب الرئيسية</label>
                                        <input type="text" name="home_order" value="{{$row->home_order}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example2">نص الخبر عربي</label>
                                        <div class="form-group">
                                            <textarea class="content" name="ar_text">{{$row->ar_text}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example2">نص الخبر إنجليزى</label>
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
                                    <a href="{{ route('news.index') }}" class="btn btn-dark mx-2"> إلغاء</a>
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
                        جاليرى الخبر </a>
                </li>
                <li class="btn btn-light ">
                    <a href="#tab_default_2" data-toggle="tab" role="tab">
                        ملفات الخبر </a>
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
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#add-Annoucement-Gallery">اضافه </button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="rowEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th scope="col">صورة</th>
                                                    <th scope="col">فيديو</th>
                                                    <th scope="col">ترتيب</th>
                                                    <th scope="col">نشط</th>
                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($galleries as $index => $gallery)
                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td><img src="{{ asset('uploads/news')}}/{{ $gallery->image }}" alt=""></td>
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
                                                        <form id="delete_{{$gallery->id}}" action="{{ route('deleteNews', $gallery->id) }}" method="POST" style="display: none;">
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
                                                                        <form action="{{route('updateNews')}}" method="POST" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}


                                                                            <input type="hidden" name="news_id" value="{{$row->id}}">
                                                                            <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                                                                            <div class="ms-auth-container row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <div class="img-upload">
                                                                                            <img src="{{ asset('uploads/news')}}/{{ $gallery->image }}" alt="">
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

                                                                                            <label> الترتيب </label>
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
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#add-Announce-Files"> إضافة ملفات للخبر</button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="rowEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th scope="col">المسار</th>
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
                                                        <form id="delete_{{$file->id}}" action="{{ route('deleteNewsFile', $file->id) }}" method="POST" style="display: none;">
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
                                                                        <form action="{{route('updateNewsFile')}}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="news_id" value="{{$row->id}}">
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
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#addRelated"> إضافة خبر </button>
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
                                            @foreach($related as $index => $relat)
                                            <tbody>

                                                <tr>
                                                    <td>{{$index+1}}</td>




                                                    <td>{{$relat->relatednews->ar_title}}</td>

                                                    <td>
                                                        <a href="#" onclick="destroy('this Related','{{$relat->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                                        <form id="delete_{{$relat->id}}" action="{{ route('deleteRelatedNews', $relat->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" value=""></button>
                                                        </form>
                                                    </td>



                                                </tr>

                                            </tbody>

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
                                                                    <form action="{{route('updateNews')}}" method="POST" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}


                                                                        <input type="hidden" name="news_id" value="{{$row->id}}">
                                                                        <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                                                                        <div class="ms-auth-container row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="img-upload">
                                                                                        <img src="{{ asset('uploads/news')}}/{{ $gallery->image }}" alt="">
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

                                                                                        <label> الترتيب </label>
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
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Cat-->
                </div>









            </div>
        </div>
    </div>

</div>
<hr>
</div>


<!--  addRelated  Modal -->
<div class="modal fade" id="addRelated" tabindex="-1" role="dialog" aria-labelledby="addRelated">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                X

            </button>
            <h3>متعلقة </h3>
            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('saveRelatedNews')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="news_id" value="{{$row->id}}">
                            <div class="ms-auth-container row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>الأخبار</label>
                                        <div class="input-group">
                                            <select data-size="7" name="related_news_id" data-live-search="true" class="selectpicker  fill_selectbtn_in own_selectbox" data-title="select" id="state_list" data-width="100%">

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
<!-- ADD -->
<div class="modal fade" id="add-Annoucement-Gallery" tabindex="-1" role="dialog" aria-labelledby="addCat">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

            </button>
            <h3>إضافة جاليرى الخبر </h3>
            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('addNews')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="news_id" value="{{$row->id}}">
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
            <h3>إضافة ملفات للخبر </h3>
            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('addNewsFile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="news_id" value="{{$row->id}}">

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

@endsection