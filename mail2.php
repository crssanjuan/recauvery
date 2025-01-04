<?php include('header_admin.php'); ?>
<?php include('session.php'); ?>
<?php include('new_navbar.php'); ?>
    <br>
<?php $get_id = $_GET['id']; ?>
    <div class="container">
        <div class="margin-top">
            <div class="row">   
            <div class="span12">
                <div class="alert alert-info">Send Email</div>
            <p><a href="contact.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
    <div class="addstudent">
         <div class="details">Please Enter Details Below</div>
                <form class="form-horizontal" action="mail2.php" method="POST" enctype="multipart/form-data">
 <?php
         if(isset($_POST['submit'])){
            $url = "https://script.google.com/macros/s/AKfycbzZqPyCavy4feiQE3YolkMNmS-MLlcjF7hzkS8hZjF5iK9FNIlPvWpyJJN7hB4sZbid/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $_POST['email'],
                  "subject"   => $_POST['subject'],
                  "body"      => $_POST['body']
               ])
            ]);
            $result = curl_exec($ch);
            echo ('<center>'.$result.'</center>');
         }
         ?>

<div class="control-group" style="text-align: center;">                             
<?php  
$user_query=mysqli_query($conn,"select * from contact where id='$get_id'")or die(mysqli_error($conn));
while($row=mysqli_fetch_array($user_query)){ 
echo('<b>Copy the Email: '.$row['email'].'</b>');}?>
</div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input type="text" name="email" type="email" placeholder="Recipients" value="" style=" width: 60%;">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword">Subject:</label>
                        <div class="controls">
                            <input type="text" name="subject" id="inputPassword" placeholder="Subject" value=""style=" width: 60%;"required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword">Message</label>
                         <div class="controls">
                             <textarea name="body" class="form-control" cols="30" rows="5" style=" width: 60%;"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button name="submit" type="submit" class="btn btn-info" style="width: 20%;">Send</button>
                        </div>
                    </div>
                </form>
      </div>
      
   </body>
</html>