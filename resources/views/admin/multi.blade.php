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
                      <!--  	<?php 
                               $img=array();
                        	//echo  print_r($uploads);
                             foreach($uploads as $val)
                             {
                             	 $val->image;
                              }
                            $image= $val->image;
                            $img=explode(",",$image);
                            //print_r($img);
                            foreach ($img as $key => $value) {
                            	?>
                            	 <!-- <img src="image/<?php echo $value;?>" class="img" width="500px"  height="200px" /> -->
                            	 <!-- <?php
                            }
                        	?>  --> 
                          @foreach ($uploads as $upload)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $upload->name }}</td>
                           <td> 
                         
                 @php ($names = [])
                        @php($names[]=explode(',', $upload->image))
                            <!--{{ $key . ' => ' . $value }} -->
                            <img src="image/{{ $names[0][1] }}" class="img" width="500px"  height="200px" />
                            </td>
                            <!-- <td>{{ $upload->email }}</td> -->
                            <!-- <td>{{ $upload->password }}</td> -->

                          <!-- <td><img src="image/{{ $upload->image }}" class="img" width="500px"  height="200px" /></td>  -->

                            <!-- <td><img src="{{ asset($upload->image) }}" /></td> -->
                            <!-- <td><img src="asset(storage/app/{{ $upload->image }})" alt="image"></img></td> -->
                            <!-- <td>{{ $upload->created_at }}</td> -->
                            <!-- <td>{{ $upload->updated_at->diffForHumans() }}</td> -->
                            <td><a href="{{ route('upload.edit',$upload->id) }}">edit<span class="glyphicon glyphicon-edit"></span></a></td>
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
                                  }" >delete<span class="glyphicon glyphicon-trash"></span></a>
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