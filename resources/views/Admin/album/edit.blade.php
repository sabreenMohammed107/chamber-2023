@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i>الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page">
            المركز الإعلامى</li>
    </ol>
</nav>

@endsection

@section('content')

<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>تعديل</h6>

            </div>
            <div class="ms-panel-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('album.update',$row->id)}}" method="POST">
                            {{ csrf_field() }}

                            @method('PUT')
                            <div class="ms-auth-container row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">اسم الألبوم عربي</label>
                                        <input type="text" value="{{$row->ar_name}}" name="ar_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">اسم الألبوم إنجليزى</label>
                                        <input type="text" name="en_name" value="{{$row->en_name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تاريخ الألبوم
                                        </label>
                                        <br>
                                        <?php $date = date_create($row->album_date) ?>
                                        <input style="height: 40px; border-radius: 5px;" value="{{ date_format($date,'Y-m-d') }}" name="album_date" class="col-md-12 exampleInputPassword1" for="exampleCheck1" data-date-format="dd/mm/yyyy" type="date" id="datepicker">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Order</label>
                                        <input type="text" value="{{$row->order}}" name="order" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <br>
                                    <div class="custom-control custom-checkbox">
                                        @if($row->active == 1)
                                        <input type="checkbox" id="" name="active" checked>
                                        @else
                                        <input type="checkbox" id="" name="active">
                                        @endif
                                        <label for="category">نشط</label>
                                    </div>

                                </div>






                                <div class="input-group d-flex justify-content-end text-center">
                                    <a href="{{ route('album.index') }}" class="btn btn-dark mx-2"> إلغاء</a>
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
                        صور الألبوم </a>
                </li>


            </ul>
            <div class="tab-content test ">
                <div class="tab-pane active" id="tab_default_1">
                    <!-- Add Category -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#add-news-gallery">اضافة صور للألبوم </button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th scope="col">صورة</th>
                                                    <th scope="col">فيديو</th>
                                                    <th scope="col">نشط</th>
                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            @foreach($galleries as $index => $gallery)
                                            <tbody>

                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td><img src="{{ asset('uploads/albums')}}/{{ $gallery->image }}" alt=""></td>
                                                    <td class="sorting_1">
                                                        <a href="{{$gallery->vedio}}" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">
                                                            {{$gallery->vedio}}
                                                        </a>
                                                    </td>

                                                    @if($gallery->active == 1)
                                                    <td><i class="fas fa-check"></i></td>
                                                    @else
                                                    <td><i class="fas fa-times"></i></td>
                                                    @endif

                                                    <td>
                                                        <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#add-news-gallery{{$gallery->id}}">تعديل</a>
                                                        <a href="#" onclick="destroy('this Gallery','{{$gallery->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                                        <form id="delete_{{$gallery->id}}" action="{{ route('deleteAlbum', $gallery->id) }}" method="POST" style="display: none;">
                                                            @csrf

                                                            <button type="submit" value=""></button>
                                                        </form>
                                                    </td>



                                                </tr>
                                            </tbody>
                                            <!-- ADD -->
                                            <div class="modal fade" id="add-news-gallery{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="addCat">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content">
                                                        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                                        </button>
                                                        <h3>تعديل صور الألبوم </h3>
                                                        <div class="modal-body">


                                                            <div class="ms-auth-container row no-gutters">
                                                                <div class="col-12 p-3">
                                                                    <form action="{{route('updateAlbum')}}" method="POST" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="album_id" value="{{$row->id}}">
                                                                        <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                                                                        <div class="ms-auth-container row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="img-upload">
                                                                                        <img src="{{ asset('uploads/albums')}}/{{ $gallery->image }}" alt="">
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
                                                                                            <input type="url" name="vedio" value="{{$gallery->vedio}}" class="form-control" id="url-type-styled-input">
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
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Cat-->
                </div>



            </div>
            <!-- ADD -->
            <div class="modal fade" id="add-news-gallery" tabindex="-1" role="dialog" aria-labelledby="addCat">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                        </button>
                        <h3>إضافة صور للألبوم </h3>
                        <div class="modal-body">


                            <div class="ms-auth-container row no-gutters">
                                <div class="col-12 p-3">
                                    <form action="{{route('addAlbum')}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="album_id" value="{{$row->id}}">

                                        <div class="ms-auth-container row">
                                            <div class="col-md-6">
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
                                                            <input type="number" name="order" class="form-control">
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






        </div>
    </div>
</div>


@endsection