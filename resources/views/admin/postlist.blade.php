@extends('admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="card" style="display: contents;">
        <div class="card-header">
          <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>                  
              <tr>
                <th style="width: 10px">#</th>
                <th>Post Name</th>
                <th>Popularity</th>
                <th style="width: 40px">View</th>
                <th style="width: 40px">Delete</th>
                <th style="width: 40px">Edit</th>
                <th style="width: 40px">Comments</th>
                <th style="width: 40px">Likes</th>
              </tr>
            </thead>
            @foreach ($items as $item)
            <tbody>
              <tr>
                <td>{{$item->id}}.</td>
                <td>{{$item->post_title}}</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                  </div>
                </td>
              <td><a class="btn btn-app">
                    <span class="badge bg-purple">{{$item->post_views}}</span>
                    <i class="fas fa-users"></i> Users
                  </a></td>
                <td><a class="btn btn-app" href="{{route('postsdelete',$item->id)}}">
                    <i class="fas fa-trash"></i> Delete
                  </a></td>
                <td><a class="btn btn-app" href="{{route('postedit',$item->id)}}">
                    <i class="fas fa-edit"></i> Edit
                  </a></td>
                <td><a class="btn btn-app" href="{{$item->id}}">
                    <span class="badge bg-info">{{$item->comment_count}}</span>
                    <i class="fas fa-envelope"></i> Inbox</a></td>
                <td><a class="btn btn-app">
                    <span class="badge bg-danger">{{$item->post_Likes}}</span>
                    <i class="fas fa-heart"></i> Likes  </a></td>
              </tr>
              {{-- <tr>
                <td>2.</td>
                <td>Clean database</td>
                <td>
                  <div class="progress progress-xs">
                    <div class="progress-bar bg-warning" style="width: 70%"></div>
                  </div>
                </td>
                <td><a class="btn btn-app">
                    <span class="badge bg-purple">891</span>
                    <i class="fas fa-users"></i> Users
                  </a></td>
                <td><a class="btn btn-app">
                    <i class="fas fa-trash"></i> Delete
                  </a></td>
                <td><a class="btn btn-app">
                    <i class="fas fa-edit"></i> Edit
                  </a></td>
                <td><a class="btn btn-app">
                    <span class="badge bg-info">12</span>
                    <i class="fas fa-envelope"></i> Inbox
                  </a></td>
                <td><a class="btn btn-app">
                    <span class="badge bg-danger">531</span>
                    <i class="fas fa-heart"></i> Likes
                  </a></td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Cron job running</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar bg-primary" style="width: 30%"></div>
                  </div>
                </td>
                <td><a class="btn btn-app">
                    <span class="badge bg-purple">891</span>
                    <i class="fas fa-users"></i> Users
                  </a></td>
                <td><a class="btn btn-app">
                    <i class="fas fa-trash"></i> Delete
                  </a></td>
                <td><a class="btn btn-app">
                    <i class="fas fa-edit"></i> Edit
                  </a></td>
                <td><a class="btn btn-app">
                    <span class="badge bg-info">12</span>
                    <i class="fas fa-envelope"></i> Inbox
                  </a></td>

                  <td><a class="btn btn-app">
                    <span class="badge bg-danger">531</span>
                    <i class="fas fa-heart"></i> Likes
                  </a></td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Fix and squish bugs</td>
                <td>
                  <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar bg-success" style="width: 90%"></div>
                  </div>
                </td>
                <td><a class="btn btn-app">
                    <span class="badge bg-purple">891</span>
                    <i class="fas fa-users"></i> Users
                  </a></td>
                <td><a class="btn btn-app">
                    <i class="fas fa-trash"></i> Delete
                  </a></td>
                <td><a class="btn btn-app">
                    <i class="fas fa-edit"></i> Edit
                  </a></td>
                <td><a class="btn btn-app">
                    <span class="badge bg-info">12</span>
                    <i class="fas fa-envelope"></i> Inbox
                  </a></td>
                <td><a class="btn btn-app">
                    <span class="badge bg-danger">531</span>
                    <i class="fas fa-heart"></i> Likes
                  </a></td>
              </tr> --}}
            </tbody>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
          </ul>
        </div>
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('title','EmptyPost')