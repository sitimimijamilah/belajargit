<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ayam Bakar - Receipt - SaleID : {{$sale->id}}</title>
  <link type="text/css" rel="stylesheet" href="{{asset('/css/receipt.css')}}" media="all" >
  <link type="text/css" rel="stylesheet" href="{{asset('/css/no-print.css')}}" media="print" >
</head>
<body>
  <div id="wrapper">
    <div id="receipt-header">
      <h3 id="resturant-name">Ayam Bakar Mbah Uti</h3>
      <p>Alamat : Jalan Logam</p>
      <p>Depan SMK YAPIKA</p>
      <p>Tel: 473-XXXX-XXXX</p>
      <p>Reference Receipt: <strong>{{$sale->id}}</strong></p>
    </div>
    <div id="receipt-body">
      <table class="tb-sale-detail">
        <thead>
          <tr>
            <th>#</th>
            <th>Menu</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($saleDetails as $saleDetail)
            <tr>
              <td width="30">{{$saleDetail->menu_id}}</td>
              <td width="180">{{$saleDetail->menu_name}}</td>
              <td width="50">{{$saleDetail->quantity}}</td>
              <td width="55">{{$saleDetail->menu_price}}</td>
              <td width="65">{{$saleDetail->menu_price * $saleDetail->quantity}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <table class="tb-sale-total">
        <tbody>
          <tr>
            <td>Total Quantity</td>
            <td>{{$saleDetails->count()}}</td>
            <td>Total</td>
            <td>{{number_format($sale->total_price, 2)}}</td>
          </tr>
          <tr>
            <td colspan="2">Pembayaran</td>
            <td colspan="2">{{$sale->payment_type}}</td>
          </tr>
          <tr>
            <td colspan="2">Jumlah Pembayaran</td>
            <td colspan="2">{{number_format($sale->total_recieved, 2)}}</td>
          </tr>
          <tr>
            <td colspan="2">Kembali</td>
            <td colspan="2">{{number_format($sale->change, 2)}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="receipt-footer">
      <p>Thank You!!!</p>
    </div>
    <div id="buttons">
      <a href="/cashier">
        <button class="btn btn-back">
          Back to Cashier
        </button>
      </a>
      <button class="btn btn-print" type="button" onclick="window.print(); return false;">
        Print
      </button>
    </div>
  </div>
</body>
</html>