<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            font-size: 14px;
            color: #333;
            background-color: #f9f9f9;
        }
        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .invoice-info {
            text-align: right;
        }
        .details-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .coustomer-info, .delivery-info {
            flex-basis: 49%;
        }
        .info-box {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #808080;
        }
        .info-box h3{
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .total-calculation {
            max-width: 50%;
            margin-left: auto;
        }
        .final-total {
            font-weight: bold;
            font-size: 1.2em;
            border-top: 2px solid #333;
        }
        .thankyou {
            text-align: center;
            margin: 30px 0;
            font-style: italic;
            font-weight: bold;
        }
        footer {
            text-align: center;
            border-top: 1px solid #808080;
        }
        @media print {
            .print-hide {
            display: none;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <div class="company-info">
                <h2>eShop</h2>
                <p>Road #5, Dokkhingaon, <br/> khilgaon, Dhaka-1260 <br/> <strong>Phone: </strong>017xxxxxxxx, <br/> <strong>Email: </strong>eShop@example.com</p>
            </div>
            <div class="invoice-info">
                <h4>Invoice</h4>
                <p>
                    <strong>Invoice No: </strong>#3424234 <br/>
                    <strong>Order Id</strong> #4574546456 <br/>
                    <strong>Order date</strong> 10 Aug 2025 <br/>
                </p>
            </div>
        </div>
        <div class="details-container">
            <div class="coustomer-info">
                <div class="info-box">
                    <h3>Coustomer Info</h3>
                    <p>
                        <strong>Name: </strong>Md. Jobbar Ali <br>
                        <strong>Phone: </strong>0177xxxxxxxxxxx <br>
                        <strong>Address: </strong>Dholuabari, Kochakata-5660 <br>
                        Nageswari, Kurigram.
                    </p>
                </div>
            </div>
            <div class="delivery-info">
                <div class="info-box">
                    <h3>Payment Info</h3>
                    <p>
                        <strong>Payment Status:</strong> Paid <br>
                        <strong>Payment Method:</strong> Bkash <br>
                        <strong>Transaction Id:</strong> E6JKTO3439B <br>
                        <strong>Note:</strong> E6JKTO3439B <br>
                    </p>
                </div>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Products</th>
                    <th class="text-right">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-right">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>A Good Quality Laptop</td>
                    <td class="text-right">52000</td>
                    <td class="text-center">1</td>
                    <td class="text-right">52000</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A Good Quality Mobile</td>
                    <td class="text-right">2500</td>
                    <td class="text-center">1</td>
                    <td class="text-right">2500</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A Good Quality Camera</td>
                    <td class="text-right">3700</td>
                    <td class="text-center">1</td>
                    <td class="text-right">3800</td>
                </tr>
            </tbody>
        </table>
        <div class="total-calculation">
            <table>
                <tr>
                    <td><strong>Sub Total</strong></td>
                    <td class="text-right">1,15,000</td>
                </tr>
                <tr>
                    <td><strong>Discount</strong></td>
                    <td class="text-right">150</td>
                </tr>
                <tr>
                    <td><strong>Vat</strong></td>
                    <td class="text-right">50</td>
                </tr>
                <tr>
                    <td><strong>Delevery Charge</strong></td>
                    <td class="text-right">120</td>
                </tr>
                <tr class="final-total">
                    <td><strong>Total Payable</strong></td>
                    <td class="text-right"><strong>1,15,320</strong></td>
                </tr>
            </table>
        </div>
        <div class="thankyou">
            <p>Thank you very much for purchasing our products!</p>
        </div>
        <footer>
            <p>This invoice is computer generated and legally valid without signature.</p>
            <p>For questions or inquiries, contact: support@amardokan.com | 09638-XXXXXX (9 AM - 11 PM)</p>
        </footer>
        <div class="print-hide" style="text-align: center; margin-top: 30px;">
            <button onclick="window.print()" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Print</button>
        </div>
    </div>
</body>
</html>
