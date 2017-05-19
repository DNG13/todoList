@if(count($errors))
<div class="form-group">
    <div class="alert alert-danger" >
            @foreach($errors->all() as $error)
            <p class="text-center">{{$error}}</p>
            @endforeach
    </div>
</div>
@endif