@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i>الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page">
            المركز الإعلامى</li>
    </ol>
</nav>

@endsection

@section('content')
<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>جاليرى الغرفة</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#add-chamber-gallery"> إضافة</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>


                            <th>اسم الألبوم عربي </th>
                            <th>اسم الألبوم إنجليزى</th>
                            <th>تاريخ الألبوم </th>
                            <th>الترتيب</th>
                            <th>نشط</th>
                            <th></th>


                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->ar_name}}</td>
                                <td>{{$row->en_name}}</td>
                                <td>
                                    <?php $date = date_create($row->album_date) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                </td>

                                <td>{{$row->order}}</td>
                                @if($row->active == 1)
                                                    <td><i class="fas fa-check"></i></td>
                                                    @else
                                                    <td><i class="fas fa-times"></i></td>
                                                    @endif
                                <td>
                                    <a href="{{ route('album.edit',$row->id) }}" class="btn btn-info d-inline-block">تعديل</a>
                                    <a href="#" onclick="destroy('this Album','{{$row->id}}')" class="btn d-inline-block btn-danger">حذف</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('album.destroy', $row->id) }}" method="POST" style="display: none;">
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



                   <!-- Add chamber-gallery Modal -->
                   <div class="modal fade" id="add-chamber-gallery" tabindex="-1" role="dialog" aria-labelledby="addclient">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                            </button>
                            <h3>إضافة </h3>

                            <div class="modal-body">


                                <div class="ms-auth-container row no-gutters">
                                    <div class="col-12 p-3">
                                    <form action="{{route('album.store')}}" method="POST">
                                    @csrf
                                            <div class="ms-auth-container row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label  class="exampleInputPassword1" for="exampleCheck1">اسم الألبوم عربي</label>
                                                        <input type="text" name="ar_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="exampleInputPassword1" for="exampleCheck1">اسم الألبوم إنجليزى</label>
                                                        <input type="text" name="en_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>تاريخ الألبوم
                                                      </label>
                                                      <br>
                                                      <input style="height: 40px; border-radius: 5px;" name="album_date" class="col-md-12 exampleInputPassword1" for="exampleCheck1" data-date-format="dd/mm/yyyy" type="date" id="datepicker">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  class="exampleInputPassword1"  >الترتيب</label>
                                                    <input type="text" name="order" class="form-control">
                                                </div>
                                            </div>
                                                
                                               
                                                
                                                <div class="col-md-6">
                                                    <br>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" id="" name="active" checked>
                                                        <label for="category">نشط</label>
                                                    </div>
            
                                                </div>
                                               
                
                                                
                                              

                                               
                                            <div class="input-group d-flex justify-content-end text-center">
                                                <input type="button" value="الغاء" class="btn btn-dark mx-2"
                                                    data-dismiss="modal" aria-label="Close">
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
<!-- HERE -->

</div>


@endsection