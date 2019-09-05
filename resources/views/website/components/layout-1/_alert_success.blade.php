<div class="my-3">
    @if(Session::has('message'))
        <div id="successMessage" class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $slot }}
        </div>
    @endif
</div>