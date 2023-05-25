<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded</title>
</head>
<body>
   <?php
if (isset($_GET['message']) && $_GET['message'] === 'success') {
    echo "Accepted Successfully";
}
?>

</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks For Submission</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="thankpage.css"> -->
<style>
    .addimg{
    background-image: url('https://gbc.org/wp-content/uploads/2020/11/healthcaredoctorscreen.jpg');
    height: 100vh;
   width: 100%;
    background-repeat: no-repeat;
    /* background-position: center; */
    background-size: cover;
}
.editbgcolor{
    background-color: rgba(0, 0, 0, 0.5);
    height: 100vh;
    width: 100%;
}
.edittxt{
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 100vh; 
   
}
.edtbg{
    background-color: rgba(75, 184, 206, 0.8);
border-radius: 30px;
box-shadow: 2px 2px 15px 2px blue;}
.lheadingedit{
    font-size: 40px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #42A5CF;
background: linear-gradient(to right, #cf4255 0%, #1c20ff 36%, #cf112a 100%);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;

}
</style>
</head>
<body>
    <div class=" addimg">
<div class=" editbgcolor">
    <div class="container  py-5 w-75 mx-auto text-center edittxt">
       <div class=" border-0  py-5 p-5 edtbg">
           
           <h1 class="lheadingedit">Request Accepted</h1>
           <a type="button"  class="btn btn-danger mt-5" href="../Laboratory/ambulancereq.php">Back To Request Page</a>
    </div> 
        
        </div>
</div>

    </div>
  
</body>
</html>