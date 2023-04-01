@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
    <li class="breadcrumb-item active" aria-current="page">أرقام الأكاديمية </li>
  </ol>
</nav>

@endsection

@section('content')
<div class="row">

  <div class="col-md-12">



    <div class="ms-panel">
      <div class="ms-panel-header d-flex justify-content-between">
        <h6>أرقام الأكاديمية</h6>
        <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addnumber"> إضافة أرقام الأكاديمية </a>
      </div>
      <div class="ms-panel-body">
        <div class="table-responsive">
          <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
            <thead>
              <th>#</th>
              <th>المسمى إنجليزى</th>
              <th>المسمى العربي</th>
              <th>القيمة</th>

              <th>إجراء</th>
            </thead>
            <tbody>
              @foreach($numbers as $index => $number)
              <tr>
                <td>{{$index+1}}</td>
                <td>{{$number->en_name}}</td>
                <td>{{$number->ar_name}}</td>

                <td>{{$number->value}}</td>


                <td>
                  <a href="{{ route('number.edit', $number->id) }}" class="btn btn-info d-inline-block">تعديل</a>
                  <a href="#" onclick="destroy('this Number','{{$number->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                  <form id="delete_{{$number->id}}" action="{{ route('number.destroy', $number->id) }}" method="POST" style="display: none;">
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
<div class="modal fade" id="addnumber" tabindex="-1" role="dialog" aria-labelledby="addnumber">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

      </button>
      <h3>إضافة رقم</h3>

      <div class="modal-body">


        <div class="ms-auth-container row no-gutters">
          <div class="col-12 p-3">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form action="{{route('number.store')}}" method="POST">
              <div class="ms-auth-container row">
                {{ csrf_field() }}

                <div class="col-md-12">
                  <div class="form-group">
                    <label>المسمى إنجليزى</label>
                    <div class="input-group">
                      <input type="text" id="newnumber" name="en_name" class="form-control" placeholder="number">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>المسمى عربي</label>
                    <div class="input-group">
                      <input type="text" id="newnumber" name="ar_name" class="form-control" placeholder="number">
                    </div>
                  </div>
                </div>



                <div class="col-md-8">
                  <div class="form-group">
                    <label>القيمة بالأرقام</label>
                    <div class="input-group">
                      <input type="number" id="newnumber" name="value" class="form-control" placeholder="number">
                    </div>
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