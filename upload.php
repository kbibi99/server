<?php
 header('Content-type: application/json');
 if($_SERVER['REQUEST_METHOD']=='POST'){
 

 $image = $_POST['image'];



function generateRandomString($length = 4) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = ''; 
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



$id=generateRandomString();
 
 $path = "uploads/$id.jpg";
 
 $actualpath = "http://localhost/volley/$path";
 

 if(file_put_contents($path,base64_decode($image))){

//$command = escapeshellcmd("python classify_image.py --image_file $path");

$command = escapeshellcmd("python hello.py $path");
$output = shell_exec($command);


	$data = array(
   	 'url'      => '/volley/darknet/predictions.png',
   	 'data'    => $output,  	 
);

$json_string = json_encode($data);
echo $json_string;

 }
 else{
 echo "Error";
 }
}
