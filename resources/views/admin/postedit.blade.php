@extends('admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Post</h1>
          </div>
          {{-- <div class="col-sm-6" >
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create New Post </li>
            </ol>
          </div> --}}
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Bootstrap WYSIHTML5
                <small>Simple and fast</small>
              </h3>
             
              <!-- tools box -->
              <div class="card-tools">
               
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
            <form method="POST" >
              {{ csrf_field() }}
                <div class="row">
                    <div class="col-3">
                      <input type="text" name="post_title" class="form-control" placeholder="Please Enter Your Post Name" value="{{$item->post_title}}">
                    </div>
                    <div class="col-4">
                        <select name="category_id" class="custom-select">
                            <option>Post Category</option>
                            <option>Post Category</option>
                            <option>Post Category</option>
                            <option>Post Category</option>
                            <option>Post Category</option>
                          </select> </div>
                    <div class="col-5">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    
                         <input type="checkbox" name="post_status"{{($item->post_status) ? 'checked' : '' }}  class="custom-control-input" id="customSwitch3">

                            <label class="custom-control-label" for="customSwitch3">ShowPosts</label>
                          </div>
                          <div class="custom-control custom-switch">
                            <input type="checkbox" name="comment_status"{{($item->post_status) ? 'checked' : '' }}  class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">ShowComments</label>
                          </div>
                    </div>
                  </div>
                <hr>
              <div class="mb-3">
                <textarea class="textarea"  name="post_content"placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  >{{$item->post_content}}</textarea>
              </div>
              <p class="text-sm mb-0">
                the writer: <a href="https://github.com/summernote/summernote">{{$user->name}}.</a>
              </p>
              <button type="submit" class="btn btn-block btn-primary btn-lg">Save</button>
            </div>
          </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('title','EmptyPost')