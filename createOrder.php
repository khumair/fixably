<!DOCTYPE html>
<html lang="en">
<head>
  <title>fixably</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Create Order</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="deviceType">Type:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="deviceType" placeholder="Device Type" name="deviceType">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="manufacturer">Manufacturer:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="manufacturer" placeholder="i.e Apple" name="manufacturer">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="brand">Brand:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="brand" placeholder="i.e Apple" name="manufacturer">
      </div>
    </div>
     <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>