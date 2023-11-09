@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h5 class="mb-md-0 h6">Edit class</h5>
                    </div>
                    
                </div>
              <div class="card-body" >
                <form action="{{route('student.update')}}" method="POST" id="class_from">
                    @csrf
                    {{-- Country Name --}}
                    <input type="hidden" name="id" value={{$student_data->id}}>
                    <input type="hidden" name="class_name" value={{$class_id}}>
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Class Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="" value="{{$class_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="student_name" value="{{$student_data->student_name}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Age</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="student_age" value="{{$student_data->student_age}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Gender</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="gender" id="gender">
                                <option value="Male" @if($student_data->student_gender == 'Male') @checked(true) @endif>Male</option>
                                <option value="Female" @if($student_data->student_gender == 'Female') @checked(true) @endif>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Phone</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="student_phone" value="{{$student_data->student_phone}}" >
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mar-all mb-2" style=" text-align: end;">
                            <button type="submit" name="button"  value="publish"
                                class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
   
@stop
@push('scripts')
<script type="text/javascript">
</script>
@endpush