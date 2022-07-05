<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  @if($result !== '')
  <h1>Result: {{$result}}</h1>
  @endif
  <form action="{{route('skaiciuokle')}}" method="post">
    <input type="text" name="x" placeholder="X value">
    <input type="text" name="y" placeholder="Y value">
    @csrf
    {{-- <input type="text" name="csrf" value=""> --}}
    <button type="submit">Atimti</button>
  </form>
</body>

</html>