@include('nav')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit razor Form - Laravel 9 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Razor</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('razors.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('razors.update',$razor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<strong>{{ $message }}</strong>
			</div>
			@endif
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Manufacturer:</strong>
						<select class="browser-default custom-select" name="manufacturerId" id="manufacturerId">
							   	<option>--Select Manufacturer--</option>
								   @foreach ($manufacturers as $manufacturer)							   
								   <option value="{{ $manufacturer->id }}" {{ $manufacturer->id == $razor->manufacturerId ? 'selected' : '' }}>{{ $manufacturer->name }}</option>
							   	@endforeach
						   </select>
                        @error('manufacturerId')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Brand:</strong>
						<select class="browser-default custom-select" name="brandId" id="brandId">
							<option>--Select Brand--</option>
							@foreach ($brands as $brand)
							<option value="{{ $brand->id }}" {{ $brand->id == $razor->brandId ? 'selected' : '' }}>{{ $brand->name }}</option>
							@endforeach
						</select>
                        @error('brandId')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tang Text Front:</strong>
                        <input type="text" name="tangTextFront" value="{{ $razor->tangTextFront }}" class="form-control"
                            placeholder="tangTextFront">
                        @error('tangTextFront')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tang Text Back:</strong>
                        <input type="text" name="tangTextBack" value="{{ $razor->tangTextBack }}" class="form-control"
                            placeholder="tangTextBack">
                        @error('tangTextBack')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Blade Text Front:</strong>
                        <input type="text" name="bladeTextFront" value="{{ $razor->bladeTextFront }}" class="form-control"
                            placeholder="bladeTextFront">
                        @error('bladeTextFront')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Earliest Year:</strong>
                        <input type="text" name="earliestYear" value="{{ $razor->earliestYear }}" class="form-control"
                            placeholder="earliestYear">
                        @error('earliestYear')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Latest Year:</strong>
                        <input type="text" name="latestYear" value="{{ $razor->latestYear }}" class="form-control"
                            placeholder="latestYear">
                        @error('latestYear')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Scale Material:</strong>
                        <input type="text" name="scaleMaterialId" value="{{ $razor->scaleMaterialId }}" class="form-control"
                            placeholder="scaleMaterialId">
                        @error('scaleMaterialId')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Scale Text:</strong>
                        <input type="text" name="scaleText" value="{{ $razor->scaleText }}" class="form-control"
                            placeholder="scaleText">
                        @error('scaleText')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Scale Description:</strong>
                        <input type="text" name="scaleDescription" value="{{ $razor->scaleDescription }}" class="form-control"
                            placeholder="scaleDescription">
                        @error('scaleDescription')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Blade Description:</strong>
                        <input type="text" name="bladeDescription" value="{{ $razor->bladeDescription }}" class="form-control"
                            placeholder="bladeDescription">
                        @error('bladeDescription')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Condition When Bought:</strong>
                        <input type="text" name="conditionWhenBought" value="{{ $razor->conditionWhenBought }}" class="form-control"
                            placeholder="conditionWhenBought">
                        @error('conditionWhenBought')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>known Country:</strong>
                        <input type="text" name="knownCountryMadeIn" value="{{ $razor->knownCountryMadeIn }}" class="form-control"
                            placeholder="knownCountryMadeIn">
                        @error('knownCountryMadeIn')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Blade Text Front:</strong>
                        <input type="text" name="bladeTextFront" value="{{ $razor->bladeTextFront }}" class="form-control"
                            placeholder="bladeTextFront">
                        @error('bladeTextFront')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Image ID:</strong>
						<input type="text" name="imageId" value="{{ $razor->imageId }}" class="form-control"
						placeholder="imageId" id="imageId">
						@error('imageId')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>				
				</div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
		@include('ImageUploads/index')
    </div>
</body>

</html>
