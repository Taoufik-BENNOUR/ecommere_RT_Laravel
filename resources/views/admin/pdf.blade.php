<!doctype html>
<html lang="en">
<base href="/public">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <style>

/* Header styles */
#header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 2px solid #ccc;
}

.barcode {
    width: 150px; /* Ensure barcode fits well */
}

.document-title {
    font-size: 18px;
    font-weight: bold;
}

/* Footer styles */
#footer {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    padding: 10px;
    border-top: 1px solid #ccc;
}

/* Document styles */
#document {
    padding: 20px;
}

/* Metadata table styles */
#metadata {
    margin-bottom: 20px;
}

#metadata table {
    width: 100%;
    border-collapse: collapse;
}

#metadata th {
    text-align: left;
    padding: 5px 10px;
    border-bottom: 1px solid #ccc;
}

#metadata td {
    padding: 5px 10px;
}

/* Address styles */
#address {
    margin-bottom: 20px;
}

/* Content styles */
.content {
    margin-top: 20px;
}

/* Purchase order remarks */
.purchaseorder-remarks {
    margin-bottom: 15px;
}

.purchaseorder-remarks-heading {
    font-weight: bold;
}

/* Products table styles */
.products {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.products th, .products td {
    padding: 8px 10px;
    border: 1px solid #ccc;
    text-align: left;
}

.products th {
    background-color: #f2f2f2;
}

.right {
    text-align: right;
}

/* Total row styles */
tfoot tr {
    font-weight: bold;
}
    </style>
</head>
<body>
    <div id="header">
        <div class="barcode barcode-purchaseorder">
            <img width="150px" src="{{public_path('img/logo.png')}}">
        </div>
        <div class="document-title">Purchase Order {{$order->id}}</div>
    </div>

    <div id="footer">
        <div class="page-number"></div>
    </div>

    <div id="document">
        <div id="documenthead">
            <div id="metadata">
                <table>
                    <tr class="metadata-purchaseorderid">
                        <th>Purchase Order</th>
                        <td>{{$order->id}}</td>
                    </tr>
                    <tr class="metadata-date">
                        <th>Date</th>
                        <?php
                        $date = new DateTime($order->created_at);
                        $formattedDate = $date->format('m-d-y');
                        $expectedDeliveryDate = (clone $date)->modify('+7 days')->format('m-d-y');
                        ?>
                        <td>{{$formattedDate}}</td>
                    </tr>
                    <tr class="metadata-delivery-date">
                        <th>Expected Delivery Date</th>
                        <td>{{$expectedDeliveryDate}}</td>
                    </tr>
                    <tr class="metadata-supplier-orderid">
                        <th>Order Status</th>
                        <td>{{$order->payment_status}}</td>
                    </tr>
                </table>
              </div>
              <div id="address">
                 Company RT,
              </div>
          </div>

          <div class="content">
              <div class="purchaseorder-remarks">
                  <div class="purchaseorder-remarks-heading">Name</div>
                  <div>{{$user->name}}</div>
              </div>
              <div class="purchaseorder-remarks">
                  <div class="purchaseorder-remarks-heading">Address</div>
                  <div>{{$user->address}}</div>
              </div>

              <div id="products" class="products">
                  <table>
                      <thead>
                      <tr>
                          <th class="column-productcode-supplier">Supplier</th>
                          <th class="column-productcode">Product Code</th>
                          <th class="column-name">Name</th>
                          <th class="right column-amount">Amount</th>
                          <th class="right column-price">Price</th>
                          <th class="right column-total-price">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order_detail as $order_info )
                    <tr>
                            <td class="column-productcode-supplier">RT Shop</td>
                            <td class="column-productcode">{{$order_info->id}}</td>
                            <td class="">{{$order_info->product_title}}</td>
                            <td class="right column-amount">{{$order_info->quantity}}</td>
                            <td class="right column-price">{{$order_info->price}}</td>
                            <td class="right column-total-price">{{$order_info->total}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" class="align-right"><strong>Total:</strong></td>
                        <td class="column-price">${{ $order->total_price }}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="template-custom-html-end"></div>
        </div>
    </div>
</body>
</html>
</html>