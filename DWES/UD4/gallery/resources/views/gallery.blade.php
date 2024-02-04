<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

  </head>
  <body class="antialiased">
    <div class="container">
      <h1>Upload All You Images</h1>
      <form method="POST" enctype="multipart/form-data" action="{{url('/save')}}" class="image__form">
        @csrf
        <label for="image">Select Image</label>
        <input type="file" name="image_src" id="image" accept="image/*">
        <input class="button" type="submit" value="Upload">
      </form>
      @error('image_src')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      <div class="image-gallery">
        @if (count($images) == 0)
          <h2>No Images Uploaded</h2>
        @endif
        @php
          $chunks = array_chunk($images, ceil(count($images) / 3)); // Dividir el array en grupos según el número de columnas
        @endphp
        @foreach ($chunks as $chunk)
          <div class="column">
            @foreach ($chunk as $image)
              <div class="image__container">
                <a href="{{ asset("images/".$image) }}">
                  <img src="{{ asset("images/".$image) }}" class="img-fluid" alt="Imagen">
                </a>
                <a class="download__button" href="{{ asset("images/".$image) }}" download="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#f7f2e2" d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11l-5 5Zm-6 4q-.825 0-1.413-.588T4 18v-3h2v3h12v-3h2v3q0 .825-.588 1.413T18 20H6Z"/></svg>
                </a>
              </div>
              
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
  </body>
</html>
