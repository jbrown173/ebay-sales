@include('nav')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>brands</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>brands</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('brands.create') }}"> Create Brand Record</a>
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

<th>Name</th>
<th>Description</th>
<th>Manufacturer</th>
<th width="280px">Action</th>
</tr>
@foreach ($brands as $brand)
<tr>

<td>{{ $brand->name }}</td>
<td>{{ $brand->description }}</td>
<td>{{ $brand->manufName }}</td>
<td>
<form action="{{ route('brands.destroy',$brand->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('brands.edit',$brand->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{{-- {!! $brands->links() !!} --}}
</body>
</html>
