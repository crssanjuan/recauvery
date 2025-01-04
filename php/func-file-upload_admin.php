<?php 

# File upload helper function 
function upload_file($files, $allowed_exs, $path){
   # get data and store them in var
   $file_name = $files['name'];
   $tmp_name  = $files['tmp_name'];
   $error     = $files['error'];

   # Sanitize the path to prevent directory traversal attacks
   $path = basename($path);

   # Check if there was an upload error
   if ($error === 0) {
   	  
   	  # Get file extension and convert to lower case
   	  $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
	  $file_ex_lc = strtolower($file_ex);

	  # Check if the file extension is allowed
	  if (in_array($file_ex_lc, $allowed_exs)) {
			# Rename the file with a unique ID
			$new_file_name = uniqid("", true) . '.' . $file_ex_lc;

			# Assign upload path and ensure directory exists
			$upload_dir = '../uploads/' . $path;
			if (!is_dir($upload_dir)) {
			    mkdir($upload_dir, 0755, true);
			}

			$file_upload_path = $upload_dir . '/' . $new_file_name;

			# Move the uploaded file to the target directory
			if (move_uploaded_file($tmp_name, $file_upload_path)) {
				# Success response
				$sm['status'] = 'success';
				$sm['data'] = $new_file_name;
			} else {
				# Failed to move file
				$sm['status'] = 'error';
				$sm['data'] = 'Failed to move uploaded file.';
			}
            
		} else {
			# Invalid file type
			$sm['status'] = 'error';
			$sm['data'] = "You can't upload files of this type";
		}
   } else {
   		# Upload error
		$sm['status'] = 'error';
		$sm['data'] = 'Error occurred while uploading!';
   }

   # Return response
   return $sm;
}
?>
