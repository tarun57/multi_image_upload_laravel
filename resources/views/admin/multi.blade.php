<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('upload.store') }}">
	 {{ csrf_field() }}
	<input required type="file" class="form-control" name="image[]" placeholder="address" multiple>
	<input type="text" name="name" id="name">
	<input type="submit" name="submit" value="upload">
</form>
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
                           <td> 
                         
                 @php ($names = [])
                        @php($names[]=explode(',', $upload->image))
                      
                            <img src="image/{{ $names[0][0] }}" class="img" width="500px"  height="200px" />

                            </td>
                            <!-- <td>{{ $upload->email }}</td> -->
                            <!-- <td>{{ $upload->password }}</td> -->

                          <!-- <td><img src="image/{{ $upload->image }}" class="img" width="500px"  height="200px" /></td>  -->

                            <!-- <td><img src="{{ asset($upload->image) }}" /></td> -->
                            <!-- <td><img src="asset(storage/app/{{ $upload->image }})" alt="image"></img></td> -->
                            <!-- <td>{{ $upload->created_at }}</td> -->
                            <!-- <td>{{ $upload->updated_at->diffForHumans() }}</td> -->
                            <td><span class="glyphicon glyphicon-edit"  data-toggle="modal" data-target="#myModal{{$upload->id}}">Edit</span>
</td>
                            <!-- <td><a href="{{ route('upload.edit', ['id' => $upload->id]) }}">edit<span class="glyphicon glyphicon-edit"></span></a></td>
                            <td> -->
                            <td>
                            <form id="delete-form-{{ $upload->id }}" method="post" action="{{ route('upload.destroy',$upload->id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $upload->id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" ><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                          
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
       @foreach($uploads as $upload)      
<!-- Modal -->

<div id="myModal{{$upload->id}}" class="modal fade" role="dialog">
  
 <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit</h4>
          </div>
          <form role="form" action="{{ route('upload.update',$upload->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
          <div class="modal-body">
          <div class="form-group">
                <label class="col-form-label" for="modal-input-id">Image </label>
              <input required type="file" class="form-control" name="image[]" placeholder="address" multiple>
              </div>
            <div class="form-group">  
                <label class="col-form-label" for="modal-input-id">Name </label>
                <input type="text" name="name" class="form-control" id="name" value="{{$upload->name}}" required>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" value="submit" class="btn btn-primary">
            </form>

          </div>
        </div>
      </div>
      
  </div>
  @endforeach
</div>
</body>
</html>
