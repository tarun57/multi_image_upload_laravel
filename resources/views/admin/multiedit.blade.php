
<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('upload.update',$uploads['id']) }}">
   {{ csrf_field() }}
     {{ method_field('PATCH') }}
  <input required type="file" class="form-control" name="image[]" placeholder="address" multiple>
  <input type="text" name="name" id="name" value="{{$uploads['name']}}">
  <input type="submit" name="submit" value="upload">
</form>



    @foreach(explode(',', $uploads['image']) as $upload)

                         
<img src="http://localhost/laravel/public/image/{{ $upload }}" class="img" width="500px"  height="200px" />

<form id="delete-form-{{ $upload }}" method="post" action="{{ route('upload.destroy',$upload) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $upload }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" >delete<span class="glyphicon glyphicon-trash"></span></a>
                @endforeach
