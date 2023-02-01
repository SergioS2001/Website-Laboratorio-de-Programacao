<!DOCTYPE html>
<html>

<head>
    <title>Fatura com dados do cliente</title>
</head>

<body>

  <h1>{{$title}}</h1>

  <p>{{$data}}</p>

   <h>Order Detail</h>

                            @foreach($order as $item)
                                    <p>User ID: {{ $item->user_id}}</p>
                                    <p>Preço: {{ $item-> total_price}}</p>
                                    <p>Primeiro Nome: {{ $item-> fname}}</p>
                                    <p>Ultimo Nome: {{ $item-> lname}}</p>
                                    <p>Email: {{ $item-> email}}</p>
                                    <p>Contacto: {{ $item-> phone}}</p>
                                    <p>Morada 1: {{ $item-> address1}}</p>
                                    <p>Morada 2: {{ $item-> address2}}</p>
                                    <p>Cidade: {{ $item-> city}}</p>
                                    <p>Estado: {{ $item-> state}}</p>
                                    <p>Pais: {{ $item-> country}}</p>
                                    <p>Código-Postal: {{ $item-> pincode}}</p>
                                    <p>Status: {{ $item-> status}}</p>
                                    <p>Mensagem: {{ $item-> message}}</p>
                                    <p>Tracking Number: {{ $item-> tracking_no}}</p>

                                @endforeach
                           
</body>

</html>

