<!DOCTYPE html>
<html>

<head>
  <title>Terramino</title>
  <link rel="icon" href="https://www.terraform.io/favicon.ico" type="image/x-icon" />
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }

    body {
      background-image: url("https://github.com/andrelomonaco/learn-terramino/raw/master/background.png");
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-family: Arial, Helvetica, sans-serif
    }

    h1 {
      font-family: Impact, Charcoal, sans-serif
    }

    canvas {
      border: 1px solid white;
    }

    .container {
      position: relative;
      margin: 0 auto;
    }

    .content {
      position: relative;
      left: 0;
      top: 0;
    }

    .attribute-name {
      display: inline-block;
      font-weight: bold;
      width: 10em;
    }
  </style>
</head>
<?php
  $url = "http://169.254.169.254/latest/meta-data/instance-id";
  $instance_id = file_get_contents($url);

  $url = "http://169.254.169.254/latest/meta-data/placement/availability-zone";
  $zone = file_get_contents($url);

  $url = "http://169.254.169.254/latest/meta-data/ami-id";
  $ami_id = file_get_contents($url);

  $headers = apache_request_headers(); 
  $real_client_ip = $headers["X-Forwarded-For"];

  $ip_http_client = $_SERVER['HTTP_CLIENT_IP'];
  $ip_remote_addr = $_SERVER['REMOTE_ADDR'];
  ?>

<body>
  <div class="container">
    <div class="content">
      <h1>Terramino</h1>
      <p><span class="attribute-name">AMI ID:</span><code><?php echo $ami_id; ?></code></p>
      <p><span class="attribute-name">Instance ID:</span><code><?php echo $instance_id; ?></code></p>
      <p><span class="attribute-name">Availability Zones:</span><code><?php echo $zone; ?></code></p>
      <p><span class="attribute-name">X-Forwarded-For:</span><code><?php echo $real_client_ip; ?></code></p>
      <p><span class="attribute-name">HTTP Client IP:</span><code><?php echo $ip_http_client; ?></code></p>
      <p><span class="attribute-name">Remote Addr IP:</span><code><?php echo $ip_remote_addr; ?></code></p>      
      </div>
  </div>
</body>
</html>
