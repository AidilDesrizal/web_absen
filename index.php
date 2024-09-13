<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <title>Sisfo PKL SMK N 2 Padang Panjang </title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    header,footer {
      background-color:#00aaff;
      color:white;
      text-align: center;
      padding: 10px 0;
    }
    nav {
      background-color: #0077cc;
      padding: 10px;
      text-align: center;
    }
    nav a{
      color: white;
      margin: 0 15px;
      text-decoration: none;
    }
    nav a:hover {
      text-decoration: underline;
    }
    #content {
      padding: 20px;
    }
    iframe {
      width: 100%;
      height: 500px;
      border: none;
      
    }
</style>
  </head>
</body>

<!-- Include Header -->
  <?php include 'header.php'; ?>

 <!-- Include Menu -->
 <?php include 'menu.php'; ?>

 <!-- Main Content with Iframe -->
 <div id="content">
 <iframe name="contentFrame" src="crud/home.php"></iframe>\
 </div>
 <!-- Include Footer -->
 <?php include 'footer.php'; ?>

</body>
</html>