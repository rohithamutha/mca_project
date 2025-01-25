<?php 
include 'header.php'; 
include 'navbar.php';
session_start();
?>

    <body>

        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                
                                <th scope="col">Address</th>
                                <th scope="col">Placed On</th>
                                <th scope="col">Order Status </th>
                                <th scope="col">Order Cancel </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('api/config.php');

                                $id = $_SESSION["id"];

                                $query = "
                                SELECT 
                                    c.cid, 
                                    c.quantity, 
                                    c.status,
                                    f.price, 
                                    f.flowername, 
                                    f.image, 
                                    fp.address, 
                                    fp.created_at
                                FROM 
                                    cart c
                                JOIN 
                                    flowersales f 
                                    ON c.product_id = f.id
                                JOIN 
                                    finalpayment fp 
                                    ON c.user_id = fp.user_id
                                WHERE 
                                    c.user_id = $id 
                                    AND (c.status = 'Delivering' OR c.status = 'Delivered' OR c.status = 'cancelled')
                                    ORDER BY 
                                    CASE 
                                        WHEN c.status = 'Delivering' THEN 1 
                                        WHEN c.status = 'Delivered' THEN 2 
                                        ELSE 3 
                                    END, 
                                    c.cid; -- Add secondary sorting if needed, like by `cid`
                               
                            ";
                            
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        $flowername = $row['flowername'];
                                        $image = $row['image'];
                                        $cid = $row['cid'];  // Renamed from $id to $cid for clarity
                                        $price = $row['price'];
                                        $quantity = $row['quantity'];
                                        $address= $row['address'];
                                        $created_at = $row['created_at'];
                                        $order_status = $row['status'];

                                        // Create a DateTime object from the string
                                        $date = new DateTime($created_at);

                                        // Add 2 days
                                        $date->modify('+2 days');

                                        // Format the updated date back to a string
                                        $new_date = $date->format('l, j M');

                                        

                                        $total = $price * $quantity;  // Calculate total amount

                                        echo '
                                        <tr data-id="'.$cid.'">
                                            <th scope="row">
                                                <div class="d-flex align-items-center">
                                                    <img src="images/'.$image.'" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                                </div>
                                            </th>
                                            <td>
                                                <p class="mb-0 mt-4">'.$flowername.'</p>
                                            </td>
                                             <td>
                                                <p class="mb-0 mt-4 total-price">Rs.'.$total.'</p>
                                            </td>
                                            
                                            <td>
                                                <div class="input-group quantity mt-4" style="width: 100px;">
                                                    
                                                    <input type="text" class="form-control form-control-sm text-center border-0 quantity-input" value="'.$quantity.'" data-price="'.$price.'" data-total="'.$total.'">
                                                   
                                                </div>
                                            </td>
                                           
                                            <td>
                                                <p class="mb-0 mt-4">'.$address.'</p>
                                            </td> 
                                            <td>
                                                <p class="mb-0 mt-4">'.$new_date.'</p>
                                            </td>';?>
                                            <?php 
                                            if ($order_status == 'Delivering') {
                                                echo '<td>
                                                        <button class="btn btn-md rounded-1 border bg-light border mt-4">
                                                            <i>Order Placed</i>
                                                        </button>
                                                      </td>
                                                      <td>
                                                        <button class="btn btn-danger mt-4" onclick="cancelOrder(' . $cid . ')">Cancel Order</button>
                                                      </td>
                                                      </tr>';
                                            } else if ($order_status == 'Delivered') {
                                                echo '<td>
                                                        <button class="btn btn-md rounded-1 border bg-light border mt-4">
                                                            <i>Delivered</i>
                                                        </button>
                                                      </td>
                                                      <td>
                                                        <button class="btn btn-success mt-4">Success</button>
                                                      </td>
                                                      </tr>';
                                            }else if ($order_status == 'cancelled') {
                                                echo '<td>
                                                        <button class="btn btn-md rounded-1 border bg-light border mt-4">
                                                            <i>Cancelled</i>
                                                        </button>
                                                      </td>
                                                      <td>
                                                        <button class="btn btn-primary mt-4">Cancelled</button>
                                                      </td>
                                                      </tr>';
                                            }
                                            
                                            

                                        
                                            ?>
                                        <?php
                                    }
                                } else {
                                    echo '<tr>
                                            <td colspan="8" class="text-center">
                                                <p class="mb-0 mt-4">No Order...</p>   
                                            </td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
             
                
            </div>
        </div>
        <!-- Cart Page End -->

        <script>
            // Event listener for the plus button
            document.querySelectorAll('.btn-plus').forEach(button => {
                button.addEventListener('click', function () {
                    const row = this.closest('tr');  // Get the closest table row
                    const quantityInput = row.querySelector('.quantity-input');
                    const price = parseFloat(quantityInput.getAttribute('data-price'));
                    const quantity = parseInt(quantityInput.value);  // Get the current quantity value

                    const total = price * (quantity + 1);  // Calculate the new total by increasing quantity by 1
                    row.querySelector('.total-price').innerText = 'Rs.' + total.toFixed(2);  // Update the total display
                });
            });

            // Event listener for the minus button
            document.querySelectorAll('.btn-minus').forEach(button => {
                button.addEventListener('click', function () {
                    const row = this.closest('tr');  // Get the closest table row
                    const quantityInput = row.querySelector('.quantity-input');
                    const price = parseFloat(quantityInput.getAttribute('data-price'));
                    const quantity = parseInt(quantityInput.value);  // Get the current quantity value

                    if (quantity > 1) {  // Ensure quantity doesn't go below 1
                        const total = price * (quantity - 1);  // Calculate the new total by decreasing quantity by 1
                        row.querySelector('.total-price').innerText = 'Rs.' + total.toFixed(2);  // Update the total display
                    }
                });
            });

        </script>    

        <!-- Include SweetAlert2 Library -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- delete cart -->
        <script>
            // Event listener for the delete button
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const cid = this.getAttribute('data-id'); // Get the product ID from the data-id attribute

                    // Show SweetAlert confirmation
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to delete this item from your cart?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, keep it',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to delete_cart.php and pass the id as a parameter
                            window.location.href = 'api/delete_cart.php?id=' + cid;
                        }
                    });
                });
            });
        </script>

        <!-- update cart -->
        <script>
            document.getElementById('proceed-checkout').addEventListener('click', function () {
                const rows = document.querySelectorAll('tbody tr');
                const updatedData = [];

                // Loop through each row to gather updated data
                rows.forEach(row => {
                    const cid = row.getAttribute('data-id'); // Get the cart ID
                    const quantityInput = row.querySelector('.quantity-input');
                    const quantity = parseInt(quantityInput.value); // Get the updated quantity
                    const total = parseFloat(row.querySelector('.total-price').innerText.replace('Rs.', '').trim()); // Get the updated total

                    updatedData.push({ cid, quantity, total });
                });

                // Send the updated data to the server
                fetch('api/update_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(updatedData),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Redirect to the checkout page after successful update
                            window.location.href = 'checkout.php';
                        } else {
                            alert('Failed to update cart. Please try again.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });

        </script>

        <!-- cancel order -->
        <script>
            function cancelOrder(productId) {
                if (confirm("Are you sure you want to cancel this order for product ID " + productId + "?")) {
                    fetch('api/cancelorder.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ product_id: productId }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Order canceled successfully!");
                            window.location.href = 'complete_order.php';
                            // Optionally remove the row for the canceled product
                            document.getElementById('product-row-' + productId).remove();
                        } else {
                            alert("Failed to cancel order: " + data.error);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
                }
            }
        </script>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</html>