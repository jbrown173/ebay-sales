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
<h2>Manufacturers</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('manufacturers.create') }}"> Create Manufacturer Record</a>
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
<th>Years</th>
<th>Country</th>
<th width="280px">Action</th>
</tr>
@foreach ($manufacturers as $manufacturer)
<tr>

<td>{{ $manufacturer->name }}</td>
<td>{{ $manufacturer->description }}</td>
<td>{{ $manufacturer->years }}</td>
<td>{{ $manufacturer->country }}</td>
<td>
<form action="{{ route('manufacturers.destroy',$manufacturer->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('manufacturers.edit',$manufacturer->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{{-- {!! $manufacturers->links() !!} --}}
</body>
</html>
