<div class="black paddingTop30 paddingBottom30">	
	<div class="container80 hide-on-med-and-down">
		<div class="row">
			<div class="col m3">
				<h5 class="center yellow-text paddingBottom10">Quick links</h5>
				<div class="collection darkGrey">
					<a href="/" class="waves-effect waves-light darkGrey white-text collection-item">Home</a>
					<a href="/shop" class="waves-effect waves-light darkGrey white-text collection-item">Shop now!</a>
					<a class="waves-effect waves-light darkGrey white-text collection-item">About us</a>
					<a href="/cart" class="waves-effect waves-light darkGrey white-text collection-item">My cart</a>
				</div>
			</div>
			@foreach($categories as $category)
			<div class="col m3">
				<h5 class="center yellow-text paddingBottom10">{{$category->category}}</h5>
				<div class="collection darkGrey">
					@foreach($subcategories as $subcategory)
					@if($subcategory->category_id == $category->id)
						<a href="/shop/catalog/{{$category->id}}/{{$subcategory->id}}" class="waves-effect waves-light darkGrey white-text collection-item">{{$subcategory->subcategory}}</a>
					@endif
					@endforeach
				</div>
			</div>
			@endforeach
			<div class="col m3">
				<h5 class="center yellow-text paddingBottom10">Popular tags</h5>
				@foreach($tags as $tag)
				<span class="chip">{{$tag->tag}}</span>
				@endforeach
			</div>
		</div>
	</div>
	<div class="hide-on-large-only">
		<div class="container90">
			<div class="row yellow-text">
				<div class="col s3 center">
					<a class="waves-effect waves-light yellow-text footerWidget" data-reveal="#quickLink">Quick links</a>
				</div>
				@foreach($categories as $category)
				<div class="col s3 center">
					<a class="waves-effect waves-light yellow-text footerWidget" data-reveal="#footer{{$category->id}}">{{$category->category}}</a>
				</div>
				@endforeach
				<div class="col s2 center">
					<a class="waves-effect waves-light yellow-text footerWidget" data-reveal="#tags">Popular tags</a>
				</div>
			</div>
			<div class="collection darkGrey linkReveal" id="quickLink">
				<a href="/" class="waves-effect waves-light darkGrey white-text collection-item">Home</a>
				<a href="/shop" class="waves-effect waves-light darkGrey white-text collection-item">Shop now!</a>
				<a class="waves-effect waves-light darkGrey white-text collection-item">About us</a>
				<a href="/cart" class="waves-effect waves-light darkGrey white-text collection-item">My cart</a>
			</div>
			<div class="linkReveal hidden" id="tags">
				@foreach($tags as $tag)
				<span class="chip">{{$tag->tag}}</span>
				@endforeach
			</div>
			
			@foreach($categories as $category)
			<div class="collection darkGrey linkReveal hidden" id="footer{{$category->id}}">
				@foreach($subcategories as $subcategory)
					@if($subcategory->category_id == $category->id)
					<a href="/shop/catalog/{{$category->id}}/{{$subcategory->id}}" class="waves-effect waves-light darkGrey white-text collection-item">{{$subcategory->subcategory}}</a>
					@endif
				@endforeach
			</div>
			@endforeach
		</div>
	</div>
</div>

<footer class="darkGrey paddingBottom50">
	<div class="container80 center-align">
		<h5 class="white-text margin0 paddingTop50"><a href="/">Wize Watts</a> &copy; rockin' it since 2018</h5>
	</div>
</footer>