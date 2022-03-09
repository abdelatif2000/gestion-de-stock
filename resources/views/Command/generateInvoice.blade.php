<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>General Invoice - Koice</title>
        <meta name="author" content="harnishdesign.net" />
        <style>
            td{
                height: 40px;
            }
            table{
                width: 95%;
                margin: 0 auto;
                margin-top: 2rem;
                border: 1px solid #e7e9ed;
                border-radius: 14px;
                padding: 10px;
                background: white;
            }
        </style>
    </head>
    <body >
     <div style=" background:white ;height:100vh">
        <table>
            <thead>
                <tr>
                    <td
                    colspan="5"
                    >
                      <img  src="images/logo.jpg" width="60px"  alt="">
                        <span style="font-size: 1.75rem; display: inline-block;
                        float: right;">Invoice</span>
                           <p style="width: 100%;background-color:#e7e9ed;height:1px " ></p>
                    </td>
                </tr>
                <tr>
                    <td
                    colspan="5"
                    >
                        <span> <strong>Date :</strong>{{$result->created_at}}</span>
                        <span style=" display: inline-block;
                        float: right;"> <strong>Invoice No :</strong>{{$result->id}}</span>
                            <p style="width: 100%;background-color:#e7e9ed;height:1px " ></p>
                    </td>
                </tr>
                <tr>
                    <td   colspan="5" style="margin-bottom: 5px; padding:20px; " >
                       <div   style="float:left;" > <strong>Pay To:</strong>
                           <address>
                           Company Name: {{$infoCompany[0]->name}}  <br>
                           webSite : {{$infoCompany[0]->website}}<br>
                           Telephone :{{$infoCompany[0]->tel}}<br>
                            Email:    {{$infoCompany[0]->email}}
                           </address>
                         </div>
                         <div style="float:right" > <strong>Invoiced To:</strong>
                           <address>
                          FirstName and LastName :{{$result->client->firstName. ' '  .$result->client->lastName}}<br>
                          Email :{{$result->client->email}}   <br>
                          Telephone :{{$result->client->tel}}  <br>
                            Address :{{$result->client->address}} <br>
                           </address>
                         </div>
                         <div style="clear: both "></div>
                    </td>
                   </tr>
                <tr  style="background-color: #e7e9ed;height:40px" >
                    <td><strong>#</strong></td>
                    <td><strong>Product Name  </strong></td>
                    <td><strong> Price </strong></td>
                    <td><strong>Quantity</strong></td>
                    <td><strong>Amount</strong></td>
                </tr>
            </thead>    
            <tbody>
                @php
                       $i=0;
                        $total_price=0;
                @endphp
                    @foreach ($result->products as $item){
                        <tr style="height: 50px;" >
                            <td> {{  $i++}} </td>
                            <td>{{$item->product->name }}</td>
                            <td>${{$item->price }}</td>
                            <td>{{$item->quantity}}</td>
                            <td>${{ $item->price * $item->quantity }}</td>
                        </tr>
                        @php(  $total_price+=$item->price * $item->quantity)
                     }
                     @endforeach
        
            </tbody>
            <tfoot>
                <tr  style="background:#e7e9ed;height " colspan="5" >
                    <td>
                        <strong>Total:</strong>
                    </td>
                    <td>${{$total_price}}</td>
                </tr>
            </tfoot>
        </table> 
     </div>
    </body>
</html>
