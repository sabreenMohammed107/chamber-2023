@extends('Admin.adminLayout.main')

@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> {{ __('الرئيسية') }} </a></li>
    </ol>
</nav>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>الشركات التى تم تدريبها</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#add-chamber-gallery"> إضافة</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>


                            <th>الاسم عربى</th>
                            <th>الاسم انجليزى</th>
                            <th>من سنه</th>
                            <th>الى سنة</th>
                            <th>نشط</th>
                            <th></th>


                        </thead>
                        <tbody>

                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->ar_name}}</td>
                                <td>{{$row->en_name}}</td>
                                <td>{{$row->year_from}}</td>
                                <td>{{$row->year_to}}</td>

                             
                                    @if($row->active == 1)
                                <td><i class="fas fa-check"></i></td>
                                @else
                                <td><i class="fas fa-times"></i></td>
                                @endif
                               

                                <td>
                                    <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#add-chamber-gallery{{$row->id}}">تعديل</a>
                                    <a href="#" onclick="destroy('this Company','{{$row->id}}')" class="btn d-inline-block btn-danger">حذف</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('academyCompany.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Add chamber-gallery Modal -->
                            <div class="modal fade" id="add-chamber-gallery{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="addclient">
                                <div class="modal-dialog modal-lg " role="document">
                                    <div class="modal-content">
                                        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                        </button>
                                        <h3>Add </h3>

                                        <div class="modal-body">


                                            <div class="ms-auth-container row no-gutters">
                                                <div class="col-12 p-3">
                                                    <form action="{{route('academyCompany.update',$row->id)}}" method="POST">

                                                        {{ csrf_field() }}
                                                        @method('PUT')
                                                        <div class="ms-auth-container row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">AR name</label>
                                                                    <input type="text" name="ar_name" value="{{$row->ar_name}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">EN name</label>
                                                                    <input type="text" name="en_name" value="{{$row->en_name}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">year from </label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="year_from" value="{{$row->year_from}}" type="number" min="0" max="3000" step="1" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="exampleInputPassword1" for="exampleCheck1">year to</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="number" name="year_to" value="{{$row->year_to}}" min="0" max="3000" step="1" />
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div class="col-md-6">
                                                                <br>
                                                                <div class="custom-control custom-checkbox">
                                                                    @if($row->active == 1)
                                                                    <input type="checkbox" id="partener" name="active" checked>
                                                                    @else
                                                                    <input type="checkbox" id="partener" name="active">
                                                                    @endif
                                                                    <label for="category">active</label>

                                                                </div>

                                                            </div>






                                                            <div class="input-group d-flex justify-content-end text-center">
                                                                <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                                                <input type="submit" value="حفظ" class="btn btn-success ">
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>





                            </div>

                <!-- end model -->
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.row -->


</div>



<!-- Add chamber-gallery Modal -->
<div class="modal fade" id="add-chamber-gallery" tabindex="-1" role="dialog" aria-labelledby="addclient">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

            </button>
            <h3>اضافة </h3>

            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('academyCompany.store')}}" method="POST">
                            <div class="ms-auth-container row">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">الاسم عربى</label>
                                        <input type="text" name="ar_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">الاسم انجليزى</label>
                                        <input type="text" name="en_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">من سنة</label>
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="year_from" min="2000" max="3000" step="1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">الي سنة</label>
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="year_to" min="2000" max="3000" step="1" />
                                        </div>
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

</div>
@endsection