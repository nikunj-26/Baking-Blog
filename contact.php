<?php
    include_once("includes/db.php");
    $title = "Contact Me!"; 
    ?>
    <?php
    if(isset($_POST['submit'])){
        echo "Hello";
        
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Shriya Pisal <enquiry@sameplace.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $to = $_POST['emailid'];
        $subject = $_POST['subject'];
        
        $body = $_POST['comments'];
        
        mail($to, $subject, $body, $headers);
    } ?>
    <html>
    <?php include_once("includes/header.php"); ?>
    <body>
       <?php include_once("includes/navigation.php"); 
        ?>
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="POST" role="form">
            <legend>Contact Me!</legend>
            
            <div class="form-group">
                <label for="emailid">Email ID</label>
                <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Your Email">
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Your subject">
            </div>
            
            <div class="form-group">
                <label for="subject">Comments</label>
                <textarea class="form-control" id="comments" name="comments" placeholder="Your comments" rows="10"></textarea>
            </div>
            
            
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
            </form>
        </div>
    </body>
</html>