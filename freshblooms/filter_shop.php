<?php 
include 'header.php';
include 'navbar.php';
?>

   


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh blooms</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                               
                            </div>
                            <div class="col-6"></div>
                            <!-- <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Default Sorting:</label>
                                    <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                        <option value="volvo">Flowers</option>
                                        <option value="saab">Design</option>
                                       
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Season</h4>
                                            <?php
                                        include('api/config.php');

                                        // Query to fetch seasonal flowers and their count
                                        $query = "SELECT seasonal_flowers, COUNT(*) as count FROM flowersales GROUP BY seasonal_flowers";
                                        $result = $conn->query($query);

                                        // Check if the query returned rows
                                        if ($result->num_rows > 0) {
                                            echo '<ul class="list-unstyled fruite-categorie">';
                                            while ($row = $result->fetch_assoc()) {
                                                $season = htmlspecialchars($row['seasonal_flowers']); // Sanitize output
                                                $count = (int)$row['count']; // Ensure count is an integer
                                                echo '
                                                    <li>
                                                        <div class="d-flex justify-content-between fruite-name">
                                                            <a href="filter_shop.php?season='.$season.'"><i class="fas fa-apple-alt me-2"></i>' . $season . '</a>
                                                            <span>(' . $count . ')</span>
                                                        </div>
                                                    </li>
                                                    ';
                                            }
                                            echo '</ul>';
                                        } else {
                                            echo "<p>No data available</p>";
                                        }

                                        // Close the database connection
                                        $conn->close();
                                    ?>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Price</h4>
                                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                            <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                                        </div>
                                    </div> -->
                                   
                                    <div class="col-lg-12">
                                        <h4 class="mb-3">Featured products</h4>
                                        <?php
include('api/config.php');
$season_flowers = $_GET['season'];
$query = "
SELECT *
FROM flowersales
WHERE seasonal_flowers='$season_flowers'; ";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $flowername = $row['flowername'];
        $image = $row['image'];
        $id = $row['id'];
        $price = $row['price'];
        

    
            echo '
                                        
                                        <div class="d-flex align-items-center justify-content-start">
                                          <a href="shop-detail.php?id='.$id.'">
                                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                                <img src="images/'.$image.'" class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">'.$flowername.'</h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">Rs.'.$price.'</h5>
                                                   
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
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                <?php

                                    include('api/config.php');

                                    $season_flowers = $_GET['season'];
                                    $query = " SELECT * FROM flowersales WHERE seasonal_flowers = '$season_flowers' ";
                                    $result = $conn->query($query);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                            $flowername = $row['flowername'];
                                            $image = $row['image'];
                                            $id = $row['id'];
                                            $price = $row['price'];
                                            $description = $row['description'];
                                            $maxLength = 80;
                                            $shortDescription = strlen($description) > $maxLength 
                                                ? substr($description, 0, $maxLength) . '...' 
                                                : $description;

        

    
                                    echo '
                                           <div class="col-md-6 col-lg-6 col-xl-4">
                                           <a href="shop-detail.php?id='.$id.'">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="images/'.$image.'" style="width:100px; height:160px;" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">'.$row['category'].'</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>'.$flowername.'</h4>
                                                <p>'. $shortDescription.'</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Rs.'.$price.'</p>
                                                        
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

                                 
                                   

                                    <!-- <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="#" class="rounded">&laquo;</a>
                                            <a href="#" class="active rounded">1</a>
                                            <a href="#" class="rounded">2</a>
                                            <a href="#" class="rounded">3</a>
                                            <a href="#" class="rounded">4</a>
                                            <a href="#" class="rounded">5</a>
                                            <a href="#" class="rounded">6</a>
                                            <a href="#" class="rounded">&raquo;</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>