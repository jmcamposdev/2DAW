<!-- en resources/views/password/index.blade.php -->
<form action="{{ route('password.generate') }}" method="post">
  @csrf
  <label for="length">Longitud:</label>
  <input type="number" name="length" value="12" min="6" max="30">

  <label for="numbers">Incluir números:</label>
  <input type="checkbox" name="numbers">

  <label for="special_chars">Incluir caracteres especiales:</label>
  <input type="checkbox" name="special_chars">

  <button type="submit">Generar Contraseña</button>
</form>

@isset($password)
  <p>Contraseña generada: {{ $password }}</p>
@endisset
