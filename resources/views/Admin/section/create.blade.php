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
            <h6>إضافة إدارة</h6>

        </div>
        <div class="ms-panel-body">
            <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-3">
                <form action="{{route('section.store')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                        <div class="ms-auth-container row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="img-upload">
                                        <img  src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
                                        <div class="upload-icon">
                                            <input type="file" name="pic" class="upload">
                                            <i class="fas fa-camera"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  class="exampleInputPassword1" for="exampleCheck1">العنوان إنجليزى</label>
                                    <input type="text" name="en_name" class="form-control">
                                </div>
                            </div>


                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  class="exampleInputPassword1" for="exampleCheck1">العنوان عربي</label>
                                    <input type="text" name="ar_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example2">النص إنجليزى</label>
                                    <div class="form-group">
                                        <textarea class="content" name="en_text"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example2">النص عربي</label>
                                    <div class="form-group">
                                        <textarea class="content" name="ar_text"></textarea>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  class="exampleInputPassword1" for="exampleCheck1">الترتيب</label>
                                    <input type="number" name="order" class="form-control">
                                </div>
                            </div>
                          
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox">
                                    <br>
                                    <input type="checkbox" id="" name="active" checked>
                                    <label for="category">نشط</label>
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