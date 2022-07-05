<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suma</title>
</head>

<body>
  @if($result <= 10) <h1>Sveiki</h1>
    <h1 style="color: green">{{$result}}</h1>
    @else
    <h1>Sveikuoliai</h1>
    <h1 style="color: red">{{$result}}</h1>
    @endif
    
    
    @for ($i = 0; $i < 10; $i++) <div>{{$i}}</div>

      @endfor
</body>

</html>