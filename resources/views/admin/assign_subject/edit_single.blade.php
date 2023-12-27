@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Assign Subject</h1>
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
            <div class="card card-primary">
              <!-- form start -->
              <form action="" method="POST">
                {{ csrf_field() }}
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Class Name</label>
                                <select name="class_id" class="form-control" required>
                                  <option value="">Select Class</option>
                                  @foreach ($getClass as $class)
                                     <option {{ ($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Subject Name</label>
                                <select name="subject_id" class="form-control" required>
                                  <option value="">Select Class</option>
                                  @foreach ($getSubjects as $subject)
                                     <option {{ ($getRecord->subject_id == $subject->id) ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                            <label for="name">Status</label>
                            <select name="status" class="form-control">
                                <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                            </select>
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