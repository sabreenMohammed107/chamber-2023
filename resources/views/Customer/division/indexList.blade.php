              
                   
                 
               <nav>
                <ul id="myMenu2">
                  @foreach($devisions as $devision)
                    <li><a href="{{ url('devisionDetails/'.$devision->id) }}"  class="text-dark text-decoration">
                      
                    @if(app()->getLocale()=='en')
                    {!! Str::limit($devision->en_title,50,'.') !!}
                    @else
                    {!! Str::limit($devision->ar_title,50,'.') !!}
                    @endif
                  </a> </li>
                   @endforeach
                    
                

                  </ul>
                </nav>
                
      <div class="row no-gutters my-5">
        <div class="col text-center" style="margin-right: 45%">
          <div id="devisionPagination" class="block-27">
          {!! $devisions->links() !!}
          </div>
        </div>
      </div>