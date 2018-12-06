@extends('template.base')

@section('title', 'Products list')

@section('content')
	<table class="table table-striped table-responsive">
		<thead class="thead-dark">
			<th scope="col">Image</th>
			<th scope="col">Name</th>
			<th scope="col">Category</th>
			<th scope="col">Brand</th>
			<th scope="col">Colors</th>
		</thead>
		<tbody>
			@foreach ($products as $product)
				<tr>
					<td class="align-middle"><img src="/images/{{ $product->image }}" width="100" class="img-thumbnail rounded">
					<td class="align-middle"><h3>{{ $product->name }}</h3></td>
					<td class="align-middle">{{ $product->category->name }}</td>
					<td class="align-middle">{{ $product->brand->name }}</td>
					<td class="align-middle">
						<ul>
						@foreach ($product->colors as $color)
							<li>{{ $color->name }}</li>
						@endforeach
						</ul>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
