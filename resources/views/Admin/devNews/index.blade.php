@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">أخبار الشعبة </li>
    </ol>
</nav>

@endsection

@section('content')
<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>أخبار الشعبة</h6>
                <!-- <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addnumber"> add  </a> -->
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>


                            <th>المسمى عربي </th>
                            <th>المسمى إنجليزى</th>
                           
                            <th></th>


                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->ar_title}}</td>
                                <td>{{$row->en_title}}</td>
                                
                                <td>
                                <a href="{{ route('devNews.edit',$row->id) }}" class="btn btn-info d-inline-block" 
                           >اختر</a>
              
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
<!-- HERE -->

</div>




@endsection