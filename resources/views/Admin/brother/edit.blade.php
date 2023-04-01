@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page"> إتفاقات التآخى </li>
    </ol>
</nav>

@endsection

@section('content')
<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>إضافة اتفاقية تآخى</h6>

            </div>
            <div class="ms-panel-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">

                        <form action="{{route('brother.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @method('PUT')
                            <div class="ms-auth-container row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1"> الجهة إنجليزى</label>
                                        <input type="text" name="en_issuer" value="{{$row->en_issuer}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1"> الجهة عربي</label>
                                        <input type="text" name="ar_issuer" value="{{$row->ar_issuer}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تاريخ الإتفاقية
                                        </label>
                                        <br>
                                        <?php $date = date_create($row->agreement_date) ?>
                                        <input style="height: 40px; border-radius: 5px;" class="col-md-12 exampleInputPassword1" for="exampleCheck1" value="{{ date_format($date,'Y-m-d') }}" data-date-format="dd/mm/yyyy" name="agreement_date" type="date" id="datepicker">
                                    </div>
                                </div>



                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example2">نص الإتفاقية إنجليزى </label>
                                        <div class="form-group">
                                            <textarea class="content" name="en_agreement">{{$row->en_agreement}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example2">نص الإتفاقية عربي </label>
                                        <div class="form-group">
                                            <textarea class="content" name="ar_agreement">{{$row->ar_agreement}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auth-container row">
                                    <div class="col-md-8">
                                        <label> الملف إنجليزى </label>

                                        <div class="fileUpload">
                                            <div class="upload-icon">
                                                <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                                <input type="file" name="en_file" class="upload up" id="en_file" onchange="readURLFile(this);" />
                                                <span class="upl" id="upload">{{$row->en_file}}</span></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auth-container row">
                                    <div class="col-md-8">
                                        <label>الملف عربي </label>

                                        <div class="fileUpload">
                                            <div class="upload-icon">
                                                <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">

                                                <input type="file" name="ar_file" class="upload up" id="ar_file" onchange="readURLFile(this);" />
                                                <span class="upl" id="upload">{{$row->ar_file}}</span></div>

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
                                    <a href="{{ route('brother.index') }}" class="btn btn-dark mx-2"> إلغاء</a>
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

@endsection
@section('scripts')

@endsection