<div class="table-responsive">
    <table class="table table-bordered text-center">
        <tr class="bg-brown text-white">
            <td>{{ __('titles.name') }}</td>
            <td>{{ __('links.phone') }}</td>
            <td>{{ __('titles.minster') }}</td>
            <td>{{ __('links.email') }}</td>
            <td>{{ __('titles.website') }}</td>
            <td>{{ __('links.address') }}</td>
            <td></td>
        </tr>
@foreach($agreements as $agreement)
        <tr>
            
            <td>
            @if(app()->getLocale()=='en')
                                            {{$agreement->en_name}}
					@else
                    {{$agreement->ar_name}}
					@endif   
            </td>
            <td>
        
                    {{$agreement->phone}}
					  
            </td>
            <td>
        
            @if(app()->getLocale()=='en')
                                            {{$agreement->manager_en_name}}
					@else
                    {{$agreement->manager_ar_name}}
					@endif   
					  
            </td>
            <td>
       
                    {{$agreement->email}}
					 
            </td>
            <td>
        
                    {{$agreement->website}}
				  
            </td>
            <td>
            @if(app()->getLocale()=='en')
                                            {{$agreement->en_address}}
					@else
                    {{$agreement->ar_address}}
					@endif   
            </td>
            <td><img src="{{ asset('uploads/encyclo')}}/{{ $agreement->image}}" style="height: 100px" alt=""></td>
           
        </tr>

@endforeach



    </table>
</div>