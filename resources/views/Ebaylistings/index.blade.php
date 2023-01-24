@include('nav')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Ebay Listings</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Ebay Listings</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('ebaylistings.create') }}"> Create Ebay Listing Record</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>

<th>Ebay Num</th>
<th>Manufacturer</th>
<th>Brand</th>
<th>URL</th>
<th>Note</th>
<th width="280px">Action</th>
</tr>
@foreach ($ebaylistings as $ebaylisting)
<tr>

<td>{{ $ebaylisting->ebayNum }}</td>
<td>{{ $ebaylisting->manufName }}</td>
<td>{{ $ebaylisting->brandName}}</td>
<td><a href="{{ $ebaylisting->url }}" target="_blank">{{ $ebaylisting->url }}</a></td>
<td>{{ $ebaylisting->note }}</td>
<td>
<form action="{{ route('ebaylistings.destroy',$ebaylisting->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('ebaylistings.edit',$ebaylisting->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{{-- {!! $ebaylistings->links() !!} --}}
</body>
</html>
