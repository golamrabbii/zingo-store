<form action="{{ url('/carts') }}" method="post">
	{{ csrf_field()  }}
	<input type="hidden" name="product_id" value="{{ $product->id }}">
	<button class="custom_btn" type="submit">
		<i class="ti-shopping-cart"></i>
	</button>
</form>
