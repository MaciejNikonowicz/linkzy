<div class="container">
    @if(session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif
</div>