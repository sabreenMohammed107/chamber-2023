@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية </a></li>
        <li class="breadcrumb-item active" aria-current="page">صفحات الغرفة </li>
    </ol>
</nav>

@endsection

@section('content')

<!-- home-slider -->
<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>صفحات الغرفة</h6>

            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>
                            <th>كود الصفحة</th>
                            <th>اسم الصفحة</th>
                            <th></th>


                        </thead>
                        <tbody>

                            @foreach($rows as $index=> $row)
                       
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->code}}</td>
                                <td>{{$row->code == 1 ? 'مركز التمييز' : '' }}
                                    {{$row->code == 2 ? 'الرعاية الصحية للتجار' : '' }}
                                    {{$row->code == 3 ? 'التأمين على حياة التجار و ممتلكاتهم' : '' }}
                                    {{$row->code == 4 ? 'الإرشاد التجاري' : '' }}
                                    {{$row->code == 5 ? 'نادي تجار العاصمة' : '' }}
                                    {{$row->code == 6 ? 'قاعة مؤتمرات غرفة العاصمة' : '' }}
                                    {{$row->code == 7 ? 'التوفيق والتحكيم التجارى' : '' }}
                                    {{$row->code == 8 ? 'لجنة المرأة والتجار' : '' }}
                                </td>


                                <td>
                                    <a href="{{ route('articel.edit', $row->id) }}" class="btn btn-info d-inline-block" data-target="#">تعديل</a>

                                </td>
                            </tr>
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