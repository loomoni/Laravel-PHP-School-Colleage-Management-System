@extends('layouts.app')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent Student List</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Student</h3>
              </div>
              <!-- form start -->
                <form action="" method="GET">
                  <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Enter Name">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Enter email">
                        </div>

                        <div class="form-group col-md-3">
                          <label for="date">Date</label>
                          <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Date">
                        </div>
                        <div class="form-group col-md-3">
                           <button type="submit" class="btn btn-primary" style="margin-top: 30px; width: 100px">Search</button>
                           <a href="{{ url('admin/parent/my-student/'.$parent_id) }}" class="btn btn-success" style="margin-top: 30px; width: 100px">Clear</a>
                        </div>
                    </div>
                  </div>
                </form>
            </div>


            @include('_message')

            @if (!empty($getSearchRecord))
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Student List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow: auto">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Profile pic</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Parent Name</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count = 0?>
                      <?php $count = 0 ?>
                   @foreach ($getSearchRecord as $value)
                   <?php $count++ ?>
                      <tr>
                        <td>{{$count }}</td>
                        <td>
                          @if (!empty($value->getProfile()))
                            <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; border-radius: 50px" alt=""> 
                          @endif
                        </td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->parent_name }}</td>
                        <td>{{ date('d-m-Y H:i A', ), strtotime($value->created_at)}}</td>
                        <td style="min-width: 150px">
                          @if (!empty($value->parent_id))
                          <a href="#" class="btn btn-success btn-sm">Student Allready Assigned</a>
                          @else
                          <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id)}}" class="btn btn-primary btn-sm">Add Student To Parent</a>
                          {{-- <a href="{{ url('admin/student/delete', $value->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
                          @endif
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
                    </tbody>
                  </table>
                  <div style="padding: 10px; float: right">
                    {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            @endif
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Parent Student List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow: auto">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Profile pic</th>
                        <th>Parent Name</th>
                        <th>Email</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count = 0?>
                      <?php $count = 0 ?>
                   @foreach ($getRecord as $value)
                   <?php $count++ ?>
                      <tr>
                        <td>{{$count }}</td>
                        <td>
                          @if (!empty($value->getProfile()))
                            <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; border-radius: 50px" alt=""> 
                          @endif
                        </td>
                        <td>{{ $value->parent_name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ date('d-m-Y H:i A', ), strtotime($value->created_at)}}</td>
                        <td style="min-width: 150px">
                          @if (!empty($value->parent_id))
                          <a href="#" class="btn btn-success btn-sm">Student Allready Assigned</a>
                          @else
                          <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id)}}" class="btn btn-primary btn-sm">Add Student To Parent</a>
                          {{-- <a href="{{ url('admin/student/delete', $value->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
                          @endif
                        </td>
                      </tr>
                   @endforeach
                    </tbody>
                  </table>
                  <div style="padding: 10px; float: right">
                    {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection