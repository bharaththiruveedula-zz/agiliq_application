<!doctype html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/js/bootstrap.min.js"></script>
        <style>
            body{
                background : #f5f5f5; 
            }
            #form{
                position : relative;
                left : 500px;
       
            }
        </style>
    </head>
<body>

<?php
$redirect_uri = "http://localhost/agiliq";
$client_id= "mvsI4Cal5z20rAfco0nFXsoIKQPgGayGYZi580OTNeZsBZS198";
$client_secret = "jwi5ckzcgyzfunIhw474vg7FrbGVr6Yd5tfm7ev14gmykdbBJM";
if(!$_GET) {
    header("Location:http://join.agiliq.com/oauth/app_authorize?redirect_uri=$redirect_uri&client_id=$client_id");
}
else {
    $code = $_GET['code'];
    $jsonurl = "http://join.agiliq.com/oauth/access_token?client_id=$client_id&redirect_uri=$redirect_uri&client_secret=$client_secret&code=".$code;
    $json = file_get_contents($jsonurl,0,null,null);
    $json_output = json_decode($json,true);
    $access_token = $json_output['access_token'];
    $url = "http://join.agiliq.com/api/resume/upload/?access_token=$access_token";
    ?>  <div id="form">
            <h2> Agiliq Form</h2>
            <form action=<?php echo $url;?> method="post" enctype="multipart/form-data">
                <label for="resume">Filename:</label>
                <input type="file" name="resume" id="resume">
                <label for="first_name">First Name</label><input type="text" id="first_name" name="first_name" value="Bharath">
                <label for="last_name">Last Name:</label><input type="text" id="last_name" name="last_name" value="Thiruveedula">
                <label for="projects_url">Github URL:</label><input type="text" id="projects_url" name="projects_url" value="https://github.com/bharaththiruveedula" >
                <label for="code_url">Code URL:</label><input type="text" id="code_url" name="code_url" value="https://github.com/bharaththiruveedula/agiliq_application"><br/>
                <input type="submit" class="btn-primary">
            </form>
        </div>
    <?                          
}
?>
