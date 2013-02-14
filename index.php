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
    echo $access_token;
    $url = "http://join.agiliq.com/api/resume/upload/?access_token=$access_token&first_name=Bharath&last_name=Thiruveedula&projects_url=https://github.com/bharaththiruveedula&code_url="
    ?>
        <form action=<?php echo $url; ?> method="post" enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?                          
}
?>
