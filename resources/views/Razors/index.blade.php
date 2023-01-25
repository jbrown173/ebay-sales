@include('nav')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Razors</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Razors</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('razors.create') }}"> Create Razor Record</a>
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
<th>Manufacturer</th>
<th>Brand</th>
{{-- <th>Tang Text - Front</th>
<th>Tang Text - Back</th>
<th>Blade Text</th> --}}
<th>Earliest Year</th>
<th>Latest Year</th>
<th>Scale Material</th>
<th>Scale Text</th>
{{-- <th>Scale Description</th>
<th>Blade Description</th>
<th>Condition When Bought</th> --}}
<th>Known Country</th>
<th>Possible Country</th>
<th width="280px">Action</th>
</tr>
@foreach ($razors as $razor)
<tr>
<td>{{ $razor->manufName }}</td>
<td>{{ $brand[0]->brandName }}</td>
{{-- <td>{{ $razor->tangTextFront }}</td>
<td>{{ $razor->tangTextBack }}</td>
<td>{{ $razor->bladeTextFront }}</td> --}}
<td>{{ $razor->earliestYear }}</td>
<td>{{ $razor->latestYear }}</td>
<td>{{ $scalematerial[0]->scaleMaterial }}</td>
<td>{{ $razor->scaleText }}</td>
{{-- <td>{{ $razor->scaleDescription }}</td>
<td>{{ $razor->bladeDescription }}</td>
<td>{{ $razor->conditionWhenBought }}</td> --}}
<td>{{ $razor->knownCountryMadeIn }}</td>
<td>{{ $razor->guessedCountryMadeIn }}</td>
<td>
<form action="{{ route('razors.destroy',$razor->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('razors.edit',$razor->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{{-- {!! $razors->links() !!} --}}
</body>
</html>
