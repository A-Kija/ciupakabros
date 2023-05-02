<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order {{$order->id}}</title>
</head>
<body>
    <style>
        body {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            height: 200px;
            text-align: center;
            font-size: 30px;
            letter-spacing: 3px;
            color: white;
        }

    </style>
    
</body>

    <table>
    @foreach($products as $product)
    <tr>
    @foreach($product->color as $color)
    <td style="background-color:{{$color->hex}};">
        {{$color->title}}
    </td>
    @endforeach
    {!!str_repeat('<td></td>', 5 - $product->color->count())!!}
    </tr>  
    @endforeach

    </table>

</html>