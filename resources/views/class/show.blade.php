@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h5 class="mb-md-0 h6">Class Detail</h5>
                    </div>
                    
                </div>
              <div class="card-body" >
                {{-- <form action="{{route('class.update')}}" method="POST" id="class_from">
                    @csrf --}}
                    {{-- Country Name --}}
                    <input type="hidden" name="id" value={{$class->id}}>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Class Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="class_name" value="{{$class->class_name}}" placeholder="class Name">
                        </div>
                    </div>
                    {{-- Status --}}
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Status</label>
                        <div class="col-md-8">
                            
                            <div style="display: flex;align-items: center">
                                <input  class="radio_button_checkout"  type="radio" id="status" name="status" value="active" @if($class->status == 'active') @checked(true) @endif/>
                                <div style="position: relative;left: 16px;">
                                    <span>Active</span>
                                </div>
                            </div>
                            
                            <div style="display: flex;align-items: center">
                                <input  class="radio_button_checkout" type="radio" id="status" name="status" value="in_active"  @if($class->status == 'in_active') @checked(true)  @endif/>
                                <div style="position: relative;left: 16px;">
                                    <span>In Active</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="mar-all mb-2" style=" text-align: end;">
                            <button type="submit" name="button"  value="publish"
                                class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form> --}}
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