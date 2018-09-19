<form class="form-horizontal" enctype="multipart/form-data" method="post" action="/details">
	 {{ csrf_field() }}
	<input required type="file" class="form-control" name="image[]" placeholder="address" multiple>
	<input type="text" name="name" id="name">
	<input type="submit" name="submit" value="upload">
</form>