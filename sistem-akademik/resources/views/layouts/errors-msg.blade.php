@if(Session::has('errors'))
    @foreach(Session::pull('errors',[]) as $error)
        <div class="alert alert-{{ $error['type']  }} bg-{{ $error['type']  }} text-light border-0 alert-dismissible fade show" role="alert">
            {{ $error['message']  }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

