@extends('layouts.app')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List (Total: {{ $getRecord->total() }}) </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Add New Student</a>
            </ol>
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
                           <a href="{{ url('admin/student/list') }}" class="btn btn-success" style="margin-top: 30px; width: 100px">Clear</a>
                        </div>
                    </div>
                  </div>
                </form>
            </div>


            @include('_message')
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
                      <th>Profile Picture</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Caste</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Status</th>
                      {{-- <th>Created Date</th> --}}
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
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
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->admission_number }}</td>
                        <td>{{ $value->roll_number }}</td>
                        <td>{{ $value->class_name }}</td>
                        <td>{{ $value->gender }}</td>
                        <td>{{ $value->date_of_birth }}</td>
                        <td>{{ $value->caste }}</td>
                        <td>{{ $value->religion }}</td>
                        <td>{{ $value->mobile_number }}</td>
                        <td>{{ $value->admission_date }}</td>
                        <td>{{ $value->blood_group }}</td>
                        <td>{{ $value->height }}</td>
                        <td>{{ $value->weight }}</td>
                        <td>
                          @if ($value->status == 0)
                            Active
                          @else
                            Inactive
                          @endif
                          </td>
                        {{-- <td>{{ date('d-m-Y H:i A', ), strtotime($value->created_at)}}</td> --}}
                        <td style="min-width: 150px">
                          <a href="{{ url('admin/student/edit', $value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ url('admin/student/delete', $value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                   @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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