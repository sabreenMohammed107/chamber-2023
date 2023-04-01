@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page"> التواصل الإجتماعى </li>
    </ol>
</nav>

@endsection

@section('content')

<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>التواصل الإجتماعى</h6>

            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>
                            <th>رابط الفيسبوك</th>

                            <th>رابط تويتر</th>
                            <th>رابط لنكد إن</th>
                            <th>رابط فييدز فلور</th>
                            <th>رابط جوجل بلاس </th>
                            <th>رابط يوتيوب</th>
                            <th></th>

                        </thead>
                        <tbody>
                        @foreach($rows as $index=> $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->facebook_url}}</td>
                                <td>{{$row->twitter_url}}</td>

                                <td>{{$row->linkedin_url}}</td>
                                <td>{{$row->feedsfloor_url}}</td>
                                <td>{{$row->googleplus_url}}</td>
                                <td>{{$row->youtube_url}}</td>

                                <td>
                                <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#addclient{{$row->id}}">تعديل</a>
                                    <a href="#" onclick="destroy('this Data','{{$row->id}}')" class="btn d-inline-block btn-danger">مسح</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('social.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>  </td>
                            </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <!-- Add SubCat Modal -->

    @foreach($rows as $row)
    <!-- Add SubCat Modal -->
    <div class="modal fade" id="addclient{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="addclient">

        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>تعديل </h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="{{route('social.update',$row->id)}}" method="POST">
                                <div class="ms-auth-container row">
                                    {{ csrf_field() }}

                                    @method('PUT')

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="upload-icon">
                                                <label>رابط الفيسبوك</label>
                                            </div>

                                            <div class="input-group">
                                                <input type="url" name="facebook_url" value="{{$row->facebook_url}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="example2">رابط تويتر</label>
                                            <div class="input-group">
                                                <input type="url" name="twitter_url" value="{{$row->twitter_url}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>رابط لنكد إن</label>
                                            <div class="input-group">
                                                <input type="text" name="linkedin_url" value="{{$row->linkedin_url}}" id="Master EN Title" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>رابط فييدز فلور</label>
                                            <div class="input-group">
                                                <input type="text" name="feedsfloor_url" value="{{$row->feedsfloor_url}}" id="Sub AR Title" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>رابط جوجل بلاس</label>
                                            <div class="input-group">
                                                <input type="text" name="googleplus_url" value="{{$row->googleplus_url}}" id="Sub EN Title" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>رابط يوتيوب</label>
                                            <div class="input-group">
                                                <input type="text" name="youtube_url" value="{{$row->youtube_url}}" id="Sub EN Title" class="form-control" >
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
    </main>
    <!-- /Add Sub Modal -->
    @endforeach





    @endsection
    @section('scripts')

    @endsection