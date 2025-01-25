<?php 
include 'header.php'; 
include 'navbar.php';
include 'api/config.php';
?>

    <body>
<style>
    .owl-item .border{
        width: 100%;
        HEIGHT: 100%;
    }
    
</style>
        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Hero Start -->
        <div class="container-fluid py-5 mt-4 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">50% Discount</h4>
                        <h1 class="mb-5 display-3 text-primary">Happy New Year 2025</h1>
                        <!-- <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                        </div> -->
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="images/coneflower.webp" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <!-- <a href="#" class="btn px-4 py-2 text-white rounded">Sunflower</a> -->
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="images/i2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <!-- <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a> -->
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="images/i4.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <!-- <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a> -->
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-8 text-end">
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Flower Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Flowers List</h1>
                        </div>
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 130px;">Summer</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 130px;">Winter</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                        <span class="text-dark" style="width: 130px;">Monsoon</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                        <span class="text-dark" style="width: 130px;">Autumn</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                                        <span class="text-dark" style="width: 130px;">Spring</span>
                                    </a>
                                </li>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-6">
                                        <span class="text-dark" style="width: 130px;">All Season</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                            <?php

                            $query = "SELECT * FROM flowersales WHERE category='flowers' AND seasonal_flowers='summer' ";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    $flowername = $row['flowername'];
                                    $image = $row['image'];
                                    $id = $row['id'];
                                    $description = $row['description'];
                                    $category = $row['seasonal_flowers'];

                                    // Limit description to 50 characters
                                    $maxLength = 80;
                                    $shortDescription = strlen($description) > $maxLength 
                                        ? substr($description, 0, $maxLength) . '...' 
                                        : $description;
                                    
                                   
                                        echo '
                                        
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                     <a href="shop-detail.php?id='.$id.'&category='.$category.'">
                                                                        <div class="rounded position-relative fruite-item">
                                                                            <div class="fruite-img">
                                                                                <img src="images/'.$image.'" style="width:100px; height:160px;" class="img-fluid w-100 rounded-top" alt="">
                                                                            </div>
                                                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Summer</div>
                                                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                                <h4>'.$flowername.'</h4>
                                                                                <p>'.$shortDescription.'</p>
                                                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                                                    <p class="text-dark fs-5 fw-bold mb-0">Rs.'.$row['price'].'</p>
                                                                                <a href="#" 
                                                                                    class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart" 
                                                                                    data-product-id='.$id.' ?>" 
                                                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                                                 </a>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                           </a>
                                                                    </div>
                                                                 
                                    ';
                                
                                }
                            } else {
                                echo 'No images found in the table.';
                            }


                            
                            ?>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">

                            <?php

                            $query = "SELECT * FROM flowersales WHERE category='flowers' AND seasonal_flowers='winter' ";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    $flowername = $row['flowername'];
                                    $image = $row['image'];
                                    $id = $row['id'];
                                    $description = $row['description'];
                                    $category = $row['seasonal_flowers'];
                                    

                                    // Limit description to 50 characters
                                    $maxLength = 80;
                                    $shortDescription = strlen($description) > $maxLength 
                                        ? substr($description, 0, $maxLength) . '...' 
                                        : $description;
                                    
                                    

                                    echo '
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                         <a href="shop-detail.php?id='.$id.'&category='.$category.'">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="images/'.$image.'" style="width:100px; height:160px;" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">winter</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>'.$flowername.'</h4>
                                                    <p>'.$shortDescription.'</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs.'.$row['price'].'</p>
                                                        <a href="#" 
                                                            class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart" 
                                                            data-product-id='.$id.' ?>" 
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                              </a>
                                        </div>';
                                    }
                                } else {
                                    echo 'No images found in the table.';
                                }
    
    
                                
                                ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    <?php

                                        $query = "SELECT * FROM flowersales WHERE category='flowers' AND seasonal_flowers='monsoon' ";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                $flowername = $row['flowername'];
                                                $image = $row['image'];
                                                $id = $row['id'];
                                                $description = $row['description'];
                                                $category = $row['seasonal_flowers'];

                                                // Limit description to 50 characters
                                                $maxLength = 80;
                                                $shortDescription = strlen($description) > $maxLength 
                                                    ? substr($description, 0, $maxLength) . '...' 
                                                    : $description;
                                                

                                                echo '
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                          <a href="shop-detail.php?id='.$id.'&category='.$category.'">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="images/'.$image.'" style="width:100px; height:160px;" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">monsoon</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>'.$flowername.'s</h4>
                                                    <p>'.$shortDescription.'</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs.'.$row['price'].'</p>
                                                          <a href="#" 
                                                            class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart" 
                                                            data-product-id='.$id.' ?>" 
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>';
                                    }
                                } else {
                                    echo 'No images found in the table.';
                                }
    
    
                                
                                ?>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    <?php

                                        $query = "SELECT * FROM flowersales WHERE category='flowers' AND seasonal_flowers='autumn' ";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {

                                                $flowername = $row['flowername'];
                                                $image = $row['image'];
                                                $id = $row['id'];
                                                $description = $row['description'];
                                                $category = $row['seasonal_flowers'];

                                                // Limit description to 50 characters
                                                $maxLength = 80;
                                                $shortDescription = strlen($description) > $maxLength 
                                                    ? substr($description, 0, $maxLength) . '...' 
                                                    : $description;
                                                

                                                echo '
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                         <a href="shop-detail.php?id='.$id.'&category='.$category.'">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="images/'.$image.'" style="width:100px; height:160px;"  class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">autumn</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>'.$flowername.'</h4>
                                                    <p>'.$shortDescription.'</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs.'.$row['price'].'</p>
                                                          <a href="#" 
                                                            class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart" 
                                                            data-product-id='.$id.' ?>" 
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>';
                                    }
                                } else {
                                    echo 'No images found in the table.';
                                }
    
    
                                
                                ?>
                                     
                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    <?php

                                    $query = "SELECT * FROM flowersales WHERE category='flowers' AND seasonal_flowers='spring' ";
                                    $result = $conn->query($query);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                            $flowername = $row['flowername'];
                                            $image = $row['image'];
                                            $id = $row['id'];
                                            $description = $row['description'];
                                            $category = $row['seasonal_flowers'];

                                            // Limit description to 50 characters
                                            $maxLength = 80;
                                            $shortDescription = strlen($description) > $maxLength 
                                                ? substr($description, 0, $maxLength) . '...' 
                                                : $description;

                                            echo '
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                         <a href="shop-detail.php?id='.$id.'&category='.$category.'">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="images/'.$image.'" style="width:100px; height:160px;" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">spring</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>'.$flowername.'</h4>
                                                    <p>'.$shortDescription.'</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs.'.$row['price'].'</p>
                                                          <a href="#" 
                                                            class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart" 
                                                            data-product-id='.$id.' ?>" 
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        ';
                                    }
                                } else {
                                    echo 'No images found in the table.';
                                }
    
    
                                
                                ?>
                                     
                   
                    </div>
                </div>      
            </div>
        </div>
        
        <div id="tab-6" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    <?php

                                    $query = "SELECT * FROM flowersales WHERE category='flowers' AND seasonal_flowers='all season' ";
                                    $result = $conn->query($query);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                            $flowername = $row['flowername'];
                                            $image = $row['image'];
                                            $id = $row['id'];
                                            $description = $row['description'];
                                            $category = $row['seasonal_flowers'];

                                            // Limit description to 50 characters
                                            $maxLength = 80;
                                            $shortDescription = strlen($description) > $maxLength 
                                                ? substr($description, 0, $maxLength) . '...' 
                                                : $description;


                                            echo '
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                         <a href="shop-detail.php?id='.$id.'&category='.$category.'">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="images/'.$image.'" style="width:100px; height:160px;" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">all season</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>'.$flowername.'</h4>
                                                    <p>'.$shortDescription.'</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs.'.$row['price'].'</p>
                                                          <a href="#" 
                                                            class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart" 
                                                            data-product-id='.$id.' ?>" 
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        ';
                                    }
                                } else {
                                    echo 'No images found in the table.';
                                }
    
    
                                
                                ?>
                                     
                   
                    </div>
                </div>      
            </div>
        </div>
        <!-- Flower End-->


        <!-- Featurs Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-secondary rounded border border-secondary">
                                <img src="images/Jasmine.jpg" class="img-fluid rounded-top h-100 w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-primary text-center p-4 rounded">
                                        <h5 class="text-white">Fresh Flower</h5>
                                        <h3 class="mb-0">25% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <img src="images/Primrose.jpg" class="img-fluid rounded-top h-100 w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Make Moments Special </h5>
                                        <h3 class="mb-0">Free delivery</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-primary">
                                <img src="images/Crocus.jpg" class="img-fluid rounded-top h-100 w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-secondary text-center p-4 rounded">
                                        <h5 class="text-white">Delivery</h5>
                                        <h3 class="mb-0">2 Days</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs End -->


        <!-- Vesitable Shop Start-->
        <div class="container-fluid vesitable py-5">
            <div class="container py-5">
                <h1 class="mb-0">Flower Design</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">

                <?php

                        $query = "SELECT * FROM flowersales WHERE category='design'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $flowername = $row['flowername'];
                                $image = $row['image'];
                                $id = $row['id'];
                                $description = $row['description'];
                                $category = $row['seasonal_flowers'];
                                // Limit description to 50 characters
                                $maxLength = 80;
                                $shortDescription = strlen($description) > $maxLength 
                                    ? substr($description, 0, $maxLength) . '...' 
                                    : $description;

                                echo '
                            <div class="border border-primary rounded position-relative vesitable-item">
                             <a href="shop-detail.php?id='.$id.'&category='.$category.'">
                        <div class="vesitable-img">
                            <img src="images/'.$image.'" style="width:100px; height:160px;" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">'.$row['seasonal_flowers'].'</div>
                        <div class="p-4 rounded-bottom">
                            <h4>'.$flowername.' </h4>
                            <p>'.$shortDescription.'</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">Rs'.$row['price'].'.</p>
                                  <a href="#" 
                                                            class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart" 
                                                            data-product-id='.$id.' ?>" 
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                        </a>
                            </div>
                            </a>
                        </div>
                    </div>
                            ';
                        }
                        } else {
                        echo 'No images found in the table.';
                        }



                        ?>

                    
                    
                  
                </div>
            </div>
        </div>
        <!-- Vesitable Shop End -->

          <!-- Bestsaler Product Start -->
          <!-- <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Bestseller Products</h1>
                    <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/best-product-1.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/best-product-2.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/best-product-3.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/best-product-4.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/best-product-5.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/best-product-6.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Organic Tomato</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/fruite-item-1.jpg" class="img-fluid rounded" alt="">
                            <div class="py-4">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/fruite-item-2.jpg" class="img-fluid rounded" alt="">
                            <div class="py-4">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/fruite-item-3.jpg" class="img-fluid rounded" alt="">
                            <div class="py-4">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/fruite-item-4.jpg" class="img-fluid rounded" alt="">
                            <div class="py-2">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Bestsaler Product End -->

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script>
    $(document).ready(function () {
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            // Fetch data attributes
            const productId = $(this).data("product-id");
     

            // AJAX Request
            $.ajax({
                url: "api/add_to_cart.php", // Backend script to handle the request
                method: "POST",
                data: {
                    product_id: productId,
                    status: "added"
                },
                success: function (response) {
                    const result = typeof response === "string" ? JSON.parse(response) : response;

                if (result.status === "success") {
                    alert(result.message);
                } else {
                    alert("Failed to add to cart: " + result.message);
                }
                },
                error: function () {
                    alert("An error occurred while adding the product to the cart.");
                }
            });
        });
    });
</script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- <script>
            $(document).ready(function () {
                // Fetch cart count
                function fetchCartCount() {
                    console.log("Fetching cart count..."); // Log the start of the request
                    $.ajax({
                        url: "api/cart_count.php", // Backend script to get cart count
                        method: "GET",
                        success: function (response) {
                            console.log("Response received:", response); // Log the full response

                            if (response.status === "success") {
                                console.log("Cart count:", response.cart_count); // Log the cart count
                                $("#cart-count").text(response.cart_count); // Update the cart count
                                
                            } else {
                                console.error("Failed to fetch cart count:", response.message);
                                alert("Error: " + response.message); // Alert the error message
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX error:", status, error); // Log AJAX errors
                            alert("An error occurred while fetching cart count: " + error); // Alert the error
                        }
                    });
                }

                // Fetch count on page load
                fetchCartCount();

                // Periodically update cart count every 5 seconds
                setInterval(fetchCartCount, 5000);

                // Update count when a product is added
                $(".add-to-cart").click(function () {
                    console.log("Add-to-cart clicked"); // Log button click
                    fetchCartCount(); // Immediately refresh cart count after adding a product
                });
            });
    </script> -->

</html>
