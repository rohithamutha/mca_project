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
              <!-- <h3 class="fw-bold mb-3">Forms</h3> -->
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
                  <a href="#">Product Detials</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Add Product</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
              <form action="../api/add_product.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Form Elements</div>
                  </div>
                  <div class="card-body">
                  
                    <div class="row">
                      <div class="col-md-12 col-lg-6">
                        <div class="form-group">
                          <label for="email2">Flower&Design Name</label>
                          <input type="text"
                            class="form-control"
                            id="flowername"
                            placeholder="Flower&Design Name" 
                            name="flowername"
                          />
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Flower&Design Image</label>
                          <input
                            type="file"
                            class="form-control-file"
                            id="image"
                            name="img[]"
                            multiple
                          />
                        </div>
                        <div class="form-group">
                          <label for="price">Price</label>
                          <input
                            type="text"
                            class="form-control"
                            id="price"
                            placeholder="Enter Price"
                            name="price"
                          />
                        </div>
                        <div class="form-group">
                          <label for="Description">Description</label>
                          <textarea name="description" class="form-control" id="Discription" rows="5">
                          </textarea>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-6">
                        <div class="form-group">
                          <label for="Offer">Offer</label>
                          <input
                            type="Offer"
                            class="form-control"
                            id="Offer"
                            placeholder=" Offer "
                            name="offer"
                          />
                        
                        </div>
                        <div class="form-group">
                          <label for="Delivery">Delivery</label>
                          <input
                            type="Delivery"
                            class="form-control"
                            id="Delivery"
                            placeholder="Delivery"
                            name="Delivery"
                          />
                        </div>
                        <div class="form-group">
                          <label for="Delivery">Seasonal Flowers&Designs</label>
                          <select
                            class="form-select form-control-lg"
                            id="largeSelect"
                            name="Seasonal_Flower"
                          >
                            <option value="summer">Summer</option>
                            <option value="winter">Winter</option>s
                            <option value="monsoon">Monsoon</option>
                            <option value="spring">Spring</option>
                            <option value="autumn">Autumn</option>
                            <option value="all Season">All Season</option>
                            <option value="birthday">Birthday</option>
                            <option value="Wedding">Wedding</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="largeSelect">Category</label>
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
                    </div>
                 
                  </div>
                  <div class="card-action">
                    <button  type="submit" class="btn btn-success">Submit</button>
                    <!-- <button class="btn btn-danger">Cancel</button> -->
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>
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
