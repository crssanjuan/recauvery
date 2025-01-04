<?php  

# Get All books function
function get_all_users($con){
   $sql  = "SELECT * FROM users ORDER bY user_id DESC";
   $stmt = $con->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() > 0) {
        $users = $stmt->fetchAll();
   }else {
      $users = 0;
   }

   return $users;
}



# Get  book by ID function
function get_user($con, $user_id){
   $sql  = "SELECT * FROM users WHERE user_id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$user_id]);

   if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
   }else {
      $user = 0;
   }

   return $user;
}

