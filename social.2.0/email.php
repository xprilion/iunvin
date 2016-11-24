<?php
// multiple recipients
$to  = 'admin@iunv.in';

// subject
$subject = 'Password Assistance';

// message
$message = '
<html>
<head>
  <title>Password Assistance at iunv</title>
<style>
#wrapper{
padding: 1%;
border: 1px solid #cdcdcd;
}

#logo{
cursor: pointer;
color: #fff;
text-shadow: 1px 1px #5f5f5f;
font-weight: bold;
font-size: 40px;
font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
display: block;
padding: 2%;
background: #1288ff;
}


</style>
</head>
<body>
<div id="wrapper">
<div id="logo">iunv</div>
</div>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: Password Assistance<support@iunv.in>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>