<?php  

# Get All books function
function get_all_books($con){
   $sql  = "SELECT * FROM book ORDER bY book_id DESC";
   $stmt = $con->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}



# Get  book by ID function
function get_lostitems($con, $id){
   $sql  = "SELECT * FROM lostitems WHERE lostitem_id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
        $lostitems = $stmt->fetch();
   }else {
      $lostitems = 0;
   }

   return $lostitems;
}


# Search books function
function search_books($con, $key){
   # creating simple search algorithm :) 
   $key = "%{$key}%";

   $sql  = "SELECT * FROM books
            WHERE title LIKE ?
            OR description LIKE ?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$key, $key]);

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}
