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
              <img src="{{ asset("images/".$image) }}" class="img-fluid" alt="Imagen">
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
  </body>
</html>
