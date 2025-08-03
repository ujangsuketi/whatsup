@if (strlen(auth()->user()->update_url)>5)
    <div class="card-footer py-4">
        <a href="{{ auth()->user()->update_url }}" target="_blank" class="btn btn-warning">{{__('Update subscription')}}</a>
    </div>  
@endif
