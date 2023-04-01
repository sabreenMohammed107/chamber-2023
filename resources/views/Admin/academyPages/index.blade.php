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
        <h6>عن الاكاديمية</h6>
       
    </div>
    <div class="ms-panel-body">
        <div class="table-responsive">
            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                    <th>#</th>
                    <th>الاسم بالعربي</th>
                    <th>الاجراء</th>
                    

                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>عن الاكاديميه</td>
                     
               

                        <td>
                            <a href="{{ route('aboutAcademy.edit', $rows->id) }}" class="btn btn-info d-inline-block" 
                                data-target="#">تعديل</a>
                           
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
        </div>
        <!-- /.row -->


</div>
@endsection