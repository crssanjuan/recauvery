<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['firstname']) &&
    isset($_SESSION['id'])) {

	# Database Connection File
	include "../db_conn.php";

    # Validation helper function
    include "func-validation.php";

    # File Upload helper function
    include "func-file-upload.php";


    /** 
	  If all Input field
	  are filled
	**/
	if (isset($_POST['user_id'])          &&
        isset($_POST['firstname'])       &&
        isset($_POST['lastname']) &&
        isset($_POST['id_no']) &&
        isset($_POST['course'])      &&
        isset($_POST['year'])    &&
        isset($_POST['sec'])    &&
        isset($_POST['email'])    &&
        isset($_POST['contact'])    &&
        isset($_POST['type'])    &&
        isset($_POST['status'])    &&
        isset($_POST['password'])    &&
        isset($_FILES['pic'])      &&
        isset($_FILES['pic2'])      &&
        isset($_POST['current_profile'])      &&
        isset($_POST['current_id'])) {

		/** 
		Get data from POST request 
		and store them in var
		**/
		$user_id          = $_POST['user_id'];
		$firstname       = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$id_no = $_POST['id_no'];
		$course      = $_POST['course'];
		$year    = $_POST['year'];
		$sec    = $_POST['sec'];
		$email    = $_POST['email'];
		$contact    = $_POST['contact'];
		$type    = $_POST['type'];
		$status    = $_POST['status'];
		$password    = $_POST['password'];
        
         /** 
	      Get current cover & current file 
	      from POST request and store them in var
	    **/

        $current_profile = $_POST['current_profile'];
        $current_id = $_POST['current_id'];

        #simple form Validation
        $text = "First Name";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($firstname, $text, $location, $ms, "");

		$text = "Last Name";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($lastname, $text, $location, $ms, "");

		$text = "id_no";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($id_no, $text, $location, $ms, "");

	$text = "Course";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($course, $text, $location, $ms, "");

		$text = "Year";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($year, $text, $location, $ms, "");

		$text = "Section";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($sec, $text, $location, $ms, "");

		$text = "Email";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($email, $text, $location, $ms, "");

		$text = "Contact";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($contact, $text, $location, $ms, "");

		$text = "Type";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($type, $text, $location, $ms, "");

		$text = "Status";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($status, $text, $location, $ms, "");

		$text = "Password";
        $location = "../editprofile.php";
        $ms = "user_id=$user_id&error";
		is_empty($password, $text, $location, $ms, "");

        /**
          if the admin try to 
          update the book cover
        **/
          if (!empty($_FILES['pic']['name'])) {
          	  /**
		          if the admin try to 
		          update both 
		      **/
		      if (!empty($_FILES['pic2']['name'])) {
		      	# update both here

		      	# book cover Uploading
		        $allowed_image_exs = array("jpg", "jpeg", "png");
		        $path = "profile";
		        $pic = upload_file($_FILES['pic'], $allowed_image_exs, $path);

		        # book cover Uploading
		        $allowed_image_exs = array("jpg", "jpeg", "png");
		        $path = "school_id";
		        $pic2 = upload_file($_FILES['pic2'], $allowed_image_exs, $path);
                
                /**
				    If error occurred while 
				    uploading
				**/
		        if ($pic['status'] == "error" || 
		            $pic2['status'] == "error") {

			    	$em = $pic['data'];

			    	/**
			    	  Redirect to '../edit-book.php' 
			    	  and passing error message & the id
			    	**/
			    	header("Location: ../editprofile.php?error=$em&id=$id");
			    	exit;
			    }else {
                  # current book cover path
			      $c_p_book_cover = "../uploads/profile/$current_profile";

			      # current file path
			      $c_p_book_cover2 = "../uploads/school_id/$current_id";

			      # Delete from the server
			      unlink($c_p_book_cover);
			      unlink($c_p_book_cover2);

			      /**
		              Getting the new file name 
		              and the new book cover name 
		          **/
		           $profile_URL = $pic['data'];
		           $school_URL = $pic2['data'];

		            # update just the data
		          	$sql = "UPDATE users
		          	        SET firstname=?,
		          	            lastname=?,
		          	            id_no=?,
		          	            course=?,
		          	            year=?,
		          	            sec=?,
		          	            email=?,
		          	            contact=?,
		          	            type=?,
		          	            status=?,
		          	            password=?,
		          	            profile=?,
		          	            school_id=?
		          	        WHERE user_id=?";
		          	$stmt = $conn->prepare($sql);
					$res  = $stmt->execute([$firstname, $lastname, $id_no, $course, $year, $sec,$email,$contact,$type,$status,$password,$profile_URL,$school_URL, $user_id]);

				    /**
				      If there is no error while 
				      updating the data
				    **/
				     if ($res) {
				     	# success message
				     	$sm = "Successfully updated!";
						header("Location: ../editprofile.php?success=$sm&id=$id");
			            exit;
				     }else{
				     	# Error message
				     	$em = "Unknown Error Occurred!";
						header("Location: ../editprofile.php?error=$em&id=$id");
			            exit;
				     }


			    }
		      }else {
		      	# update just the book cover

		      	# book cover Uploading
		        $allowed_image_exs = array("jpg", "jpeg", "png");
		        $path = "profile";
		        $pic = upload_file($_FILES['pic'], $allowed_image_exs, $path);
                
                /**
				    If error occurred while 
				    uploading
				**/
		        if ($pic['status'] == "error") {

			    	$em = $pic['data'];

			    	/**
			    	  Redirect to '../edit-book.php' 
			    	  and passing error message & the id
			    	**/
			    	header("Location: ../editprofile.php?error=$em&id=$id");
			    	exit;
			    }else {
                  # current book cover path
			      $c_p_book_cover = "../uploads/profile/$current_profile";

			      # Delete from the server
			      unlink($c_p_book_cover);

			      /**
		              Getting the new file name 
		              and the new book cover name 
		          **/
		           $profile_URL = $pic['data'];

		            # update just the data
		          	$sql = "UPDATE users
		          	        SET firstname=?,
		          	            lastname=?,
		          	            id_no=?,
		          	            course=?,
		          	            year=?,
		          	            sec=?,
		          	            email=?,
		          	            contact=?,
		          	            type=?,
		          	            status=?,
		          	            password=?,
		          	            profile=?
		          	        WHERE user_id=?";
		          	$stmt = $conn->prepare($sql);
					$res  = $stmt->execute([$firstname, $lastname, $id_no, $course, $year, $sec,$email,$contact,$type,$status,$password,$profile_URL,$user_id]);

				    /**
				      If there is no error while 
				      updating the data
				    **/
				     if ($res) {
				     	# success message
				     	$sm = "Successfully updated!";
						header("Location: ../editprofile.php?success=$sm&id=$id");
			            exit;
				     }else{
				     	# Error message
				     	$em = "Unknown Error Occurred!";
						header("Location: ../editprofile.php?error=$em&id=$id");
			            exit;
				     }


			    }
		      }
          }
          /**
          if the admin try to 
          update just the file

          **/
          else if(!empty($_FILES['pic2']['name'])){
          	# update just the file
            
            # book cover Uploading
	        $allowed_image_exs = array("jpg", "jpeg", "png");
		        $path = "school_id";
		        $pic2 = upload_file($_FILES['pic2'], $allowed_image_exs, $path);
            
            /**
			    If error occurred while 
			    uploading
			**/
	        if ($pic2['status'] == "error") {

		    	$em = $pic2['data'];

		    	/**
		    	  Redirect to '../edit-book.php' 
		    	  and passing error message & the id
		    	**/
		    	header("Location: ../editprofile.php?error=$em&id=$id");
		    	exit;
		    }else {
              # current book cover path
		      $c_p_book_cover2 = "../uploads/school_id/$current_id";

		      # Delete from the server
		      unlink($c_p_book_cover2);

		      /**
	              Getting the new file name 
	              and the new file name 
	          **/
	           $school_URL = $pic2['data'];

	            # update just the data
	          	$sql = "UPDATE users
		          	        SET firstname=?,
		          	            lastname=?,
		          	            id_no=?,
		          	            course=?,
		          	            year=?,
		          	            sec=?,
		          	            email=?,
		          	            contact=?,
		          	            type=?,
		          	            status=?,
		          	            password=?,
		          	            school_id=?
		          	        WHERE user_id=?";
		          	$stmt = $conn->prepare($sql);
				$res  = $stmt->execute([$firstname, $lastname, $id_no, $course, $year, $sec,$email,$contact,$type,$status,$password,$school_URL,$user_id]);


			    /**
			      If there is no error while 
			      updating the data
			    **/
			     if ($res) {
			     	# success message
			     	$sm = "Successfully updated!";
					header("Location: ../editprofile.php?success=$sm&id=$id");
		            exit;
			     }else{
			     	# Error message
			     	$em = "Unknown Error Occurred!";
					header("Location: ../editprofile.php?error=$em&id=$id");
		            exit;
			     }


		    }
	      
          }else {
          	# update just the data
          	$sql = "UPDATE users
		          	        SET firstname=?,
		          	            lastname=?,
		          	            id_no=?,
		          	            course=?,
		          	            year=?,
		          	            sec=?,
		          	            email=?,
		          	            contact=?,
		          	            type=?,
		          	            status=?,
		          	            password=?
		          	        WHERE user_id=?";
          	$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$firstname, $lastname, $id_no, $course, $year, $sec,$email,$contact,$type,$status,$password, $user_id]);
		    /**
		      If there is no error while 
		      updating the data
		    **/
		     if ($res) {
		     	# success message
		     	$sm = "Successfully updated!";
				header("Location: ../editprofile.php?success=$sm&id=$id");
	            exit;
		     }else{
		     	# Error message
		     	$em = "Unknown Error Occurred!";
				header("Location: ../editprofile.php?error=$em&id=$id");
	            exit;
		     }
          } 
	}else {
      header("Location: ../editprofile.php");
      exit;
	}

}else{
  header("Location: ../editprofile.php");
  exit;
}