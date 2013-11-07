<?php

$url = 'https://api.madmimi.com/mailer';
$data = array(
'username'=>'admin@broadcastonlineradio.com',
  'api_key'=>'f0452d81ed59c34b173f14291d218364',
  'promotion_name'=>'Activate Account',
  'recipient'=>$em,
  'subject'=>$siteName.' - Activate your account',
  'from'=>'no-reply@20ez.com',
  'reply_to'=>'no-reply@20ez.com',
  'raw_html'=>'<html>
<head>
  <title>Activate your '.$siteName.' account</title>
</head>
<body>
  <p>Hello '.$un.',</p>
  <p>Please click the following link to activate you '.$siteName.' account:<p>
  <p>Click to Activate: <a href=http://'.$domain.'/activate.php?un='.$un.'&key='.$key.'"> http://'.$domain.'/activate.php?un='.$un.'&key='.$key.'</a></p>
  [[tracking_beacon]]
</body>
</html>'


	);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

