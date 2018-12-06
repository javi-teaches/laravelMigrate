@extends('template.base')

@section('title', 'Create a product')

@section('content')
	<form method="post" action={{ route('products.store') }}>
		@csrf
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" class="form-control" id="name">
		</div>
		<div class="form-group">
			<label for="price">Price:</label>
			<input type="text" name="price" class="form-control" id="price">
		</div>
		<div class="form-group">
			<label for="category_id">Category:</label>
			<select class="custom-select" name="category_id" id="category_id">
				@foreach ($categories as $category)
					<option value={{ $category->id }}>{{ $category->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="category_id">Brand:</label>
			<select class="custom-select" name="brand_id" id="brand_id">
				@foreach ($brands as $brand)
					<option value={{ $brand->id }}>{{ $brand->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="colors">Color:</label>
			<select class="custom-select {{ $errors->has('colors') ? 'is-invalid' : ''}}" multiple name="colors[]" size="6" id="colors">
				@foreach ($colors as $color)
					<option value={{ $color->id }}>{{ $color->name }}</option>
				@endforeach
			</select>
			<span class="invalid-feedback">
				@if ($errors->has('colors'))
					{{ $errors->first('colors') }}
				@endif
			</span>
			<br><br>
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</form>
@endsection
