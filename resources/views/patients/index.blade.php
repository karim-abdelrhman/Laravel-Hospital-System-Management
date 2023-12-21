@extends('layouts.app')
@section('content')

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{URL::asset('assets/dist/img/user1-128x128.jpg')}}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <a href="{{route('patients.create')}}" type="button" class="btn btn-inline btn-primary btn-lg">Add Patient</a>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>السن</th>
                            <th>النوع</th>
                            <th>العنوان</th>
                            <th>رقم الموبايل</th>
                            @if(auth()->user()->role === 'admin')
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->id}}</td>
                                <td>{{$patient->Fname}}</td>
                                <td>{{$patient->age}}</td>
                                <td> {{$patient->gender}}</td>
                                <td>{{$patient->address}}</td>
                                <td>{{$patient->phone}}</td>

                                @if(auth()->user()->role === 'admin')
                                    <td>
                                        <a href="{{route('patients.edit' , $patient->id)}}" class="btn btn-success">Edit</a>
                                        {{--                            <a href="{{route('patients.destroy' , $patient->id)}}" class="btn btn-danger">Delete</a>--}}
                                        <a type="button"
                                           class="btn btn-danger"
                                           data-toggle="modal"
                                           data-target="#delete_patient"
                                           data-patient_id="{{$patient->id}}">Delete</a>

                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            {{--  Delete Patient  --}}
            {{--   Model     --}}
            <div class="modal fade" id="delete_patient">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h4 class="modal-title">حذف بيانات المريض</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{route('patients.destroy' , 'test')}}" method="post">
                            @method('delete')
                            @csrf
                            <div class="modal-body">
                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                <input type="hidden" name="id" id="id" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary justify-content-between" data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-danger">تاكيد</button>
                            </div>
                        </form>


                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </div>
    <!-- ./wrapper -->
@endsection
@section('js')

<script>
    $('#delete_patient').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var patient_id = button.data('patient_id')
        var modal = $(this)
        modal.find('.modal-body #id').val(patient_id);
    })

</script>

@endsection
