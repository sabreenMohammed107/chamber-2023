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
                <h6>تعديل </h6>

            </div>
            <div class="ms-panel-body col-md-6 col-md-offset-2">

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-md-12">
                <form action="{{route('academyCourses.update',$row->id)}}" method="POST" enctype="multipart/form-data" >

                    {{ csrf_field() }}

                    @method('PUT')
                    <div class="ms-auth-container row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div id="img-upload" class="img-upload">
                                    <img src="{{ asset('uploads/academy')}}/{{ $row->image }}" alt="">
                                    <div class="upload-icon">
                                        <input type="file" name="pic" class="upload">
                                        <i class="fas fa-camera    "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9"></div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">الاسم عربي </label>
                                <input type="text" name="ar_name" value="{{$row->ar_name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">الاسم انجليزى </label>
                                <input type="text" name="en_name" value="{{$row->en_name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example2">الوصف بالإنجليزى</label>
                                <div class="form-group">
                                    <textarea class="content" name="en_description">{{$row->en_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example2">الوصف بالعربي</label>
                                <div class="form-group">
                                    <textarea class="content" name="ar_description">{{$row->ar_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">عدد الساعات</label>
                                <input type="number" name="course_hourse" value="{{$row->course_hourse}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="exampleInputPassword1" for="exampleCheck1">التكلفة</label>
                                <input type="number" name="course_cost" value="{{$row->course_cost}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example2">المحتوى</label>
                                <div class="form-group">
                                    <textarea class="content" name="content">{{$row->content}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example2">الفئات المستهدفة </label>
                                <div class="form-group">
                                    <textarea class="content" name="audience">{{$row->audience}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <div class="custom-control custom-checkbox">
                                @if($row->vip == 1)
                                <input type="checkbox" id="partener" name="vip" checked>
                                @else
                                <input type="checkbox" id="partener" name="vip">
                                @endif

                                <label for="category">الدورات الرئيسية</label>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <br>
                            <div class="custom-control custom-checkbox">
                                @if($row->active == 1)
                                <input type="checkbox" id="partener" name="active" checked>
                                @else
                                <input type="checkbox" id="partener" name="active">
                                @endif

                                <label for="category">نشط</label>
                            </div>

                        </div>






                        <div class="input-group d-flex justify-content-end text-center">
                            <a href="{{ route('academyCourses.index') }}" class="btn btn-dark mx-2"> إلغاء</a>
                            <input type="submit" value="حفظ" class="btn btn-success ">
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection