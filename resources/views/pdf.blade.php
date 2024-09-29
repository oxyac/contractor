<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .invoice-box {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #eee;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            Invoice
                        </td>
                        <td>
                            Invoice #: {{$invoice->id}}<br>
                            Created: {{$invoice->created_at->format('d/m/Y')}}<br>
                            Due: {{$invoice->due_date->format('d/m/Y')}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            {{$invoice->contract->fromEntity->name}}<br>
                            {{$invoice->contract->fromEntity->address}}<br>
                        </td>
                        <td>
                            {{$invoice->contract->toEntity?->name}}<br>
                            {{$invoice->contract->toEntity?->address}}<br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="details">
            <td>Bank Details</td>
            <td>{{$invoice->contract->fromEntity?->bank_details}}</td>
        </tr>
        <tr class="heading">
            <td>Item</td>
            <td>Quantity</td>
            <td>Price</td>
        </tr>
        <tr class="item">
            <td>{{$invoice->product_description}}</td>
            <td>{{$invoice->product_quantity}}</td>
            <td>{{$invoice->contract->currency}} {{$invoice->product_price}}</td>
        </tr>
        <tr class="total">
            <td></td>
            <td></td>
            <td>Total: {{$invoice->contract->currency}} {{$invoice->total}}</td>
        </tr>
    </table>
</div>
</body>
</html>
