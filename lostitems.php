<?php include('navbar_lostitem.php'); ?>
<?php
include('dbcon.php'); // Database connection file
// Fetch items from the database
$sql = "SELECT lostitem_id, lostitem_title, description, datefound, founder, upload_lost FROM lostitems WHERE status != 'claimed'";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<link rel="stylesheet" href="css/grid.css">
<link rel="stylesheet" href="css/style-user.css">
<link rel="stylesheet" href="css/bursh_text.css">
<link rel="stylesheet" href="css/lostitem.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/button.css">
<!-- Search bar -->
<br>
<br>
<a href="add_lostitem.php"><button class="button-3" role="button">+ Post an Item</button></a>
<div class="search-container">
    <input type="text" id="searchInput" placeholder="Search Lost Items..." class="styled-search" onkeyup="filterItems()">
</div>

<div class="product_section_2 layout_padding">
    <div class="grid-container">
        <?php while ($row = $result->fetch_assoc()) {
        $lostitemid = $row['lostitem_id']; ?>
        <div class="product_box">
            <h4 class="bursh_text"><?= htmlspecialchars($row['lostitem_title']); ?></h4>
            <p class="lorem_text"><?= htmlspecialchars($row['description']); ?></p>
            <?php if (!empty($row['upload_lost'])): ?>
                <img src="uploads/lostpic/<?= htmlspecialchars($row['upload_lost']); ?>" class="image_1" alt="<?= htmlspecialchars($row['lostitem_title']); ?>">
            <?php else: ?>
                <img src="img/arellano_logo.jpg" class="image_1" alt="No Image Available">
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

<!-- Javascript for filtering items -->
<script>
function filterItems() {
    var input = document.getElementById("searchInput").value.toUpperCase();
    var productBoxes = document.getElementsByClassName("product_box");
    
    for (var i = 0; i < productBoxes.length; i++) {
        var title = productBoxes[i].getElementsByTagName("h4")[0];
        var txtValue = title.textContent || title.innerText;
        
        if (txtValue.toUpperCase().indexOf(input) > -1) {
            productBoxes[i].style.display = "";
        } else {
            productBoxes[i].style.display = "none";
        }
    }
}
</script>

<?php
$conn->close();
?>
