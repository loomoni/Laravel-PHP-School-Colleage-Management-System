@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            @include('_message')
            <div class="card card-primary">
              <!-- form start -->
              <form action="" method="POST">
                {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Old Password</label>
                            <input type="password" class="form-control" name="old_password" required placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <label for="name">New Password</label>
                            <input type="password" class="form-control" name="new_password" required placeholder="New Password">
                        </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection