@extends('Admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('admin')}}"><i class="material-icons"></i> الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page"> مجلس اداره الغرفة </li>
    </ol>
</nav>

@endsection

@section('content')

 <!-- home-slider -->
 <div class="row">

<div class="col-md-12">



    <div class="ms-panel">
        <div class="ms-panel-header d-flex justify-content-between">
            <h6>مجلس اداره الغرفه</h6>
            <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#add-news-page"> إضافة</a>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead>
                        <th>#</th>
                        

                        <th>من سنة</th>
                        <th>إلى سنة</th>
                        <th>اسم المدير إنجليزى</th>
                        <th>اسم المدير عربي</th>
                       
                        <th>الحالى</th>
                        <th></th>
                        

                    </thead>
                    <tbody>

                    @foreach($rows as $index=> $row)
                            <tr>
                                <td>{{$index+1}}</td>

                           
                            <td>{{$row->from_date}}</td>
                            <td>{{$row->to_date}}</td>
                            <td>{{$row->manager_en_name}}</td>
                            <td>{{$row->manager_ar_name}} </td>
                            
                          
                            @if($row->current == 1)
                          <td><i class="fas fa-check"></i></td>
                          @else
                          <td><i class="fas fa-times"></i></td>
                          @endif
                          

                            <td>
                            <a href="{{ route('board.edit', $row->id) }}" class="btn btn-info d-inline-block" 
                >تعديل</a>
              <a href="#" onclick="destroy('this Data','{{$row->id}}')" class="btn d-inline-block btn-danger">مسح</a>
              <form id="delete_{{$row->id}}" action="{{ route('board.destroy', $row->id) }}"  method="POST" style="display: none;">
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



<!-- Add newspage Modal -->
<div class="modal fade" id="add-news-page" tabindex="-1" role="dialog" aria-labelledby="addclient">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

            </button>
            <h3>إضافة </h3>

            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                    <form action="{{route('board.store')}}" method="POST"  >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label  class="exampleInputPassword1" for="exampleCheck1">من سنة</label>
                                        <input type="date" name="from_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label  class="exampleInputPassword1" for="exampleCheck1">إلى سنة</label>
                                        <input type="date" name="to_date" class="form-control">
                                    </div>
                                </div>


                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label  class="exampleInputPassword1" for="exampleCheck1">اسم الرئيس انجليزى</label>
                                        <input type="text" name="manager_en_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">اسم الرئيس عربي</label>
                                        <input type="text" name="manager_ar_name" class="form-control">
                                    </div>
                                </div>
                         
                               
                              
                                <div class="col-md-6">
                                    <!-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="" name="current" checked>
                                        <label for="category">Current</label>
                                    </div> -->
                                    <div class="form-group">
                                    <select id="current" name="current" class="form-control">
                                        <option value="" >اختر ...</option>
                                        <option value="0">الحالى</option>
                                        <option value="1">السابق</option>
                                        <option value="2">قديما</option>
                                    </select>
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
<!-- HERE -->

        </div>
    </div>
</div>
</div>
</div>
<hr>

</div>
</div>

</main>

<!--  Setup  -->

@endsection
    @section('scripts')

    @endsection