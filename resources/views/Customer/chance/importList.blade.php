<!--========== الفرص  التصديرية ==========-->
<section class="ftco-section ftco-wrap-about">
        <div class="container">
    
            <div class="col-md-12 ftco-animate">
              <div class="heading-section mb-5 my-5 my-md-0">
            </div>
            <input type="hidden" id="chanceType" value="{{$chanceType}}" >
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="bg-brown text-white">
                        <th> {{ __('titles.title') }}</td>
                   
                   <th> {{ __('titles.country') }}</th>
                   <th> {{ __('titles.type') }} </th>
                   <th> {{ __('titles.details') }} </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($chances as $chance)
                        <tr>
                            <td style="width: 15%">{{$chance->ar_subject}}</td>
                           
                            <td style="width: 7%">@if($chance->country)
                @if(app()->getLocale()=='en')
                {{$chance->country->en_name}}
                @else
                {{$chance->country->ar_name}}
                @endif
              

                @endif</td>
                <td style="width: 15%">
              @if(app()->getLocale()=='en')
                {!!$chance->en_field !!}
                @else
                {!!$chance->ar_field !!}
                @endif
               </td>
              <td>
              @if(app()->getLocale()=='en')
                {!!$chance->en_contact !!}
                @else
                {!!$chance->ar_contact !!}
                @endif
               
              </td>
                        </tr>
                        
                        
                       @endforeach
                          </tbody>
                    </table>
              

              
  
            </div>
          </div>

          <div class="row no-gutters my-5">
        <div class="col text-center"  style="margin-right: 45%">
          <div id="categorySchedule" class="block-27">
          </div>
        </div>
      </div>
        </div>
      </section>



  
