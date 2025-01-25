<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Fresh Blooms</title>
  <meta
    content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    name="viewport" />
  <link
    rel="icon"
    href="../images/i1.png"
    type="image/png" />

  <!-- Fonts and icons -->
  <script src="assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["assets/css/fonts.min.css"],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/plugins.min.css" />
  <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="assets/css/demo.css" />
</head>

<body>


  <div class="wrapper">
    <?php include('sidebar.php'); ?>

    <div class="main-panel">


      <?php include('header.php'); ?>

      <div class="container">
        <div class="page-inner">

          <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
              <h3 class="fw-bold mb-3">Flower Blooms</h3>
              <h6 class="op-7 mb-2">Admin Panel</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
              <a href="manage_product.php" class="btn btn-label-info btn-round me-2">Manage</a>
              <a href="add_product.php" class="btn btn-primary btn-round">Add Product</a>
            </div>
          </div>

          <!-- Admin Panel -->
          <div class="row">
            <?php

            include '../api/config.php'; // Database connection

            try {
              // Fetch cart count
              $query = "SELECT count(product_id) AS cart_count FROM cart WHERE status = 'Delivering';";
              $stmt = $conn->prepare($query);
              $stmt->execute();
              $result = $stmt->get_result();
              $row = $result->fetch_assoc();

              $pending = $row['cart_count'] ?? 0; // Default to 0 if no rows found

            } catch (Exception $e) {
              echo 'something went wrong';
            }

            try {
              // Fetch cart count
              $query = "SELECT count(product_id) AS cart_count FROM cart WHERE status !='added' ;";
              $stmt = $conn->prepare($query);
              $stmt->execute();
              $result = $stmt->get_result();
              $row = $result->fetch_assoc();

              $total = $row['cart_count'] ?? 0; // Default to 0 if no rows found

            } catch (Exception $e) {
              echo 'something went wrong';
            }
            try {
              // Fetch cart count
              $query = "SELECT count(product_id) AS cart_count FROM cart WHERE status = 'Delivered';";
              $stmt = $conn->prepare($query);
              $stmt->execute();
              $result = $stmt->get_result();
              $row = $result->fetch_assoc();
              $delivered = $row['cart_count'] ?? 0; // Default to 0 if no rows found
              $stmt->close();
              $conn->close();
            } catch (Exception $e) {
              echo 'something went wrong';
            }
            ?>



            <div class="col-sm-6 col-md-4">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-secondary bubble-shadow-small">
                        <i class="far fa-check-circle"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Total Orders</p>
                        <h4 class="card-title"><?php echo $total; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-warning bubble-shadow-small">
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Pending Orders</p>
                        <h4 class="card-title"><?php echo $pending; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-success bubble-shadow-small">
                        <i class="fas fa-luggage-cart"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Delivered</p>
                        <h4 class="card-title"><?php echo $delivered; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                    <div class="col-icon">
                      <div class="icon-big text-center icon-danger bubble-shadow-small">
                          <i class="far fa-times-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Cancel Orders</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
          </div>
          <!-- End Admin Panel -->

          <!-- Table 1 -->
          <div class="row">
            <div class="col-md-12">
              <div class="card card-round" style="height: calc(100% - 500px); overflow-y: scroll;">
                <div class="card-header">
                  <div class="card-head-row card-tools-still-right">
                    <h4 class="card-title">Order Details</h4>

                  </div>
                  <p class="card-category">
                    Pending Order List
                  </p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="table-responsive table-hover table-sales">
                        <table class="table">
                          <thead style="text-align:center;">
                            <tr>
                              <td>Product</td>
                              <td>Product Name</td>
                              <td>Customer Name</td>
                              <td>Mobile No</td>
                              <td>Status</td>
                              <td>Action</td>
                              <td>More</td>
                            </tr>
                          </thead>
                          <tbody style="text-align:center;">
                            <?php
                            include('../api/config.php');

                            $query = $query = " SELECT 
                                c.cid, 
                                c.quantity, 
                                c.status,
                                f.price, 
                                f.flowername, 
                                f.image, 
                                ud.firstname,
                                ud.mobile
                            FROM 
                                cart c
                            JOIN 
                                flowersales f ON c.product_id = f.id
                            JOIN
                                finalpayment  ud ON c.user_id = ud.user_id
                            WHERE 
                                c.status = 'Delivering' OR c.status = 'Delivered' OR c.status = 'cancelled'
                            ORDER BY 
                                CASE 
                                    WHEN c.status = 'Delivering' THEN 1
                                    WHEN c.status = 'Delivered' THEN 2
                                    WHEN c.status = 'cancelled' THEN 3
                                END";

                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {

                                $flowername = $row['flowername'];
                                $image = $row['image'];
                                $cid = $row['cid'];
                                $price = $row['price'];
                                $quantity = $row['quantity'];
                                $phone = $row['mobile'];
                                $username = $row['firstname'];
                                $status = $row['status'];
                                $total = $price * $quantity;

                                echo '
                              <tr>
                                <td>
                                  <div class="flag">
                                    <img
                                      src="../images/' . $image . '"
                                      alt="product image" style="width:30px; height:30px;"
                                    />
                                  </div>
                                </td>
                                <td>' . $flowername . '</td>
                                
                                <td>' . $username . '</td>
                                <td>' . $phone . '</td>
                                <td>' . $status . '</td>
                                <td>
                                    <div class="btn-group">
                                      <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Order Status
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../api/update_order.php?cid=' . $cid . '&status=Delivered">Delivered</a></li>
                                        <li><a class="dropdown-item" href="../api/update_order.php?cid=' . $cid . '&status=Delivering">Delivering </a></li>
                                      </ul>
                                    </div>
                                </td>
                                <td>
                                  <button class="btn btn-icon btn-link op-8 me-1 view-details-btn" data-bs-toggle="modal" data-bs-target="#userModal" data-id="' . $cid . '">
                                    <i class="fas fa-clipboard"></i>
                                  </button>
                                </td>

                              </tr>
                              ';
                              }
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Table 1 -->

          <!-- Table 2 -->
          <div class="row" style="margin-top:-400px;">
            <div class="col-md-4">
              <div class="card card-round">
                <div class="card-body">
                  <div class="card-head-row card-tools-still-right">
                    <div class="card-title">New Requests</div>
                    <div class="card-tools">
                      <div class="dropdown">


                      </div>
                    </div>
                  </div>

                  <div class="card-list py-4" id="order-list">

                  </div>
                  <!-- Order Request Model  -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form>
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Flower name:</label>
                              <input type="text" class="form-control" id="flower-name">
                            </div>
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Name:</label>
                              <input type="text" class="form-control" id="receptient-name">
                            </div>
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Address:</label>
                              <input type="text" class="form-control" id="address">
                            </div>
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Mobile.no:</label>
                              <input type="text" class="form-control" id="mobile-no">
                            </div>
                            <div class="mb-3">
                              <label for="message-text" class="col-form-label">Description:</label>
                              <textarea class="form-control" id="description"></textarea>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Accept</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end model -->

                  <!--User Order Details Model  -->
                  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Order Details</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="mb-3">
                              <label for="product-name" class="col-form-label">Product name:</label>
                              <input type="text" class="form-control" id="product-name" readonly>
                            </div>
                            <div class="mb-3">
                              <label for="user-name" class="col-form-label">Name:</label>
                              <input type="text" class="form-control" id="user-name" readonly>
                            </div>
                            <div class="mb-3">
                              <label for="user-address" class="col-form-label">Address:</label>
                              <input type="text" class="form-control" id="user-address" readonly>
                            </div>
                            <div class="mb-3">
                              <label for="user-mobile-no" class="col-form-label">Mobile.no:</label>
                              <input type="text" class="form-control" id="user-mobile-no" readonly>
                            </div>
                            <div class="mb-3">
                              <label for="user-amount" class="col-form-label">Amount:</label>
                              <input type="text" class="form-control" id="user-amount" readonly>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end model -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card card-round" style="    height: calc(100% - 62px);
                  overflow-y: scroll;">
                <div class="card-header">
                  <div class="card-head-row card-tools-still-right">
                    <div class="card-title">Transaction History</div>
                    <div class="card-tools">
                      <div class="dropdown">
                        <!-- <button
                          class="btn btn-icon btn-clean me-0"
                          type="button"
                          id="dropdownMenuButton"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="fas fa-ellipsis-h"></i>
                        </button> -->
                        <!-- <div
                          class="dropdown-menu"
                          aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center mb-0">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Payment Number</th>
                          <th scope="col">Order/Date</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include('../api/config.php');

                        $query = $query = " SELECT * FROM finalpayment ";

                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {

                            $payment_id = $row['payment_id'];
                            $created = $row['created_at'];
                            $total = $row['total_amount'];
                            $date = new DateTime($created);

                            // Add 2 days
                            // $date->modify('+2 days');

                            // Format the updated date back to a string
                            $new_date = $date->format('D, j M');

                            echo '
                                    <tr>
                                      <th scope="row">
                                        <button
                                          class="btn btn-icon btn-round btn-success btn-sm me-2"
                                        >
                                          <i class="fa fa-check"></i>
                                        </button>
                                        Payment from #' . $payment_id . '
                                      </th>
                                      <td>' . $new_date . '</td>
                                      <td>₹' . $total . '</td>
                                      <td>
                                        <span class="badge badge-success">Completed</span>
                                      </td>
                                    </tr>
                                    ';
                          }
                        }
                        ?>



                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Table 2 -->
        </div>
      </div>

    </div>

  </div>



  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery-3.7.1.min.js"></script>

  <script>
    $(document).ready(function() {
      // Load order requests on page load
      $.ajax({
        url: '../api/fetch_orders.php', // Backend script to fetch orders
        method: 'GET',
        success: function(response) {
          $('#order-list').html(response); // Append fetched orders to the list
        },
        error: function() {
          alert('Failed to fetch orders.');
        },
      });

      // Show extra details in modal
      $(document).on('click', '.btn-link', function() {
        const orderId = $(this).data('id'); // Get the unique ID of the order
        $.ajax({
          url: '../api/fetch_order_details.php', // Backend script to fetch order details
          method: 'POST',
          data: {
            id: orderId
          },
          success: function(response) {
            const details = JSON.parse(response); // Parse the response JSON
            $('#exampleModalLabel').text('Order Details for ' + details.flower_design_name);
            $('#flower-name').val(details.flower_design_name);
            $('#description').val(details.description);
            $('#receptient-name').val(details.name);
            $('#address').val(details.address);
            $('#mobile-no').val(details.mobile_no);

          },
          error: function() {
            alert('Failed to fetch order details.');
          },
        });
      });
    });
  </script>

  <!-- Single Order Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const modal = document.getElementById("userModal");

      // Attach click event listener to all view-details buttons
      document.querySelectorAll(".view-details-btn").forEach((button) => {
        button.addEventListener("click", function() {
          const orderId = this.getAttribute("data-id");

          // Fetch order details from the server
          fetch(`../api/fetch_single_order.php?cid=${orderId}`)
            .then((response) => response.json())
            .then((data) => {
              // Populate the modal with data
              document.getElementById("product-name").value = data.flowername;
              document.getElementById("user-name").value = data.firstname;
              document.getElementById("user-address").value = data.address || "N/A";
              document.getElementById("user-mobile-no").value = data.mobile;
              document.getElementById("user-amount").value = data.total;
            })
            .catch((error) => console.error("Error fetching order details:", error));
        });
      });
    });
  </script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

  <!-- Chart JS -->
  <script src="assets/js/plugin/chart.js/chart.min.js"></script>

  <!-- jQuery Sparkline -->
  <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

  <!-- Chart Circle -->
  <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

  <!-- Datatables -->
  <script src="assets/js/plugin/datatables/datatables.min.js"></script>

  <!-- Bootstrap Notify -->
  <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!-- jQuery Vector Maps -->
  <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
  <script src="assets/js/plugin/jsvectormap/world.js"></script>

  <!-- Sweet Alert -->
  <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

  <!-- Kaiadmin JS -->
  <!-- <script src="assets/js/kaiadmin.min.js"></script> -->

  <!-- Kaiadmin DEMO methods, don't include it in your project! -->
  <!-- <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script> -->

</body>

</html>