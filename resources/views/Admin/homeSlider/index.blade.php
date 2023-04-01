@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
    <li class="breadcrumb-item active" aria-current="page"> سلايدر الرئيسية</li>
  </ol>
</nav>

@endsection

@section('content')
<div class="row">

  <div class="col-md-12">



    <div class="ms-panel">
      <div class="ms-panel-header d-flex justify-content-between">
        <h6>سلايدر الرئيسية</h6>
        <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addclient"> اضافة </a>
      </div>
      <div class="ms-panel-body">
        <div class="table-responsive">
          <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
            <thead>
              <th>#</th>
              <th>صورة</th>
              <th>المسمى الرئيسي عربي </th>
              <th>المسمى الرئيسي إنجليزى</th>
              <th>الترتيب</th>
              <th>نشط</th>
              <th></th>
            </thead>
            <tbody>
              @foreach($rows as $index=> $row)
              <tr>
                <td>{{$index+1}}</td>
                <td><img src="{{ asset('uploads/slider')}}/{{ $row->image }}" alt=""></td>
                <td>{{$row->master_ar_text}}</td>
                <td>{{$row->master_en_text}}</td>
                <td>{{$row->order}}</td>
                @if($row->active == 1)
                <td><i class="fas fa-check"></i></td>
                @else
                <td><i class="fas fa-times"></i></td>
                @endif


                <td>
                  <a href="{{ route('slider.edit', $row->id) }}" class="btn btn-info d-inline-block">تعديل</a>
                  <a href="#" onclick="destroy('this slider','{{$row->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                  <form id="delete_{{$row->id}}" action="{{ route('slider.destroy', $row->id) }}" method="POST" style="display: none;">
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
<!-- Add SubCat Modal -->
<!-- Add SubCat Modal -->
<div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclient">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

      </button>
      <h3>اضافة </h3>

      <div class="modal-body">


        <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
          <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data" >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}
              <div class="ms-auth-container row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="img-upload">
                      <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
                      <div class="upload-icon">
                        <input type="file" name="pic" class="upload">
                        <i class="fas fa-camera    "></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <div class="upload-icon">
                      <label>المسمى الرئيسي عربي</label>
                    </div>

                    <div class="input-group">
                      <input type="text" name="master_ar_text" class="form-control" id="Master AR Title">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label>المسمى الفرعى عربي</label>
                    <div class="input-group">
                      <input type="text" id="Sub AR Title" name="sub_ar_text" class="form-control" placeholder="">
                    </div>
                  </div>
                </div>
               
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label>المسمى الرئيسي إنجليزى</label>
                    <div class="input-group">
                      <input type="text" name="master_en_text" id="Master EN Title" class="form-control" placeholder="">
                    </div>
                  </div>
                </div>
               
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="example2">المسمى الفرعى انجليزى</label>
                    <div class="input-group">
                      <input type="text" name="sub_en_text" class="form-control" id="Master AR Title">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>الرابط</label>
                    <div class="input-group">
                      <input type="text" id="Sub EN Title" name="url" class="form-control" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> الترتيب </label>
                    <div class="input-group">
                      <input type="text" id="Sub EN Title" name="order" class="form-control" placeholder="">
                    </div>
                  </div>
                </div>


                <div class="col-md-12">
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
<!-- /Add Sub Modal -->

@endsection
@section('scripts')

@endsection