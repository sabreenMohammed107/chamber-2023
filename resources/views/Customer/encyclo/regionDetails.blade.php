<div class="table-responsive">
    <table class="table table-bordered text-center">
        <tr class="bg-brown text-white">
            <td>{{ __('titles.flag') }}</td>
            <td>{{ __('titles.country') }}</td>
            <td>{{ __('titles.show') }}</td>
        </tr>
@foreach($agreements as $agreement)
        <tr>
            <td><img src="{{ asset('uploads/encyclo/'.$agreement->flag) }}" class="img30"> </td>
            <td>
            @if(app()->getLocale()=='en')
                                            {{$agreement->en_name}}
					@else
                    {{$agreement->ar_name}}
					@endif   
            </td>
            <td>
            @if(app()->getLocale()=='en')
                            <a href="{{ asset('uploads/files/'.$agreement->en_file) }}" target="_blank"><i class="fa fa-eye"></i></a>
					@else
                    <a href="{{ asset('uploads/files/'.$agreement->ar_file) }}" target="_blank"><i class="fa fa-eye"></i></a>
					@endif  
            </td>
        </tr>

@endforeach



    </table>
</div>