<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel 7 Import Excel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    {!! QrCode::size(100)->generate('sahretech.com'); !!}
<form action="{{ url('import') }}" method="POST" name="importform" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="file">File:</label>
<input id="file" type="file" name="file" class="form-control">
</div>
<button class="btn btn-success">Import File</button>
</form>
</div>
</body>
</html>