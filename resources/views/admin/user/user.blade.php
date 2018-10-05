
@extends('admin.layouts.app')


@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
      <small>Advanced form element</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Titles</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('info.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="name" placeholder="name">
                </div>

                <div class="form-group">
                  <label for="email">Post email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="email">
                </div>

                <div class="form-group">
                  <label for="password">Post password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>
                
              </div>
              <div class="col-lg-6">
                            <br>
                              <div class="form-group">
                                <div class="pull-right">
                                  <label for="image">File input</label>
                                  <input type="file" name="image[]" id="image" multiple>
                                </div>
                                <div class="checkbox pull-left">
                                  <label>
                                    <input type="checkbox" name="status" value="1"> Publish
                                  </label>
                                </div>
                              </div>
                              <br>
                            </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box">
             <div class="box-header">
               <h3 class="box-title">Write Post Body Here
                 <small>Simple and fast</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
              
             </div>

             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href='{{ route('info.index') }}' class="btn btn-warning">Back</a>
            </div>
          </form>
        </div>
        <!-- /.box -->

        
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
