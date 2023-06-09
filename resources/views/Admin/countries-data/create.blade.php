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
                <h6>إضافة بيانات دولة</h6>

            </div>
            <div class="ms-panel-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                    <form action="{{route('countries-data.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                            <div class="ms-auth-container row">
                            <div class="col-md-3">
                          <div class="form-group">
                            <div id="img-upload" class="img-upload">
                              <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
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
                                        <label class="exampleInputPassword1" for="exampleCheck1"> النص إنجليزى</label>
                                        <input type="text" name="en_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1"> النص عربي</label>
                                        <input type="text" name="ar_name" class="form-control">
                                    </div>
                                </div>
                         

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Region </label>
                                        <select name="region_id" class="form-control" id="">
                                            <option value="">اختر...</option>
                                            @foreach ($types as $type)
                                            <option value='{{$type->id}}'>{{$type->ar_name}}

                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                              
                                <div class="ms-auth-container row">
                                    <div class="col-md-12">
                                        <label> الملف إنجليزى </label>

                                        <div class="fileUpload">
                                            <div class="upload-icon">
                                                <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                                <input type="file" name="en_file" class="upload up" id="en_file" onchange="readURLFile(this);" />
                                                <span class="upl" id="upload">رفع الملف</span></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auth-container row">
                                    <div class="col-md-12">
                                        <label>Ar File </label>

                                        <div class="fileUpload">
                                            <div class="upload-icon">
                                                <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                                <input type="file" name="ar_file" class="upload up" id="ar_file" onchange="readURLFile(this);" />
                                                <span class="upl" id="upload">رفع الملف</span></div>

                                        </div>
                                    </div>
                                </div>

                                





                                <div class="input-group d-flex justify-content-end text-center">
                                <a href="{{ route('countries-data.index') }}" class="btn btn-dark mx-2"> إلغاء</a>
                                    <input type="submit" value="حفظ" class="btn btn-success ">
                                </div>
                        </form>
                        </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- add category -->








                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        </div>
        </div>

    </main>


@endsection
@section('scripts')

@endsection