@foreach ($uploads as $upload)
<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('upload.update',$upload->id) }}">
	 {{ csrf_field() }}
	<input required type="file" class="form-control" name="image[]" placeholder="address" multiple>
	<input type="text" name="name" id="name">
	<input type="submit" name="submit" value="upload">
</form>
@endforeach
<table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                        
                         
                        </tr>
                        </thead>
                        <tbody>
                          
                        @foreach ($uploads as $upload)

                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $upload->name }}</td>
                           
                         <td><img src="http://localhost/laravels/project/public/image/{{ $upload->image }}" class="img" width="500px"  height="200px" /></td>

                            <!-- <td><img src="{{ asset($upload->image) }}" /></td> -->
                            <!-- <td><img src="asset(storage/app/{{ $upload->image }})" alt="image"></img></td> -->
                            <!-- <td>{{ $upload->created_at }}</td> -->
                            <!-- <td>{{ $upload->updated_at->diffForHumans() }}</td> -->
                            
                          </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                          <!-- <th>S.No</th>
                          <th>Name</th>
                          <th>image</th>
                          -->
                         
                             <!-- <th>Updated At</th> -->
                          @can('uploads.update',Auth::user())
                          <th>Edit</th>
                          @endcan
                           @can('uploads.delete', Auth::user())
                          <th>Delete</th>
                          @endcan
                        </tr>
                        </tfoot>
                      </table>