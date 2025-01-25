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
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input type="search" class="form-control p-3"  id="searchInput" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Category:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform" onchange="updateCategoryFilter()">
                                    <option value="flowers">Flowers</option>
                                    <option value="design">Design</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <!-- Season -->
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
                                    <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="" oninput="updatePriceFilter(this.value)">
                                        <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                                    </div>
                                    </div>
                                   
                                    <div class="col-lg-12">
                                        <h4 class="mb-3">Featured products</h4>
                                        <?php
                                            include('api/config.php');
                                            $query = "WITH flowersales AS (
                                                SELECT 
                                                    *,
                                                    ROW_NUMBER() OVER (PARTITION BY seasonal_flowers ORDER BY id) AS row_num
                                                FROM flowersales WHERE category='flowers'
                                            )
                                            SELECT *
                                            FROM flowersales
                                            WHERE row_num = 1; ";
                                            $result = $conn->query($query);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {

                                                    $flowername = $row['flowername'];
                                                    $image = $row['image'];
                                                    $id = $row['id'];
                                                    $price = $row['price'];
                                                    $category = $row['seasonal_flowers'];
                                                    

                                                
                                                        echo '
                                                            <a href="shop-detail.php?id='.$id.'&category='.$category.'">
                                                            <div class="d-flex align-items-center justify-content-start">
                                                        
                                                                                            <div class="rounded me-4" >
                                                                                                <img src="images/'.$image.'" class="img-fluid rounded" alt="Image" style="width: 200px;
                                                            max-height: 100%;
                                                            height: 70px;">
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
                                <div class="row g-4 " id="flowerContainer">
                                    <!-- Default PHP-Generated Content Will Load Here -->
                                    <?php include 'api/get_flowers.php'; ?>
                                </div>
                              
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
    

    <script>
        // Update the amount display based on price range selection
        function updatePriceFilter(value) {
            // Update the displayed range value
            document.getElementById("amount").textContent = value;
            // Trigger the AJAX call with the selected category and price range
            var category = document.getElementById("fruits").value; // Get the currently selected category
            fetchFilteredData(value, category); // Pass the updated value and current category
        }

        // Triggered when the category is changed
        function updateCategoryFilter() {
            var category = document.getElementById("fruits").value;
            var max_price = document.getElementById("rangeInput").value;
            fetchFilteredData(max_price, category); // Fetch with the updated category
        }

        // Function to fetch filtered data based on price and category
        function fetchFilteredData(max_price, category = 'flowers') {
            $.ajax({
                url: 'api/get_flowers.php',
                method: 'GET',
                data: { 
                    max_price: max_price,
                    category: category
                },
                success: function(response) {
                    // Replace container content with filtered results
                    $('#flowerContainer').html(response);
                },
                error: function() {
                    console.error('An error occurred while fetching the filtered data.');
                }
            });
        }

    </script>
    <script>
            function initializeSearch() {
                $('#searchInput').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('#flowerContainer > div').each(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            }

            initializeSearch();
        </script>
    </body>

</html>