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
            <td>商品id</td>
            <td>价格</td>
            <td>数量</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        @foreach($car_list as $k=>$v)
            @if($v['is_del'] == 1)
                <tr>
                    <td>{{$v['goods_id']}}</td>
                    <td>{{$v['goods_selfprice'] * $v['buy_number']}}</td>
                    <td>{{$v['buy_number']}}</td>
                    <td>{{date("Y-m-d H:i:s",$v['create_time'])}}</td>
                    <td><a href="/car/delete?id={{$v['goods_id']}}">删除</a></td>
                </tr>
            @else
                <tr>
                    <td>{{$v['goods_id']}}</td>
                    <td>{{$v['goods_selfprice'] * $v['buy_number']}}</td>
                    <td>{{$v['buy_number']}}</td>
                    <td>已下架</td>
                    <td><a href="/car/delete?id={{$v['goods_id']}}">删除</a></td>
                </tr>
            @endif
        @endforeach
    </table>
    <form action="/order/create" method="get">
        <table border 1>
            <tr>
                <td>总价</td>
                <td>{{$price}}</td>
            </tr>
            <tr>
                <td><input type="hidden" name='price' value="{{$price}}"></td>
                <td><button>提交订单</button></td>
            </tr>
        </table>
    </form>
</body>
</html>