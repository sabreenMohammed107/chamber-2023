@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">الأخبار </li>
    </ol>
</nav>

@endsection

@section('content')
<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>الأخبار</h6>
                <a href="{{ route('news.create') }}" class="btn btn-dark"> اضافة</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>


                            <th>العنوان عربي </th>
                            <th>العنوان إنجليزى</th>
                            <th>تاريخ الخبر </th>
                          
                            <th>ترتيب الرئيسية</th>
                            <th>نشط</th>
                           
                            <th></th>


                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->ar_title}}</td>
                                <td>{{$row->en_title}}</td>
                                <td>
                        <?php $date = date_create($row->news_date) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                             </td>
                              
                                <td>{{$row->home_order}}</td>
                                @if($row->active == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif
                                <td>
                                <a href="{{ route('news.edit',$row->id) }}" class="btn btn-info d-inline-block" 
                           >تعديل</a>
              <a href="#" onclick="destroy('this News','{{$row->id}}')" class="btn d-inline-block btn-danger">مسح</a>
              <form id="delete_{{$row->id}}" action="{{ route('news.destroy', $row->id) }}"  method="POST" style="display: none;">
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
<!-- HERE -->

</div>

@endsection