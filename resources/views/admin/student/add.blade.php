@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
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
              <form action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">First Name <span style="color: red"> *</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name')}}" required placeholder="First Name">
                        </div>
                        <div class="form-group  col-6">
                            <label for="name">Last Name<span style="color: red"> *</span></label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name')}}" required placeholder="Last Name">
                        </div>
                        <div class="form-group  col-6">
                            <label for="admission_number">Admission Number<span style="color: red"> *</span></label>
                            <input type="text" class="form-control" name="admission_number" value="{{ old('admission_number')}}" required placeholder="Admission Number">
                        </div>
                        <div class="form-group  col-6">
                            <label for="roll_number">Roll Number<span style="color: red"></span></label>
                            <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number')}}" placeholder="Roll Number">
                        </div>
                        <div class="form-group  col-6">
                            <label for="class">Class<span style="color: red"> *</span></label>
                            <select class="form-control" required name="class_id">
                                <option value="">Select Class</option>
                                @foreach ($getClass as $class)
                                    <option value="{{ $class->id }}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group  col-6">
                            <label for="gender">Gender<span style="color: red"> *</span></label>
                            <select class="form-control" required name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group  col-6">
                            <label for="date_of_birth">Date of Birth<span style="color: red"> *</span></label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth')}}" required>
                        </div>
                        <div class="form-group  col-6">
                            <label for="caste">Caste<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="caste" value="{{ old('caste')}}" placeholder="Caste">
                        </div>
                        <div class="form-group  col-6">
                            <label for="religion">Religion<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="religion" value="{{ old('religion')}}" placeholder="Caste">
                        </div>
                        <div class="form-group  col-6">
                            <label for="mobile_number">Mobile Number<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number')}}" placeholder="Mobile Number">
                        </div>
                        <div class="form-group  col-6">
                            <label for="admission_date">Admission Date<span style="color: red"> *</span></label>
                            <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date')}}" required>
                        </div>
                        <div class="form-group  col-6">
                            <label for="profile_pic">Profile Picture<span style="color: red"> </span></label>
                            <input type="file" class="form-control" name="profile_pic">
                        </div>
                        <div class="form-group  col-6">
                            <label for="blood_group">Blood Group<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group')}}"  placeholder="Blood Group">
                        </div>
                        <div class="form-group  col-6">
                            <label for="height">Height<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="height" value="{{ old('height')}}" placeholder="Height">
                        </div>
                        <div class="form-group  col-6">
                            <label for="weight">Weight<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="weight" value="{{ old('weight')}}" placeholder="Weight">
                        </div>
                        <div class="form-group  col-6">
                            <label for="status">Gender<span style="color: red"> *</span></label>
                            <select class="form-control" required name="status">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <hr/>
                  
                  <div class="form-group">
                    <label for="email">Email<span style="color: red"> *</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email')}}" required placeholder="Enter email">
                    <div style="color: red">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password<span style="color: red"> *</span></label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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