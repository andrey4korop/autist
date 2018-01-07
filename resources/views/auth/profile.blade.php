@extends('layouts.lay')

@section('content')
    <form class="form_login" method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
        <h3 class="">Register</h3>
        {{ csrf_field() }}
        <p class="label">Ім'я</p>
        <input type="text" name="name" value="{{ $user->name }}" required autofocus>

        <p class="label">Електронна пошта</p>
        <input type="email" name="email" value="{{ $user->email }}" required>

        {{--<p class="label">Електронна пошта</p>
        <input type="email" name="email" value="{{ $user->profile->name }}">
--}}
        <p class="label">Електронна пошта</p>
        <input type="text" name="surname" value="{{ $user->profile->surname }}">
<div id="output"><img class="thumb" src="{{$user->profile->avatar}}"/></div>
        <p class="label">Електронна пошта</p>
        <input id="image" type="file" name="avatar" value="{{ $user->profile->avatar }}">


        <button type="submit">Реестрація</button>
    </form>
@endsection

@push('scripts')
<script>
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object

        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) {

            // Only process image files.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function(theFile) {
                return function(e) {
                    // Render thumbnail.
                    var span = document.createElement('span');
                    span.innerHTML = ['<img class="thumb" src="', e.target.result,
                                                '" title="', theFile.name, '"/>'].join('');
                        $('#output').html(span);
                };
            })(f);

            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
    }

    $('#image').on('change', handleFileSelect);
</script>
@endpush
