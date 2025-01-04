<?php include('header_user.php'); ?>
<?php 
   include "dbcon.php";
     
   $sql = "SELECT lostitem_id, lostitem_title, description, datefound, founder, upload_lost FROM lostitems WHERE status != 'claimed'";

   $result = $conn->query($sql);

   if (!$result) {
       die("Query failed: " . $conn->error);
   }
?>
 <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/bursh_text.css">


<!-- banner section start -->
<div class="banner_section layout_padding">
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <div class="row">
                  <div class="col-sm-6">
                     <h1 class="banner_taital">RecAUvery: <br>Lost and Found</h1>
                     <p class="banner_text"> RecAUvery: Lost and Found Management System is a system designed intended mainly for Plaridel Campus. It helps students to find their lost item in a modern, easiest and in accessible way. Find your lost items here.</p>
                     <!-- HTML !-->
                     <div><button class="button-1" onclick="scrollToLostSection()">
                     Find Item
                     </button>
                     <a href="contact_user.php"><button class="button-1">
                     Contact us
                     </button></a></div>
                  </div>
                  <div class="col-sm-6">
                     <div class="banner_img"><img src="img/logo.jpg"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- banner section end -->

<!-- lost items section start -->
<div class="product_section layout_padding" id="lostitem-section">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="product_taital">Lost Items</h1>
            <p class="product_text">Find your lost items here.</p>
         </div>
      </div>
      
      <a href="add_lostitem.php"><button class="button-3" role="button">+ Post an Item</button></a>
      <div class="search-container">
   <input type="text" id="searchInput" placeholder="Search Lost Items..." class="styled-search">
</div>
      <div class="product_section_2 layout_padding">
            <div class="grid-container">
               <?php while ($row = $result->fetch_assoc()) {
                  $lostitemid=$row['lostitem_id']; ?>
                <div class="product_box" data-title="<?= htmlspecialchars($row['lostitem_title']); ?>" data-description="<?= htmlspecialchars($row['description']); ?>">
   <h4 class="bursh_text"><?= htmlspecialchars($row['lostitem_title']); ?></h4>
   <p class="lorem_text"><?= htmlspecialchars($row['description']); ?></p>
   <?php if (!empty($row['upload_lost'])): ?>
      <img src="uploads/lostpic/<?= htmlspecialchars($row['upload_lost']); ?>" class="image_1" alt="<?= htmlspecialchars($row['lostitem_title']); ?>">
   <?php else: ?>
      <img src="img/logo.jpg" class="image_1" alt="No Image Available">
   <?php endif; ?>
   <div class="btn_main">
      <div class="buy_bt">
         <ul>
            <li><a href="lostitems_preview.php?id=<?php echo $lostitemid;?>">View</a></li>
         </ul>
      </div>
   </div>
</div>
                <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- lost items section end -->



<!-- contact section start -->

<!-- contact section end -->

<!-- footer section start -->
      <!-- copyright section start -->
 <?php include ('footer.php'); ?>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 

      <script>
                           function scrollToLostSection() {
                           document.getElementById('lostitem-section').scrollIntoView({
                            behavior: 'smooth'
                            });
                           }
                           </script>  

      <script>
   // Search function to filter lost items
   document.getElementById('searchInput').addEventListener('keyup', function() {
      var searchText = this.value.toLowerCase();
      var items = document.querySelectorAll('.product_box');
      
      items.forEach(function(item) {
         var title = item.getAttribute('data-title').toLowerCase();
         var description = item.getAttribute('data-description').toLowerCase();
         
         // Check if the search text is found in either the title or the description
         if (title.includes(searchText) || description.includes(searchText)) {
            item.style.display = "block";  // Show the item if it matches
         } else {
            item.style.display = "none";  // Hide the item if it doesn't match
         }
      });
   });
</script>

   </body>
   