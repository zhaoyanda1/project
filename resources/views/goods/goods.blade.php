<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border=1>
        <tr>
            <td>商品ID</td>
            <td>商品名称</td>
            <td>商品现价</td>
            <td>商品原价</td>
            <td>商品数量</td>
            <td>商品积分</td>
            <td>添加时间</td>
            <td>商品详情</td>
        </tr>
        @foreach($goods as $k=>$v)
        <tr>
            <td>{{$v->goods_id}}</td>
            <td>{{$v->goods_name}}</td>
            <td>{{$v->goods_selfprice}}</td>
            <td>{{$v->goods_marketprice}}</td>
            <td>{{$v->goods_num}}</td>
            <td>{{$v->goods_integral}}</td>
            <td>{{date("Y-m-d H:i:s",$v->create_time)}}</td>
            <td><a href="/goods/detail?id={{$v->goods_id}}">商品详情</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>