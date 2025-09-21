<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ইউজার ড্যাশবোর্ড</title>
    <!-- Bootstrap 3 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Custom CSS for Bengali font and styling -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
        }
        .container-fluid {
            max-width: 1200px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .panel {
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .panel-heading {
            border-bottom: 1px solid #ddd;
            background-color: #f5f5f5;
        }
        .nav-pills > li > a {
            border-radius: 5px;
            color: #555;
        }
        .nav-pills > li.active > a,
        .nav-pills > li.active > a:hover,
        .nav-pills > li.active > a:focus {
            color: #fff;
            background-color: #337ab7;
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid #ddd;
            margin-bottom: 10px;
        }
        .dashboard-card {
            padding: 20px;
            text-align: center;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <h1 class="page-header text-center">ইউজার ড্যাশবোর্ড</h1>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="https://placehold.co/100x100" alt="Profile Picture" class="profile-img img-circle">
                        <h4>রাহিম খান</h4>
                        <ul class="nav nav-pills nav-stacked" id="dashboard-tabs">
                            <li class="active"><a href="#overview" data-toggle="tab">ওভারভিউ</a></li>
                            <li><a href="#my-orders" data-toggle="tab">আমার অর্ডারসমূহ</a></li>
                            <li><a href="#profile" data-toggle="tab">আমার প্রোফাইল</a></li>
                            <li><a href="#wishlist" data-toggle="tab">পছন্দের তালিকা</a></li>
                            <li><a href="#payment-history" data-toggle="tab">পেমেন্ট হিস্টরি</a></li>
                            <li><a href="#notifications" data-toggle="tab">নোটিফিকেশনস</a></li>
                            <li><a href="#settings" data-toggle="tab">সেটিংস</a></li>
                            <li><a href="#support" data-toggle="tab">সাপোর্ট</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- 1. Overview / Summary -->
                    <div class="tab-pane fade in active" id="overview">
                        <div class="row">
                            <h2 class="col-xs-12">স্বাগতম, রাহিম!</h2>
                            <div class="col-sm-6 col-md-3">
                                <div class="dashboard-card bg-primary text-white">
                                    <h3>১০</h3>
                                    <p>মোট অর্ডার</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="dashboard-card bg-warning text-white">
                                    <h3>২</h3>
                                    <p>পেন্ডিং অর্ডার</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="dashboard-card bg-success text-white">
                                    <h3>৮</h3>
                                    <p>ডেলিভারড অর্ডার</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="dashboard-card bg-info text-white">
                                    <h3>৳১২,৩৫০</h3>
                                    <p>মোট খরচ</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">সাম্প্রতিক অর্ডারসমূহ</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>অর্ডার আইডি</th>
                                                <th>তারিখ</th>
                                                <th>স্ট্যাটাস</th>
                                                <th>মোট মূল্য</th>
                                                <th>অ্যাকশন</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#৯৮৭৬৫০৪</td>
                                                <td>৩ সেপ্টেম্বর, ২০২৪</td>
                                                <td><span class="label label-warning">প্রসেসিং</span></td>
                                                <td>৳১,৫০০</td>
                                                <td><a href="#order-details" data-toggle="tab" data-order-id="9876504">বিস্তারিত দেখুন</a></td>
                                            </tr>
                                            <tr>
                                                <td>#৯৮৭৬৫০৩</td>
                                                <td>১ সেপ্টেম্বর, ২০২৪</td>
                                                <td><span class="label label-success">ডেলিভারড</span></td>
                                                <td>৳৪৫০</td>
                                                <td><a href="#order-details" data-toggle="tab" data-order-id="9876503">বিস্তারিত দেখুন</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. My Orders -->
                    <div class="tab-pane fade" id="my-orders">
                        <h2 class="page-header">আমার অর্ডারসমূহ</h2>
                        <div class="well">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default active" onclick="filterOrders('all')">সব</button>
                                <button type="button" class="btn btn-default" onclick="filterOrders('pending')">পেন্ডিং</button>
                                <button type="button" class="btn btn-default" onclick="filterOrders('delivered')">ডেলিভারড</button>
                                <button type="button" class="btn btn-default" onclick="filterOrders('cancelled')">ক্যান্সেলড</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>অর্ডার আইডি</th>
                                        <th>তারিখ</th>
                                        <th>স্ট্যাটাস</th>
                                        <th>মোট মূল্য</th>
                                        <th>অ্যাকশন</th>
                                    </tr>
                                </thead>
                                <tbody id="order-list"></tbody>
                            </table>
                        </div>
                    </div>

                    <!-- 3. Order Details Page (Dynamic) -->
                    <div class="tab-pane fade" id="order-details">
                        <h2 class="page-header">অর্ডার বিস্তারিত <small id="order-id-display"></small></h2>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p><strong>তারিখ:</strong> <span id="order-date"></span></p>
                                <p><strong>স্ট্যাটাস:</strong> <span id="order-status-badge" class="label"></span></p>
                                <hr>
                                <h4>প্রোডাক্টস</h4>
                                <ul class="list-group" id="product-list"></ul>
                                <hr>
                                <h4>ডেলিভারি ঠিকানা</h4>
                                <address id="shipping-address"></address>
                                <hr>
                                <h4>পেমেন্ট</h4>
                                <p><strong>পদ্ধতি:</strong> <span id="payment-method"></span></p>
                                <p><strong>স্ট্যাটাস:</strong> <span id="payment-status"></span></p>
                                <hr>
                                <button class="btn btn-primary">ইনভয়েস ডাউনলোড করুন</button>
                            </div>
                        </div>
                    </div>

                    <!-- 4. My Profile -->
                    <div class="tab-pane fade" id="profile">
                        <h2 class="page-header">আমার প্রোফাইল</h2>
                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <img src="https://placehold.co/150x150" alt="Profile Picture" class="img-thumbnail img-circle">
                                <h3>রাহিম খান</h3>
                                <p><strong>ইমেইল:</strong> jondoe@example.com</p>
                                <p><strong>ফোন:</strong> +৮৮০ ১৯০০ ১১২৩৪৪</p>
                                <p><strong>ঠিকানা:</strong> ১২৩, ধানমন্ডি, ঢাকা, বাংলাদেশ</p>
                                <button class="btn btn-success">প্রোফাইল এডিট করুন</button>
                            </div>
                        </div>
                    </div>

                    <!-- 5. Wishlist -->
                    <div class="tab-pane fade" id="wishlist">
                        <h2 class="page-header">পছন্দের তালিকা</h2>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail text-center">
                                    <img src="https://placehold.co/200x200" alt="Product Image">
                                    <div class="caption">
                                        <h4>টি-শার্ট</h4>
                                        <p>৳৮৫০</p>
                                        <p><a href="#" class="btn btn-primary" role="button">কার্টে যোগ করুন</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail text-center">
                                    <img src="https://placehold.co/200x200" alt="Product Image">
                                    <div class="caption">
                                        <h4>স্মার্টওয়াচ</h4>
                                        <p>৳৩,২০০</p>
                                        <p><a href="#" class="btn btn-primary" role="button">কার্টে যোগ করুন</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 6. Payment History -->
                    <div class="tab-pane fade" id="payment-history">
                        <h2 class="page-header">পেমেন্ট হিস্টরি</h2>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>পেমেন্ট আইডি</th>
                                        <th>তারিখ</th>
                                        <th>পদ্ধতি</th>
                                        <th>অ্যামাউন্ট</th>
                                        <th>স্ট্যাটাস</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#১০০১</td>
                                        <td>৩০ আগস্ট, ২০২৪</td>
                                        <td>বিকাশ</td>
                                        <td>৳১,৫০০</td>
                                        <td><span class="label label-success">পেইড</span></td>
                                    </tr>
                                    <tr>
                                        <td>#১০০২</td>
                                        <td>২৮ আগস্ট, ২০২৪</td>
                                        <td>নগদ</td>
                                        <td>৳৪৫০</td>
                                        <td><span class="label label-success">পেইড</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- 7. Notifications -->
                    <div class="tab-pane fade" id="notifications">
                        <h2 class="page-header">নোটিফিকেশনস</h2>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">আপনার অর্ডার #৯৮৭৬৫০৪ শিপ করা হয়েছে!</h4>
                                <p class="list-group-item-text text-muted">৫ মিনিট আগে</p>
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">আপনার পেমেন্ট সম্পন্ন হয়েছে।</h4>
                                <p class="list-group-item-text text-muted">১ ঘন্টা আগে</p>
                            </a>
                        </div>
                    </div>

                    <!-- 8. Settings -->
                    <div class="tab-pane fade" id="settings">
                        <h2 class="page-header">সেটিংস</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">পাসওয়ার্ড পরিবর্তন</h3>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <div class="form-group">
                                        <label for="current_password">বর্তমান পাসওয়ার্ড</label>
                                        <input type="password" class="form-control" id="current_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">নতুন পাসওয়ার্ড</label>
                                        <input type="password" class="form-control" id="new_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">পাসওয়ার্ড নিশ্চিত করুন</label>
                                        <input type="password" class="form-control" id="confirm_password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">পাসওয়ার্ড আপডেট করুন</button>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">ঠিকানা ব্যবস্থাপনা</h3>
                            </div>
                            <div class="panel-body">
                                <p>হোম এবং অফিস ঠিকানা আলাদা করে রাখুন।</p>
                                <button class="btn btn-success">ঠিকানা যোগ/এডিট করুন</button>
                            </div>
                        </div>
                    </div>

                    <!-- 9. Support / Help -->
                    <div class="tab-pane fade" id="support">
                        <h2 class="page-header">সাপোর্ট / হেল্প</h2>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p>আপনার যদি কোনো জিজ্ঞাসা বা সমস্যা থাকে, তবে আমাদের সাপোর্ট টিমের সাথে যোগাযোগ করতে পারেন।</p>
                                <button class="btn btn-primary">একটি নতুন টিকেট তৈরি করুন</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        const ordersData = [
            { id: '9876504', date: '৩ সেপ্টেম্বর, ২০২৪', status: 'প্রসেসিং', total_amount: '৳১,৫০০', payment: { method: 'বিকাশ', status: 'পেইড' }, shipping_address: '১২৩, ধানমন্ডি, ঢাকা, বাংলাদেশ', products: [{ name: 'টি-শার্ট', qty: 2, price: 750, subtotal: 1500 }] },
            { id: '9876503', date: '১ সেপ্টেম্বর, ২০২৪', status: 'ডেলিভারড', total_amount: '৳৪৫০', payment: { method: 'নগদ', status: 'পেইড' }, shipping_address: '১২৩, ধানমন্ডি, ঢাকা, বাংলাদেশ', products: [{ name: 'বই', qty: 1, price: 450, subtotal: 450 }] },
            { id: '9876502', date: '২৯ আগস্ট, ২০২৪', status: 'ডেলিভারড', total_amount: '৳১,২০০', payment: { method: 'ক্যাশ অন ডেলিভারি', status: 'পেইড' }, shipping_address: '১২৩, ধানমন্ডি, ঢাকা, বাংলাদেশ', products: [{ name: 'কফি মগ', qty: 4, price: 300, subtotal: 1200 }] },
            { id: '9876501', date: '২৭ আগস্ট, ২০২৪', status: 'ক্যান্সেলড', total_amount: '৳৪,০০০', payment: { method: 'বিকাশ', status: 'পেইড' }, shipping_address: '১২৩, ধানমন্ডি, ঢাকা, বাংলাদেশ', products: [{ name: 'ঘড়ি', qty: 1, price: 4000, subtotal: 4000 }] }
        ];

        function getStatusLabel(status) {
            switch (status) {
                case 'প্রসেসিং': return 'label-warning';
                case 'ডেলিভারড': return 'label-success';
                case 'ক্যান্সেলড': return 'label-danger';
                default: return 'label-default';
            }
        }

        function renderOrders(orders) {
            const orderListTable = $('#my-orders #order-list');
            orderListTable.empty();
            orders.forEach(order => {
                const statusLabel = getStatusLabel(order.status);
                const row = `
                    <tr>
                        <td>#${order.id}</td>
                        <td>${order.date}</td>
                        <td><span class="label ${statusLabel}">${order.status}</span></td>
                        <td>${order.total_amount}</td>
                        <td><a href="#order-details" data-toggle="tab" data-order-id="${order.id}">বিস্তারিত দেখুন</a></td>
                    </tr>
                `;
                orderListTable.append(row);
            });
        }

        function filterOrders(status) {
            $('#my-orders .btn-group button').removeClass('active');
            $(`button[onclick="filterOrders('${status}')"]`).addClass('active');

            if (status === 'all') {
                renderOrders(ordersData);
            } else {
                const statusMap = {
                    'pending': 'প্রসেসিং',
                    'delivered': 'ডেলিভারড',
                    'cancelled': 'ক্যান্সেলড'
                };
                const filteredOrders = ordersData.filter(order => order.status === statusMap[status]);
                renderOrders(filteredOrders);
            }
        }

        $('#dashboard-tabs a').on('click', function(e) {
            e.preventDefault();
            const targetId = $(this).attr('href');
            if (targetId === '#order-details') {
                const orderId = $(this).data('order-id');
                viewOrderDetails(orderId);
            }
            $(this).tab('show');
        });

        function viewOrderDetails(orderId) {
            const order = ordersData.find(o => o.id === orderId);
            if (!order) return;

            $('#order-id-display').text(`#${order.id}`);
            $('#order-date').text(order.date);
            $('#order-status-badge').removeClass().addClass(`label ${getStatusLabel(order.status)}`).text(order.status);

            const productList = $('#product-list');
            productList.empty();
            order.products.forEach(product => {
                const productItem = `
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-left">
                                <img src="https://placehold.co/80x80" alt="${product.name}" class="media-object" style="width:80px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">${product.name}</h4>
                                <p>পরিমাণ: ${product.qty} | মূল্য: ৳${product.price} | মোট: ৳${product.subtotal}</p>
                            </div>
                        </div>
                    </li>
                `;
                productList.append(productItem);
            });

            $('#shipping-address').text(order.shipping_address);
            $('#payment-method').text(order.payment.method);
            $('#payment-status').text(order.payment.status);

            // Navigate to the order details tab
            $('#dashboard-tabs a[href="#order-details"]').tab('show');
        }

        // Initial rendering
        $(document).ready(function() {
            renderOrders(ordersData);
        });
    </script>
</body>
</html>

