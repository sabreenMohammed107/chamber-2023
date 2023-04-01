@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page">المؤتمر </li>
    </ol>
</nav>

@endsection

@section('content')
<div class="ms-panel">
                        <div class="ms-panel-header d-flex justify-content-between">
                            <h6>إضافة مؤتمر</h6>

                        </div>
                        <div class="ms-panel-body">
                            <div class="ms-auth-container row no-gutters">
                                <div class="col-12 p-3">
                                    <form action="{{route('conference.store')}}" method="POST">
                                    @csrf
                                        <div class="ms-auth-container row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="exampleInputPassword1" for="exampleCheck1">
                                                        المسمى عربي</label>
                                                    <input type="text" name="ar_title" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="exampleInputPassword1" for="exampleCheck1">
                                                        المسمى إنجليزى</label>
                                                    <input type="text" name="en_title" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> تاريخ المؤتمر
                                                    </label>
                                                    <br>
                                                    <input style="height: 40px; border-radius: 5px;"
                                                        class="col-md-12 exampleInputPassword1" for="exampleCheck1"
                                                        data-date-format="dd/mm/yyyy" name="conference_date" type="date" id="datepicker">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>النوع</label>
                                    <select name="conference_type_id" id="conference_type_id" class="browser-default custom-select" >
                                    <option value="">النوع</option>
                                    @foreach ($types as $type)
                                    <option value='{{$type->id}}'>{{$type->name}}
                  
                                    </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الدولة</label>
                                    <select name="country_id" id="country_id" class="browser-default custom-select" >
                                    <option value="">الدولة</option>
                                    @foreach ($countries as $country)
                                    <option value='{{$country->id}}'>{{$country->ar_name}}
                  
                                    </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="exampleInputPassword1"
                                                        for="exampleCheck1">ترتيب الرئيسية</label>
                                                    <input type="text" name="home_order" class="form-control">
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example2"> النص عربي</label>
                                                    <div class="form-group">
                                                        <textarea class="content" name="ar_text"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example2"> النص إنجليزى</label>
                                                    <div class="form-group">
                                                        <textarea class="content" name="en_text"></textarea>
                                                    </div>
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
                                            <a href="{{ route('conference.index') }}" class="btn btn-dark mx-2"> إلغاء</a>
                                                <input type="submit" value="حفظ" class="btn btn-success ">
                                            </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

@endsection