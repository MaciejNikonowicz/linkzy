<div style="position:absolute;background-color:gray;justify-content:center;"> 
    <div class="text-3xl text-center">
        @if(session('message'))
            <div>
                {{ session('message') }}
            </div>
        @endif
        <a href="/" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Home Page
        </a>
    </div>
</div>
