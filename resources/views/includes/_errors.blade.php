@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="container">
            <div class="card-panel red-text red lighten-4" style="border-radius: 10px;">
                {{$error}}
            </div>
        </div>
    @endforeach
@endif