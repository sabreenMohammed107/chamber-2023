@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
    <li class="breadcrumb-item active" aria-current="page">الفرص التجارية </li>
  </ol>
</nav>

@endsection

@section('content')
 <!-- home-slider -->
 <div class="row">

<div class="col-md-12">



    <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
            <h6>إضافة الفرص</h6>

        </div>
        <div class="ms-panel-body">
            <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-3">
                <form action="{{route('adminChance.store')}}" method="POST"  >
                                    @csrf
                        <div class="ms-auth-container row">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>نوع الفرصة</label>
                                        <select name="chance_type" class="form-control" id="">
                                            <option value="">اختر...</option>
                                            <option value="1">فرص إستيراديه</option>
                                            <option value="2">فرص تصديرية</option>
                                            <option value="3">فرص إستثمارية</option>
                                            <option value="4">مناقصات ومزايدات</option>

                                        </select>
                                    </div>
                                </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاريخ الفرصة
                                    </label>
                                    <br>
                                    <input style="height: 40px; border-radius: 5px;"
                                        class="col-md-12 exampleInputPassword1"  name="chance_date" for="exampleCheck1"
                                        data-date-format="dd/mm/yyyy" type="date" id="datepicker">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="exampleInputPassword1"  for="exampleCheck1"> العنوان إنجليزى </label>
                                    <input type="text" name="en_subject" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="exampleInputPassword1"  for="exampleCheck1"> العنوان عربي</label>
                                    <input type="text" name="ar_subject" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الدولة</label>
                                    <select name="chance_country_id" id="chance_country_id" class="browser-default custom-select" >
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
                                    <label class="exampleInputPassword1" for="exampleCheck1">
                                        المجال انجليزى</label>
                                    <input type="text" name="en_field" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="exampleInputPassword1" for="exampleCheck1">
                                        المجال عربي</label>
                                    <input type="text" name="ar_field" class="form-control">
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example2">التفاصيل إنجليزى </label>
                                    <div class="form-group">
                                        <textarea class="content" name="en_contact"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example2">التفاصيل عربي </label>
                                    <div class="form-group">
                                        <textarea class="content" name="ar_contact"></textarea>
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
                            <a href="{{ route('adminChance.index') }}" class="btn btn-dark mx-2"> إلغاء</a>
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

<!--  Setup  -->

@endsection
@section('scripts')

@endsection