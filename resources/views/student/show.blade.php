@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h5 class="mb-md-0 h6">Student Detail</h5>
                    </div>
                    
                </div>
              <div class="card-body" >
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Class Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="class_name" value="{{$class_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="class_name" value="{{$student_data->student_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Age</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="class_name" value="{{$student_data->student_age}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Gender</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="class_name" value="{{$student_data->student_gender}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Phone</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="class_name" value="{{$student_data->student_phone}}" readonly>
                        </div>
                    </div>
                    
                    
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