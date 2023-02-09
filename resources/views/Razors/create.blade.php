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
<h2>Add Razor</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('razors.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('razors.store') }}" method="POST" enctype="multipart/form-data">
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
<strong>Brand:</strong>
<input type="number" name="brandId" class="form-control" placeholder="brandId">
@error('brandId')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tang Text Front:</strong>
<input type="text" name="tangTextFront" class="form-control" placeholder="tangTextFront">
@error('tangTextFront')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Tang Text Back:</strong>
    <input type="text" name="tangTextBack" class="form-control" placeholder="tangTextBack">
    @error('tangTextBack')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Blade Text Front:</strong>
    <input type="text" name="bladeTextFront" class="form-control" placeholder="bladeTextFront">
    @error('bladeTextFront')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Earliest Year:</strong>
    <input type="text" name="earliestYear" class="form-control" placeholder="earliestYear">
    @error('earliestYear')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Latest Year:</strong>
    <input type="text" name="latestYear" class="form-control" placeholder="latestYear">
    @error('latestYear')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Scale Material:</strong>
    <input type="text" name="scaleMaterialId" class="form-control" placeholder="scaleMaterialId">
    @error('scaleMaterialId')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Scale Text:</strong>
    <input type="text" name="scaleText" class="form-control" placeholder="scaleText">
    @error('scaleText')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Scale Description:</strong>
    <input type="text" name="scaleDescription" class="form-control" placeholder="scaleDescription">
    @error('scaleDescription')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Blade Description:</strong>
    <input type="text" name="bladeDescription" class="form-control" placeholder="bladeDescription">
    @error('bladeDescription')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Condition When Bought:</strong>
    <input type="text" name="conditionWhenBought" class="form-control" placeholder="conditionWhenBought">
    @error('conditionWhenBought')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>known Country:</strong>
    <input type="text" name="knownCountryMadeIn" class="form-control" placeholder="knownCountryMadeIn">
    @error('knownCountryMadeIn')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Guessed Country:</strong>
    <input type="text" name="guessedCountryMadeIn" class="form-control" placeholder="guessedCountryMadeIn">
    @error('guessedCountryMadeIn')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
	<div class="form-group">
		<strong>Image Name:</strong>
		<input type="text" name="imagePath" class="form-control" placeholder="imagePath">
		@error('imagePath')
		<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
		@enderror
	</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>
