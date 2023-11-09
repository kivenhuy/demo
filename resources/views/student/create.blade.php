@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h5 class="mb-md-0 h6">Create Student</h5>
                    </div>
                    
                </div>
              <div class="card-body" >
                <form action="{{route('student.store')}}" method="POST" id="student_from">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Class Name</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="class_id" id="class_id">
                                @foreach ($class as $class_data)
                                    <option value="{{ $class_data->id }}">{{ $class_data->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Country Name --}}
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="student_name" placeholder="Student Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Age</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="student_age" placeholder="Student Age">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Phone</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="student_phone" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Student Gender</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    {{-- Status --}}
                    
                    <div class="col-12">
                        <div class="mar-all mb-2" style=" text-align: end;">
                            <button type="submit" name="button"  value="publish"
                                class="btn btn-primary">Create</button>
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