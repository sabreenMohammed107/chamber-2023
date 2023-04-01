@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
    <li class="breadcrumb-item active" aria-current="page">الفرص التجارية </li>
  </ol>
</nav>

@endsection

@section('content')

 <!-- home-slider -->
 <div class="row">

<div class="col-md-12">



    <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
            <h6>الفرص التجارية</h6>
            <a href="{{ route('adminChance.create') }}" class="btn btn-dark" > إضافة</a>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead>
                        <th>#</th>
                        

                        
                        <th>نوع الفرصة</th>
                        <th>تاريخ الفرصة</th>
                        <th>العنوان إنجليزى</th>
                        <th>العنوان عربي</th>
                        <th>الدولة </th>
                        <th>المجال إنجليزى </th>
                        <th>المجال عربي </th>
                      
                        
                        <th></th>
                        
                        
                        

                    </thead>
                    <tbody>
                    @foreach($rows as $index=> $row)
                        <tr>
                        <td>{{$index+1}}</td>
                            <td>
                            {{$row->chance_type == 1 ? ' فرص إستيرادية' : '' }}
                                    {{$row->chance_type == 2 ? 'فرص تصديرية' : '' }}
                                    {{$row->chance_type == 3 ? 'فرص إستثمارية' : '' }}
                                    {{$row->chance_type == 4 ? 'مناقصات ومزايدات' : '' }}
                            </td>
                            <td>  <?php $date = date_create($row->news_date) ?>
                                    {{ date_format($date,"d-m-Y") }}</td>
                            <td> {{$row->en_subject}}</td>
                            <td>{{$row->ar_subject}}</td>
                            <td>
                                @if($row->country)
                                {{$row->country->ar_name}}
                                @endif
                            </td>
                            <td> {{$row->ar_field}}</td>
                            <td> {{$row->en_field}}</td>
                           
                        
                            
                            
                            

                            <td>
                            <a href="{{ route('adminChance.edit', $row->id) }}" class="btn btn-info d-inline-block">تعديل</a>
                                    <a href="#" onclick="destroy('this Data','{{$row->id}}')" class="btn d-inline-block btn-danger">حذف</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('adminChance.destroy', $row->id) }}" method="POST" style="display: none;">
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
    </div>
</div>
</div>
</div>
<hr>

</div>
</div>

</main>

@endsection
@section('scripts')

@endsection