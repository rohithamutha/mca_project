<?php 
session_start();
include 'header.php'; 
include 'navbar.php';
?>

    <body>

        


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Billing details</h1>
                <form action="#">
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-6">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">First Name<sup>*</sup></label>
                                        <input type="text" id="firstname" name="first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Last Name<sup>*</sup></label>
                                        <input type="text" id="lastname" name="last_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Address <sup>*</sup></label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="House Number Street Name">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Town/City<sup>*</sup></label>
                                <input type="text" id="city"  name="town" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Country<sup>*</sup></label>
                                <input type="text" id="country" name="country" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                                <input type="text" id="pincode" name="zipcode" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Mobile<sup>*</sup></label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email Address<sup>*</sup></label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            
                            
                        </div>
                        
                        <?php
                            include('api/config.php');

                            $id = $_SESSION["id"];

                            $query = "SELECT c.cid, c.quantity, f.price, f.flowername, f.image FROM cart c JOIN flowersales f ON c.product_id = f.id WHERE c.user_id = $id AND c.status='added'";
                            $result = $conn->query($query);

                            $subtotal = 0; // Initialize subtotal
                            $shipping_charges = 50; // Set shipping charges
                        ?>

        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Products</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $flowername = $row['flowername'];
                        $image = $row['image'];
                        $cid = $row['cid'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];

                        $total = $price * $quantity; // Calculate total for this row
                        $subtotal += $total; // Add to subtotal

                        echo '
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="images/' . $image . '" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                    </div>
                                </th>
                                <td class="py-5">' . $flowername . '</td>
                                <td class="py-5">₹' . $price . '</td>
                                <td class="py-5">' . $quantity . '</td>
                                <td class="py-5">₹' . $total . '</td>
                            </tr>
                        ';
                    }
                } else {
                    echo '<tr><td colspan="5">No data found in the table.</td></tr>';
                }

                $final_total = $subtotal + $shipping_charges; // Calculate final total
                ?>
                <tr>
                    <th scope="row"></th>
                    <td class="py-5"></td>
                    <td class="py-5"></td>
                    <td class="py-5">
                        <p class="mb-0 text-dark py-3">Subtotal</p>
                    </td>
                    <td class="py-5">
                        <div class="py-3 border-bottom border-top">
                            <p class="mb-0 text-dark">₹<?php echo $subtotal; ?></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td class="py-0">
                        <p class="mb-0 text-dark py-0">Shipping Charges</p>
                    </td>
                    <td class="py-0">
                        <div class="form-check text-start">
                            <label class="form-check-label" for="Shipping-2">₹<?php echo $shipping_charges; ?></label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td class="py-5">
                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                    </td>
                    <td class="py-5"></td>
                    <td class="py-5"></td>
                    <td class="py-5">
                        <div class="py-3 border-bottom border-top">
                            <p class="mb-0 text-dark">₹<?php echo $final_total; ?></p>
                        </div>
                    </td>
                </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                    <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary buy_now">Place Order</button>
                </div>
            </div>

                                    
                    </div>
                </form>
            </div>
        </div>
 


       
        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        $('body').on('click', '.buy_now', function (e) {
            e.preventDefault();

            // Collect data from form fields
            var totalAmount = <?php echo $final_total; ?>; // Replace with PHP variable for total amount
            var userId = <?php echo $_SESSION['id']; ?>; // User ID from session
            var productDetails = <?php 
                $productDetails = [];
                $result->data_seek(0); // Reset query result pointer
                while ($row = $result->fetch_assoc()) {
                    $productDetails[] = [
                        'product_id' => $row['cid'],
                        'product_name' => $row['flowername'],
                        'price' => $row['price'],
                        'quantity' => $row['quantity']
                    ];
                }
                echo json_encode($productDetails);
            ?>;

            // Collect additional user details
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var address = $('#address').val();
            var city = $('#city').val();
            var country = $('#country').val();
            var pincode = $('#pincode').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();

            if (!firstname || !lastname || !address || !city || !country || !pincode || !mobile || !email) {
                alert("Please fill in all required fields.");
                return;
            }

            var options = {
                "key": "rzp_test_N4vNKGSBfWjcln", // Replace with your Razorpay key
                "amount": (totalAmount * 100), // Convert to paise
                "currency": "INR",
                "name": "Fresh Blooms",
                "description": "Order Payment",
                "image": "images/flower.png",
                "handler": function (response) {
                    $.ajax({
                        url: 'paymentbk.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            razorpay_payment_id: response.razorpay_payment_id,
                            total_amount: totalAmount,
                            user_id: userId,
                            product_details: JSON.stringify(productDetails),
                            firstname: firstname,
                            lastname: lastname,
                            address: address,
                            city: city,
                            country: country,
                            pincode: pincode,
                            mobile: mobile,
                            email: email
                        },
                        success: function (response) {
                            if (response.status === "success") {
                                window.location.href = 'complete_order.php';
                            } else {
                                alert("Payment failed. Please try again.");
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            alert("An error occurred. Please try again.");
                        }
                    });
                },
                "theme": {
                    "color": "#528FF0"
                }
            };

            var rzp1 = new Razorpay(options);
            rzp1.open();
        });
    </script>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>