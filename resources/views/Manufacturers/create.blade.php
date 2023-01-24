@include('nav')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Company Form - Laravel 9 CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Brand</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('brands.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Manufacturer:</strong>
<input type="number" name="manufacturerId" class="form-control" placeholder="manufacturerId">
@error('manufacturerId')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" class="form-control" placeholder="name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description:</strong>
<input type="text" name="description" class="form-control" placeholder="description">
@error('description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="form-group">
		<strong>Years:</strong>
		<input type="text" name="years" class="form-control" placeholder="years">
		@error('years')
		<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
		@enderror
	</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="form-group">
		<strong>Country:</strong>
		<input type="text" name="country" class="form-control" placeholder="country">
		@error('country')
		<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
		@enderror
	</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>
