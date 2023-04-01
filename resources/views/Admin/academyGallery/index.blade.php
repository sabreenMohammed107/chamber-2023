@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
      <li class="breadcrumb-item active" aria-current="page"> الجاليرى</li>
    </ol>
  </nav>

@endsection

@section('content')

 <!-- home-slider -->
 <div class="row">

<div class="col-md-12">



    <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
            <h6>الجاليرى</h6>
            <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addclient"> إضافة</a>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead>
                        <th>#</th>
                        <th>صورة</th>

                        <th>نص الصورة</th>
                    
                        <th>نشط</th>
                        <th></th>

                    </thead>
              
         
                    <tbody>
                    @foreach($galleries as $index => $gallery)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td><img src="{{ asset('uploads/academy')}}/{{ $gallery->image }}" alt=""></td>
                            <td>{{$gallery->image_text}}</td>

                        
                            @if($gallery->active == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif

                            <td>
                                <a href="#" class="btn btn-info d-inline-block" data-toggle="modal"
                                    data-target="#addclient{{$gallery->id}}">تعديل</a>
                                    <a href="#" onclick="destroy('this Gallery','{{$gallery->id}}')" class="btn d-inline-block btn-danger">حذف</a>
              <form id="delete_{{$gallery->id}}" action="{{ route('academyGallery.destroy', $gallery->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
                            </td>
                        </tr>

                
<!-- Edit SubCat Modal -->
<div class="modal fade" id="addclient{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="addclient">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>تعديل </h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                        <form action="{{route('academyGallery.update',$gallery->id)}}" method="POST" enctype="multipart/form-data" >
               
                  {{ csrf_field() }}
                  @method('PUT')
                  <div class="ms-auth-container row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="img-upload">
                                                <img src="{{ asset('uploads/academy')}}/{{ $gallery->image }}" alt="">
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
                                                <label>نص الصورة</label>
                                            </div>

                                            <div class="input-group">
                                                <input type="text" name="image_text"value="{{$gallery->image_text}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>
                                 

                                   


                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <br>
                                            @if($gallery->active == 1)
                          <input type="checkbox" id="partener" name="active"
                            checked>
                          @else
                          <input type="checkbox" id="partener" name="active"
                            >
                          @endif
                                            <label for="category">نشط</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="input-group d-flex justify-content-end text-center">
                                    <input type="button" value="الغاء" class="btn btn-dark mx-2" data-dismiss="modal"
                                        aria-label="Close">
                                    <input type="submit" value="حفظ" class="btn btn-success ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end Edit -->
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


 <!-- Add SubCat Modal -->
 <div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclient">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>إضافة </h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                        <form action="{{route('academyGallery.store')}}" method="POST" enctype="multipart/form-data" >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}
                                
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
                                                <label>نص الصورة</label>
                                            </div>

                                            <div class="input-group">
                                                <input type="text" name="image_text" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <br>
                                            <input type="checkbox" id="" name="active" checked>
                                            <label for="category">نشط</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="input-group d-flex justify-content-end text-center">
                                    <input type="button" value="الغاء" class="btn btn-dark mx-2" data-dismiss="modal"
                                        aria-label="Close">
                                    <input type="submit" value="حفظ" class="btn btn-success ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end Add -->
@endsection