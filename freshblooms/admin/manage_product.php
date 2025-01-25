<?php include('../api/config.php')?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Fresh Blooms</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="../images/i1.png"
      type="image/png"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
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
      
    <?php include('sidebar.php');?>
      <div class="main-panel">
     
      <?php include('header.php');?>

      <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <!-- <h3 class="fw-bold mb-3">DataTables.Net</h3> -->
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Product Details</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Manage Product</a>
                </li>
              </ul>
            </div>
            <div class="row">

      <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Add Row</h4>
                      <button
                        class="btn btn-primary btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal"
                      >
                        <i class="fa fa-plus"></i>
                        Add Row
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <!-- Modal -->
                    <div
                      class="modal fade"
                      id="addRowModal"
                      tabindex="-1"
                      role="dialog"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-0">
                            <h5 class="modal-title">
                              <span class="fw-mediumbold">Update</span>
                              <span class="fw-light">Flower</span>
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method="POST" action="../api/update_flower.php" enctype="multipart/form-data">
                          <div class="modal-body">
                            <p class="small">
                              Create a new row using this form, make sure you
                              fill them all
                            </p>
                            
                              <div class="row">
                                <div class="col-sm-6 col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input type="hidden" name=id>
                                    <input
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      name="flowername"
                                      placeholder="Name"
                                    />
                                  </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                  <div class="form-group form-group-default">
                                  <label>Category</label>
                                            <select
                                      class="form-select form-control-lg"
                                      id="largeSelect"
                                      name="Category"
                                    >
                                      <option value="flowers">Flowers</option>
                                      <option value="design">Design</option>
                                
                                    </select>
                                 </div>
                                </div>
                                <div class="col-md-6 pe-0">
                                  <div class="form-group form-group-default">
                                    <label>Image</label>
                                    <input id="addPosition" type="file" class="form-control" name="image" />
                                    <img id="imagePreview" style="width: 50px; height: 50px;" />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Price</label>
                                    <input
                                      id="addOffice"
                                      type="text"
                                      class="form-control"
                                      name="Price"
                                      placeholder="Price"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Offer</label>
                                    <input
                                      id="addOffice"
                                      type="text"
                                      class="form-control"
                                      name="Offer"
                                      placeholder="Offer"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Delivery</label>
                                    <input
                                      id="addOffice"
                                      type="text"
                                      class="form-control"
                                      name="Delivery"
                                      placeholder="Delivery"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group form-group-default">
                                    <label>Season</label>
                                    <select
                                      class="form-select form-control-lg"
                                      id="largeSelect"
                                      name="Seasonal_Flower"
                                    >
                                      <option value="summer">Summer</option>
                                      <option value="winter">Winter</option>
                                      <option value="monsoon">Monsoon</option>
                                      <option value="spring">Spring</option>
                                      <option value="autumn">Autumn</option>
                                      <option value="All Season">All Season</option>
                                      <option value="Birthday">Birthday</option>
                                      <option value="Wedding">Wedding</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                                     <div class="col-sm-12 col-md-12">
                                      <div class="form-group form-group-default">
                                        <label>Description</label>
                                        <input
                                          id="addOffice"
                                          type="text"
                                          class="form-control"
                                          name="Description"
                                          placeholder="Description"
                                          height=300px;
                                        />
                                      </div>
                                    </div>
                            
                          </div>
                          <div class="modal-footer border-0">
                            <button
                              type="submit"
                              id="addRowButton"
                              class="btn btn-primary"
                            >
                              Update
                            </button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>  
                            <th>Offer</th>
                            <th>Delivery</th>
                            <th>season</th>
                     
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                      
                        <tbody>
                        <?php
                                try {
                                    $query = "SELECT * FROM flowersales";
                                    $result = $conn->query($query);

                                    // successful
                                    if (!$result) {
                                        throw new Exception("Query Execution Failed: " . $conn->error);
                                    }

                                    // if any rows are returned
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $image = htmlspecialchars($row['image']); // Sanitize output
                                            echo '
                          
                                <tr>
                                   
                                   <td>' . htmlspecialchars($row['flowername']) . '</td>
                                    <td>' . htmlspecialchars($row['category']) . '</td>
                                     <td><img style="width:50px; height:50px;" src="../images/' . htmlspecialchars($row['image']) . '" alt=""></td>
                                    <td>' . htmlspecialchars($row['price']) . '</td>
                                    <td>' . htmlspecialchars($row['offer']) . '</td>
                                    <td>' . htmlspecialchars($row['delivary']) . '</td>
                                   
                                    <td>' . htmlspecialchars($row['seasonal_flowers']) . '</td>
                       
                                     <td>
                                        <div class="form-button-action">
                                          <button
                                            type="button"
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addRowModal"
                                            data-id = "' . htmlspecialchars($row['id']) . '"
                                            onclick="editFlower(this)"

                                          >
                                            <i class="fa fa-edit"></i>
                                          </button>
                                          <button
                                              type="button"
                                              data-bs-toggle="tooltip"
                                              class="btn btn-link btn-danger"
                                              data-original-title="Remove"
                                              data-id="' . htmlspecialchars($row['id']) . '"
                                              onclick="deleteFlower(this)">
                                              <i class="fa fa-times"></i>
                                          </button>

                                        </div>
                                      </td>
                                    
                                    ';
                                        }
                                    } else {
                                        echo "<option value=''>No Data Found</option>";
                                    }
                                } catch (Exception $e) {
                                    // Handle exceptions and display an error message
                                    echo "<option value=''>Error: Unable to fetch data</option>";
                                    error_log($e->getMessage()); // Log the error for debugging purposes
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


    <script>
      function editFlower(button) {
          const flowerId = button.getAttribute("data-id");

          fetch(`../api/select_flower.php?id=${flowerId}`)
              .then(response => response.json())
              .then(response => {
                  if (response.success) {
                      const data = response.data;
                      document.querySelector('input[name="id"]').value = data.id;
                      document.querySelector('input[name="flowername"]').value = data.flowername;
                      document.querySelector('select[name="Category"]').value = data.category;
                      document.querySelector('input[type="file"]').dataset.previousImage = data.image;
                      document.querySelector('input[name="Price"]').value = data.price;
                      document.querySelector('input[name="Offer"]').value = data.offer;
                      document.querySelector('input[name="Delivery"]').value = data.delivary;
                      document.querySelector('select[name="Seasonal_Flower"]').value = data.seasonal_flowers;
                      document.querySelector('input[name="Description"]').value = data.description;
                      document.querySelector('#imagePreview').src = `../images/${data.image}`;
                  } else {
                      alert("Failed to fetch flower details.");
                  }
              })
              .catch(error => {
                  console.error("Error fetching flower details:", error);
                  alert("An error occurred while fetching flower details.");
              });
      }
    </script>
    <script>
        
      function deleteFlower(button) {
    const flowerId = button.getAttribute("data-id");

    // Confirm before deletion
    if (!confirm("Are you sure you want to delete this flower?")) {
        return;
    }

    fetch(`../api/delete_flower.php?id=${flowerId}`)
        .then(response => response.json())
        .then(response => {
            if (response.success) {
                alert("Flower deleted successfully.");
                // Remove the button's parent element (adjust as per your HTML structure)
                button.closest("tr").remove(); // Assuming each flower is in a table row
            } else {
                alert(response.message || "Failed to delete the flower.");
            }
        })
        .catch(error => {
            console.error("Error deleting flower:", error);
            alert("An error occurred while deleting the flower.");
        });
}

    </script>

 <!--   Core JS Files   -->
 <script src="assets/js/core/jquery-3.7.1.min.js"></script>
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

    <!-- Google Maps Plugin -->
    <script src="assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo2.js"></script>
  </body>
</html>

