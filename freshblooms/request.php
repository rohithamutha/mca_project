<?php 
include 'header.php'; 
include 'navbar.php';
?>
 <body>
    <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <form action="Order_Request.php" method="POST">
                        <div class="row g-4">
                            
                            <div class="col-12">
                                <div class="text-center mx-auto" style="max-width: 700px;">
                                    <h1 class="text-primary">Order Request </h1>
                                </div>
                            </div>
                            <div class="col-lg-7 mb-4">
                            
                                <input type="text" name="Flower&Design_name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Flower Name">            <div class="form-group">
                                <!-- <select
                                    class="form-select form-control-lg"
                                    id="largeSelect"
                                    name="Seasonal_Flower">
                                    <option value="summer">Summer</option>
                                    <option value="winter">Winter</option>s
                                    <option value="monsoon">Monsoon</option>
                                    <option value="spring">Spring</option>
                                    <option value="autumn">Autumn</option>
                                    <option value="all Season">All Season</option>
                                    <option value="birthday">Birthday</option>
                                    <option value="Wedding">Wedding</option>
                                </select> -->
                            </div>
                            <br>
                            <div class="col-lg-12 mb-4">
                                <textarea name="Description" class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Description"></textarea>
                            </div>
                            
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                        
                            </div>
                            <div class="col-lg-5">
                                <div class="d-flex p-4 rounded mb-4 bg-white">
                                    <i class="fas fa-user fa-2x text-primary me-4"></i>
                                    <div class="col-lg-10">
                                
                                    <input type="text" name="Name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Name">
                                
                                    </div>
                                </div>

                                <div class="d-flex p-4 rounded mb-4 bg-white">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                    <div class="col-lg-10">
                                
                                    <input type="text" name="Address" class="w-100 form-control border-0 py-3 mb-4" placeholder="Address"> 
                                    </div>
                                </div>
                            
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div class="col-lg-10">
                        
                                    <input type="text" name="Mobile_no" class="w-100 form-control border-0 py-3 mb-4" placeholder="Mobile_no"> 
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Contact End -->


   


       
        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</html>
