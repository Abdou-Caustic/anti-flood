<html lang="en">
<head>
  <title>blacklist info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$client = $_SERVER['REMOTE_ADDR'];
error_reporting(0);
echo "<div class=\"container\">
  <h2>Ddos attack</h2>
  <p>Blacklisted ips and info</p>            
  <table class=\"table\">
    <thead>
      <tr>
        <th>info</th>
        <th>action</th>
        
      </tr>
    </thead>";
foreach(file('filtre/blacklist.txt') as $F) {
$thisp = $_SERVER["SCRIPT_NAME"];
if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $F, $ip_match)) {
   $ip =  $ip_match[0];
}

echo "	
    <tbody>
      <tr><td>$F</td>
       <td><a class='btn btn-primary' href=$thisp?delete&i=$ip>delete from black list </a></td>
       </tr>";
}
echo "
    </tbody>
  </table>
</div>
</body>
</html>";
?>
<?php 
if(isset($_GET['delete'])){
$ip= $_GET['i'];

$client = $ip;
foreach(@file('filtre/blacklist.txt') as $F) {
	$x = explode('-', $F);
	if($x[0]==$client) { 


$lastd = file_get_contents('filtre/blacklist.txt');
$lastd = str_replace("$F","",$lastd);

unlink('filtre/blacklist.txt');
fwrite(fopen('filtre/blacklist.txt','a'),$lastd);
}
}

}
