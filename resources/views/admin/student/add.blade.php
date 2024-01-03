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
                            <div style="color: red">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="name">Last Name<span style="color: red"> *</span></label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name')}}" required placeholder="Last Name">
                            <div style="color: red">{{ $errors->first('last_name') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="admission_number">Admission Number<span style="color: red"> *</span></label>
                            <input type="text" class="form-control" name="admission_number" value="{{ old('admission_number')}}" required placeholder="Admission Number">
                            <div style="color: red">{{ $errors->first('admission_number') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="roll_number">Roll Number<span style="color: red"></span></label>
                            <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number')}}" placeholder="Roll Number">
                            <div style="color: red">{{ $errors->first('roll_number') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="class">Class<span style="color: red"> *</span></label>
                            <select class="form-control" required name="class_id">
                                <option value="">Select Class</option>
                                @foreach ($getClass as $class)
                                    <option {{ ( old('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{$class->name}}</option>
                                @endforeach
                            </select>
                            <div style="color: red">{{ $errors->first('class_id') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="gender">Gender<span style="color: red"> *</span></label>
                            <select class="form-control" required name="gender">
                                <option value="">Select Gender</option>
                                <option {{ ( old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                <option {{ ( old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                <option {{ ( old('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                            </select>
                            <div style="color: red">{{ $errors->first('gender') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="date_of_birth">Date of Birth<span style="color: red"> *</span></label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth')}}" required>
                            <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="caste">Caste<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="caste" value="{{ old('caste')}}" placeholder="Caste">
                            <div style="color: red">{{ $errors->first('caste') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="religion">Religion<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="religion" value="{{ old('religion')}}" placeholder="Caste">
                        </div>
                        <div class="form-group  col-6">
                            <label for="mobile_number">Mobile Number<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number')}}" placeholder="Mobile Number">
                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="admission_date">Admission Date<span style="color: red"> *</span></label>
                            <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date')}}" required>
                            <div style="color: red">{{ $errors->first('admission_date') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="profile_pic">Profile Picture<span style="color: red"> </span></label>
                            <input type="file" class="form-control" name="profile_pic">
                            <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="blood_group">Blood Group<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group')}}"  placeholder="Blood Group">
                            <div style="color: red">{{ $errors->first('blood_group') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="height">Height<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="height" value="{{ old('height')}}" placeholder="Height">
                            <div style="color: red">{{ $errors->first('height') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="weight">Weight<span style="color: red"> </span></label>
                            <input type="text" class="form-control" name="weight" value="{{ old('weight')}}" placeholder="Weight">
                            <div style="color: red">{{ $errors->first('weight') }}</div>
                        </div>
                        <div class="form-group  col-6">
                            <label for="status">Status<span style="color: red"> *</span></label>
                            <select class="form-control" required name="status">
                                <option {{ ( old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                                <option {{ ( old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                            </select>
                            <div style="color: red">{{ $errors->first('status') }}</div>
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
                    <div style="color: red">{{ $errors->first('password') }}</div>
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