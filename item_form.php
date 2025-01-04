<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Item</title>
    <link rel="stylesheet" type="text/css" href="css/button.css">
</head>
<body>
    <h1>Post a New Item</h1>
    <form action="post_item.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>
        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required><br><br>
        <input type="submit" value="Post Item">
    </form>
</body>
</html>