@extends('admin.index')
@section('content')
<style>
  ol{
    list-style: decimal;
    padding: 2px 25px 2px;

  }
  </style>

<div class="content-wrapper" style="min-height: 1246.8px;">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Category List</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
    <!-- ./col -->
 
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-text-width"></i>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         
          <ol >
            @foreach($categories as $category)
            <li>{{ $category->cat_title }} </li><i class=" fa fa-battery-empty"><i>
              @foreach($subcategories as $subcategory)
               @if ($subcategory->parent_id == $category->id)
              <ol >
                <li>{{ $subcategory->cat_title }} </li>
              </ol>
                 @endif
                   @endforeach
                   @endforeach
          </ol>
     
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    <!-- ./col -->
              </div>

     
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Category Create</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form role="form" method="POST">
                  @csrf
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="cat_title" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Slug</label>
                          <input type="text" class="form-control" name="cat_slug" placeholder="Enter ..." >
                        </div>
                      </div>
                    </div>
             
                      <div class="form-group">
                        <label>Select</label>
                     
                        <select class="form-control" name="parent_id">


                          {{-- @foreach($categories as $category)
                          <li>{{ $category->cat_title }}</li>
                          
                            @foreach($subcategories as $subcategory)
                             @if ($subcategory->parent_id == $category->id)
                            <ol >
                              <li>{{ $subcategory->cat_title }}</li>
                            </ol>
                               @endif
                                 @endforeach
                          
                          @endforeach              
                                       --}}
                          @if (!empty($category))
                          <option value="0">Not parent</option>
                           @foreach($categories as $category)
                           <option value="{{$category->id}}"> {{ $category->cat_slug }}</option>
                          @endforeach
                          @else
                          <option>Not Exist</option>
                          @endif
                       
                        </select>
                      </div>
                      <div class="row">
                      <div class="col-sm-12">
                        <!-- textarea -->
          
                        <div class="form-group">
                          <label>Textarea</label>
                          <textarea class="form-control" rows="3" name="cat_description" placeholder="Enter ..."></textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-block bg-gradient-secondary btn-lg">Secondary</button>
                    <!-- input states -->

                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
</div>


@endsection
@section('title','EmptyPost')