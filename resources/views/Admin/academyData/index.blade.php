@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page"> بيانات الأكاديمية </li>
    </ol>
</nav>

@endsection

@section('content')
<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>بيانات الأكاديمية</h6>

            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>


                            <th>هاتف الإدارة</th>
                            <th>هاتف التسويق</th>
                            <th>الواتس أب</th>
                            <th>البريد الإلكترونى</th>

                            <th></th>

                        </thead>
                    

                        <tbody>
                        @foreach($allData as $index => $data)

                            <tr>
                                <td>{{$index+1}}</td>

                                <td>{{$data->mangment_phone}}</td>

                                <td>{{$data->marketing_phone}}</td>
                                <td>{{$data->whatsapp}} </td>
                                <td>{{$data->email}}</td>

                                <td>
                                <a href="#" class="btn btn-info d-inline-block" data-toggle="modal"
                                    data-target="#addclient{{$data->id}}">تعديل</a>
                                </td>
                            </tr>

                        <!-- Add SubCat Modal -->
                        <div class="modal fade" id="addclient{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="addclient">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content">
                                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                    </button>
                                    <h3>إضافة </h3>

                                    <div class="modal-body">


                                        <div class="ms-auth-container row no-gutters">
                                            <div class="col-12 p-3">
                                                <form action="{{route('academyData.update',$data->id)}}" method="POST" enctype="multipart/form-data">

                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="ms-auth-container row">

                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <div class="upload-icon">
                                                                    <label>هاتف الإدارة</label>
                                                                </div>

                                                                <div class="input-group">
                                                                    <input type="text" name="mangment_phone" value="{{$data->mangment_phone}}" class="form-control" id="Master AR Title">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>هاتف التسويق</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="marketing_phone" value="{{$data->marketing_phone}}" class="form-control" id="Master AR Title">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>الواتس أب</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="whatsapp" value="{{$data->whatsapp}}" id="Sub AR Title" class="form-control" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>البريد الإلكترونى</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="email"  value="{{$data->email}}" id="Sub AR Title" class="form-control" placeholder="">
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
                       
                        <!-- /Add Sub Modal -->
                        @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>







    @endsection