@extends('layouts.app')
@section('content')
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{URL::asset('assets/dist/img/user1-128x128.jpg')}}" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">اضافة مريض</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('patients.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">الاسم الأول</label>
                            <input type="text" class="form-control @error('fname') is-invalid @enderror"  id="fname" name="fname" placeholder="Enter First Name.." required>
                            @error('fname')
                            <div class="alert alert-danger">{{ 'the first name must be (not less than 5 chars) & (not greater than 55 chars)' }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lname">الاسم الأخير</label>
                            <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" placeholder="Enter Last Name.." required>
                            @error('lname')
                            <div class="alert alert-danger">{{'the first name must be (not less than 5 chars) & (not greater than 55 chars)'}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Enter Age..." required>
                            @error('age')
                            <div class="alert alert-danger">{{'Must be A Number'}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>

                            <select name="gender" id="gender">
                                <option value="F">Femal</option>
                                <option value="M">Mela</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required placeholder="Enter Your Address...">
                            @error('address')
                            <div class="alert alert-danger">{{'This field is required'}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter Your Number...">
                            @error('phone')
                            <div class="alert alert-danger">{{'Must Be A Number'}}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block text-center">اضافة مريض</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection
