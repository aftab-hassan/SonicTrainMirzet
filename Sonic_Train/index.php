<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sonic Train</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/sonic.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="css/dropzone.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="js/dropzone.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container topnav">
          <div class="col-lg-12 text-center"><h1>Sonic Train</h1>
          <h4>A framework for dynamic CSV viewing</h4></div>
        </div>
    </nav>
    <?php
      $boolean = 0;
      $name = @$_FILES['file']['name'];
      $extension = strtolower(substr($name, strpos($name, '.') + 1));
      $tmp_name = @$_FILES['file']['tmp_name'];
      $location = 'uploads/';
      if (!empty($name)) {
        if ($extension=='csv') {
      move_uploaded_file($tmp_name, $location.$name);
      $boolean = 1;
      echo '<div class="alert alert-success">Upload successful!</div>';
    } else {
      echo '<div class="alert alert-danger">You can upload only .CSV file type!</div>';
    }
  }

    ?>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Upload File</strong> <small>Only CSV files!</small></div>
        <div class="panel-body">

          <!-- Standard Form -->
          <h4>Select files from your computer</h4>
          <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="file" value="">
              </div>
                <input type="submit" name="name" value="Upload File" class="btn btn-sm btn-warning">
            </div>
          </form>

          <!-- Drop Zone -->
          <h4>Or drag and drop file below</h4>
          <form class="dropzone" action="upload.php" method="post" id="my-awesome-dropzone">
          </form>
          </div>
        </div>
      </div>
      <div class="container">
      <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" active>Radio buttons of columns from uploaded .csv file.</a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
              <div class="panel-body">
                  <h4><strong>Columns from uploaded .csv file:</strong></h4>
                  <h5>Preprocessing...</h5>
                <?php
                  if ($boolean == 1) {
                  $used_file = fopen('uploads/'.$name,"r");
                  $array = fgetcsv($used_file);
                  $n = 0;
                    foreach ($array as $value) {
                      echo '<input type="radio">'.' '.'<strong>'.$value.' '.'</strong>';
                    }
                  fclose($used_file); }
                ?>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Checkboxes of columns from uploaded .csv file.</a>
              </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
              <div class="panel-body">
                <h4><strong>Columns from uploaded .csv file:</strong></h4>
                <h5>Loading...</h5>
              <?php
                if ($boolean == 1) {
                $used_file = fopen('uploads/'.$name,"r");
                $array = fgetcsv($used_file);
                $n = 0;
                  foreach ($array as $value) {
                    echo '<input type="checkbox" checked>'.' '.'<strong>'.$value.' '.'</strong>';
                  }
                fclose($used_file); }
              ?>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Collapsible Group 3</a>
              </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
              <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
          </div>
        </div>
<div class="container">

</div>


  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/train.js"></script>
  <script src="js/dropzone.js"></script>
  </body>
</html>
