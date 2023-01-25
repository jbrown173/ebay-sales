@include('nav')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Whetstones</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Whetstones</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('whetstones.create') }}"> Create Whetstone Record</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
  <table class="table table-striped">
<tr>

<th>Name</th>
<th>Description</th>
<th>Grit Estimate</th>
<th width="280px">Action</th>
</tr>
@foreach ($whetstones as $whetstone)
<tr>

<td>{{ $whetstone->name }}</td>
<td>{{ $whetstone->description }}</td>
<td>{{ $whetstone->gritEstimate }}</td>
<td>
<form action="{{ route('whetstones.destroy',$whetstone->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('whetstones.edit',$whetstone->id) }}">Edit</a>
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
