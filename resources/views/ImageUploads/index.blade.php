<html>
	<head>
		<title>Image Upload</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"> </script>
		<script src="http://malsup.github.com/jquery.form.js"> </script>
	</head>
	<body>


	<div class="container">		
		<div class="alert" id="message" style="display: none"></div>

		<!--<form action="{{ route('imageUploads.index') }}" enctype="multipart/form-data" method="POST">-->
		<form method="post" id="upload_form" enctype="multipart/form-data">
			@csrf
			<div class="alert alert-danger print-error-msg" style="display:none">
				<ul></ul>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<!--<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" placeholder="Name">
			</div>-->
			<div class="form-group">
				<label>Image</label>
				<input type="file" name="image" class="form-control">

			</div>
			<div class="form-group">
				<button class="btn btn-success upload-image" type="button" id="imageUploadSubmit">Upload Image</button>
			</div>
		</form>
		<span id="uploaded_image"></span>
		<span id="image_dbKey"></span>

	</div>
	<script>
		$(document).ready(function() {

			$('#imageUploadSubmit').click(function(event) {
				event.preventDefault();
				$.ajax({
					url:"{{ route('imageUploads.imageUploadPost') }}",
					method:"POST",
					data:new FormData(document.getElementById('upload_form')),
					dataType:'JSON',
					contentType: false,
					cache: false,
					processData: false,
					success:function(data) {
						$('#message').css('display', 'block');
						$('#message').html(data.success);
						$('#message').addClass(data.class_name);
						$('#uploaded_image').html(data.uploaded_image);
						$('#imageId').val(data.image_dbKey);
					}
				})
			});

		});
	</script>
</body>
</html>