@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
    <li class="breadcrumb-item active" aria-current="page"> أرقام الأكاديمية </li>
  </ol>
</nav>

@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="ms-panel">
      <div class="ms-panel-header d-flex justify-content-between">
        <h6>تعديل</h6>
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
        <form action="{{route('number.update',$number->id)}}" method="POST">
          <div class="ms-auth-container row">
            {{ csrf_field() }}

            @method('PUT')
            <div class="col-md-8">
              <div class="form-group">
                <label>المسمى إنجليزى</label>
                <div class="input-group">
                  <input type="text" id="newnumber" name="en_name" value="{{$number->en_name}}" class="form-control" placeholder="number">
                </div>
              </div>
            </div>


            <div class="col-md-8">
              <div class="form-group">
                <label>المسمى عربي</label>
                <div class="input-group">
                  <input type="text" id="newnumber" name="ar_name" value="{{$number->ar_name}}" class="form-control" placeholder="number">
                </div>
              </div>
            </div>



            <div class="col-md-8">
              <div class="form-group">
                <label>القيمة بالأرقام</label>
                <div class="input-group">
                  <input type="number" id="newnumber" name="value" value="{{$number->value}}" class="form-control" placeholder="number">
                </div>
              </div>
            </div>

          </div>
          <div class="input-group d-flex justify-content-end text-center">
            <a href="{{route('number.index')}}" class="btn btn-dark mx-2">إلغاء</a>
            <input type="submit" value="حفظ" class="btn btn-success ">
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection