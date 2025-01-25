<?php
include 'header.php';
include 'navbar.php';
?>

<style>
    .img-fluid .rounded{
        width: 100%;
        height: 50% !important;
    }
</style>
<?php
include('api/config.php');

$id = $_GET['id'];
$flower_category = $_GET['category'];

$query = "SELECT * FROM flowersales where id ='$id'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $flowername = $row['flowername'];
        $image = $row['image'];
        $id = $row['id'];
        $description = $row['description'];
        $price = $row['price'];
        $seasonal_flowers = $row['seasonal_flowers'];
        }
} else {
    echo 'No images found in the table.';
}



?>
        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="images/<?php echo $image; ?>" class="img-fluid rounded" alt="Image" style ="width: 420px;hight= 250px;">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3"><?php echo $flowername; ?></h4>
                                <p class="mb-3"><?php echo  $seasonal_flowers; ?></p>
                                <h5 class="fw-bold mb-3">Rs.<?php echo $price; ?></h5>
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="mb-4"><?php echo $description; ?></p>

                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0 quantity-input" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href="#" 
                                    class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart" 
                                    data-product-id="<?php echo $id; ?>" data-quantity-count="1">
                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                </a>

                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>
                                            <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Feedback Comment</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <p><?php echo $description; ?> </p>
                                     
                                        <div class="px-2">
                                            <div class="row g-4">
                                                <div class="col-6">
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">1 kg</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Country of Origin</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Agro Farm</p>
                                                        </div>
                                                    </div>
                                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Quality</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Organic</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Сheck</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Healthy</p>
                                                        </div>
                                                    </div>
                                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Min Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">250 Kg</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                    <?php
                                        include('api/config.php'); // Ensure this file contains your database connection

                                        $query = "SELECT * FROM feedback";
                                        $result = $conn->query($query);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $name = $row['name'];
                                                $feedback = $row['feedback'];
                                                $date = $row['date']; // Assuming this column stores the submission date

                                            
                                                echo '
                                                <div class="d-flex">
                                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="Avatar">
                                                    <div>
                                                        <p class="mb-2" style="font-size: 14px;">' . $date . '</p>
                                                        <div class="d-flex justify-content-between">
                                                            <h5>' . $name . '</h5>
                                                        </div>
                                                        <p>' . $feedback . '</p>
                                                    </div>
                                                </div>';
                                            }
                                        } else {
                                            echo "No feedback available.";
                                        }
                                    ?>
                                </div>
                                    <div class="tab-pane" id="nav-vision" role="tabpanel">
                                        <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                            amet diam et eos labore. 3</p>
                                        <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                            Clita erat ipsum et lorem et sit</p>
                                    </div>
                                </div>
                            </div>
                        <form action="save_feedback.php" method="POST">
                            <h4 class="mb-5 fw-bold">Feedback</h4>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="text" class="form-control border-0 me-4" name="name" placeholder="Your Name *" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="email" class="form-control border-0" name="email" placeholder="Your Email *" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="feedback" class="form-control border-0" cols="30" rows="8" placeholder="Your Feedback *" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <button type="submit" class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                            Feedback Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <!-- <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div> -->
                                <div class="mb-4">
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
                                <h4 class="mb-4">Featured products</h4>
                                <?php
                                                    include('api/config.php');
                                                    $query = "
                                                    SELECT *
                                                    FROM flowersales
                                                    WHERE seasonal_flowers='$flower_category' ";
                                                    $result = $conn->query($query);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {

                                                            $flowername = $row['flowername'];
                                                            $image = $row['image'];
                                                            $id = $row['id'];
                                                            $price = $row['price'];

                                                        
                                                                echo '
                                                                <a href="shop-detail.php?id='.$id.'&category='.$flower_category.'">
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
                                                    </div>
                                                </div>
                                                            </a>                     
                                                        ';
                                                    
                                                    }
                                                } else {
                                                    echo 'No images found in the table.';
                                                }



                                ?>
                              
                             
                               
                            </div>
                            </a>
                           
                        </div>
                    </div>
                </div>
                <h1 class="fw-bold mb-0">Flower Design</h1>
                <div class="vesitable">
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                    <?php
                        include('api/config.php');



                        $query = "SELECT * FROM flowersales where category='design' ";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $flowername = $row['flowername'];
                                $image = $row['image'];
                                $id = $row['id'];
                                $description = $row['description'];

                                // Limit description to 50 characters
                                $maxLength = 80;
                                $shortDescription = strlen($description) > $maxLength 
                                    ? substr($description, 0, $maxLength) . '...' 
                                    : $description;

                                $price = $row['price'];
                                $seasonal_flowers = $row['seasonal_flowers'];

                                echo ' <div class="border border-primary rounded position-relative vesitable-item">
                                <a href="shop-detail.php?id='.$id.'">
                                                    <div class="vesitable-img">
                                                        <img src="images/'.$image.'" style="width:100px; height:160px;" class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">'.$row['seasonal_flowers'].'</div>
                                                    <div class="p-4 pb-0 rounded-bottom">
                                                        <h4>'.$flowername.'</h4>
                                                        <p>'.$shortDescription.'</p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                            <p class="text-dark fs-5 fw-bold">Rs'.$row['price'].'</p>
                                                            <a href="#" 
                                                                                                            class="btn border border-secondary rounded-pill px-3 text-primary add-to-cart" 
                                                                                                            data-product-id='.$id.' ?>" 
                                                                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                                                                        </a>

                                                        </div>
                                                        </a>
                                                    </div>
                                                </div>';
                                }
                        } else {
                            echo 'No images found in the table.';
                        }


                        $conn->close();
                        ?>
                       
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->
    

        

        
        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- <script>
        $(document).ready(function () {
            $(".add-to-cart").click(function (e) {
                e.preventDefault();

                // Fetch data attributes
                const productId = $(this).data("product-id");
                const quantityCount = $(this).data("quantity-count");
        

                // AJAX Request
                $.ajax({
                    url: "api/add_to_cart.php", // Backend script to handle the request
                    method: "POST",
                    data: {
                        product_id: productId,
                        quantity:quantityCount,
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
    </script> -->
    
    <script>
        $(document).ready(function () {
            // Handle Add to Cart
            $(".add-to-cart").click(function (e) {
                e.preventDefault();

                // Fetch data attributes
                const productId = $(this).data("product-id");

                // Fetch the quantity value directly from the input field
                const quantityCount = $(this).prev(".quantity").find(".quantity-input").val();

                // AJAX Request
                $.ajax({
                    url: "api/add_to_cart.php", // Backend script to handle the request
                    method: "POST",
                    data: {
                        product_id: productId,
                        quantity: quantityCount,
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
    </body>

</html><?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL root password
$dbname = "freshblooms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    // SQL query to insert data into the 'feedback' table
    $sql = "INSERT INTO feedback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
