
@extends('admin.layouts.app')


@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blank page
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">name</h3>
       
          <a class='col-lg-offset-5 btn btn-success' href="{{ route('info.create') }}">Add New</a>
          <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <div>
                   
   
                    <!-- <img src="{{ asset("storage/0hJ35KQxKfCpPjFk2UgT4lKhgSZQnLWVDjv8PVED.jpeg")}}" />  -->

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                      
                        <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Image</th>
                          <th>Creatd At</th>
                          <th>Updated At</th>
                          
                          @can('infos.update',Auth::user())
                          <th>Edit</th>
                          @endcan
                           @can('infos.delete', Auth::user())
                          <th>Delete</th>
                          @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($infos as $info)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $info->name }}</td>
                            <td>{{ $info->email }}</td>
                            <td>{{ $info->password }}</td>

                          <td>
                            @php ($names = [])
                        @php($names[]=explode(',', $info->image))
                        <img src="image/{{ $names[0][0] }}" class="img" width="100px"  height="100px" /></td> 

                            <!-- <td><img src="{{ asset($info->image) }}" /></td> -->
                           
 <!-- <td><img src="asset(storage/app/{{ $info->image }})" alt="image"></img></td> -->
                       <td>{{ $info->created_at->diffForHumans() }}</td>
                            <td>{{ $info->updated_at->diffForHumans() }}</td>
                            <td> <a href="{{ route('info.edit',$info->id) }}">  <span onclick="update_action(' + rowIndex + ')" class="glyphicon glyphicon-edit"></span></a> <a href="#" class="table-link" onclick="update_action(' + rowIndex + ')"> Edit</a></td>
                            <td>
                              <form id="delete-form-{{ $info->id }}" method="post" action="{{ route('info.destroy',$info->id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $info->id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" ><span class="glyphicon glyphicon-trash"></span></a>
                            </td> 
                            <td>
                            
    <script src="//code.jquery.com/jquery.min.js"></script>

<script src="{{ asset('js/jquery.tabledit.min.js') }}"></script>
       
   <script>
$( document ).ready(function() {

}); 
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
$('#example1').Tabledit({

  url: '{{route('info.update',$info->id)}}',
  columns: {
    identifier: [0, 1], 
    editable: [[1, 'col1'], [2, 'col1'], [3, 'col3']]

  }

});
</script></td>
                          
                          </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Image</th>
                          <th>Creatd At</th>
                             <th>Updated At</th>
                          @can('infos.update',Auth::user())
                          <th>Edit</th>
                          @endcan
                           @can('infos.delete', Auth::user())
                          <th>Delete</th>
                          @endcan
                        </tr>
                        </tfoot>
                      </table>
                      

            </div>
                    <!-- /.box-body -->
                  </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection

