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

foreach(explode('\n',file_get_contents('filtre/blacklist.txt')) as $F) {
	echo "<div class=\"container\">
  <h2>Ddos attack</h2>
  <p>Blacklisted ips and info</p>            
  <table class=\"table\">
    <thead>
      <tr>
        <th>info</th>
        <th>action</th>
        
      </tr>
    </thead>
    <tbody>
      <tr><td>$F</td>
       <td><a class='btn btn-primary' href=cx.php?delete&i=$F>delete from black list </a></td>
       </tr>
    </tbody>
  </table>
</div>

</body>
</html>";
}


 ?>
