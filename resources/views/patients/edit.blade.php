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
                <h3 class="text-center">تحديث بيانات المريض</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('patients.update' , $patient->id)}}" method="post" enctype="multipart/form-data"
                  autocomplete="off">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="fname">الاسم الأول</label>
                        <input type="text" class="form-control" id="fname" name="fname" value="{{$patient->Fname}}">
                    </div>
                    <div class="form-group">
                        <label for="lname">الاسم الأخير</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="{{$patient->Lname}}">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{$patient->age}}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>

                        <select name="gender" id="gender">
                            <option value="{{$patient->gender}}" selected>{{$patient->gender}}</option>
                            <option value="F">Femal</option>
                            <option value="M">Mela</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$patient->address}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$patient->phone}}">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block text-center">تحديث</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    </div>
@endsection

