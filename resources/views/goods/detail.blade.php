<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border 1>
        <tr>
            <td>{{$goods->goods_id}}</td>
            <td>{{$goods->goods_name}}</td>
            <td>{{$goods->goods_selfprice}}</td>
            <td>{{$goods->goods_marketprice}}</td>
            <td>{{$goods->goods_integral}}</td>
            <td>{{$goods->goods_num}}</td>
            <td>{{date("Y-m-d H:i:s",$goods->create_time)}}</td>
            <td><a href="/car/create?id={{$goods->goods_id}}&price={{$goods->goods_selfprice}}">加入购物车</a></td>
        </tr>
    </table>
</body>
</html>