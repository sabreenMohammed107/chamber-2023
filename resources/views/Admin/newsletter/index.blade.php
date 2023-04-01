@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page"> القائمة البريدية </li>
    </ol>
</nav>

@endsection

@section('content')
<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>القائمة البريدية</h6>

            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>
                            <th>البريد الإلكترونى</th>

                            <th>تاريخ الإرسال </th>

                            <th></th>

                        </thead>
                        <tbody>
                        @foreach($rows as $index=> $row)
                            <tr>
                                <td>{{$index+1}}</td>

                                <td>{{$row->email}}</td>

                                <td>
                                     <?php $date = date_create($row->created_at) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                             </td>


                                <td>
                                <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#addclient{{$row->id}}">تعديل</a>
                                    <a href="#" onclick="destroy('this Data','{{$row->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('newsletter.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>
                                </td>
                            </tr>
                              <!-- Add SubCat Modal -->
    <div class="modal fade" id="addclient{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="addclient">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3> القائمة البريدية</h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="">
                                <div class="ms-auth-container row">


                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>البريد الإكترونى</label>
                                            <div class="input-group">
                                                <input type="text" name="email" value="{{$row->email}}" id="Master EN Title" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Created Date
                                            </label>
                                            <br>
                                            <input style="height: 40px; border-radius: 5px;"  class="col-md-12 exampleInputPassword1" for="exampleCheck1" data-date-format="dd/mm/yyyy" type="date" id="datepicker">
                                        </div>
                                    </div> -->




                                    <div class="input-group d-flex justify-content-end text-center">
                                        <input type="button" value="الغاء" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                        <!-- <input type="submit" value="حفظ" class="btn btn-success "> -->
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

   
    @endsection
    @section('scripts')

    @endsection