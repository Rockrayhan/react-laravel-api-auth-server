<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        @foreach ($products as $item)
            <li> <b> Name: </b> {{$item->name}} <br>
             <b> Stock: </b>{{$item->stock}} <br>
             <b> Price: </b>{{$item->price}} <br>
             <br>
            </li>
        @endforeach
    </ul>
</body>
</html>