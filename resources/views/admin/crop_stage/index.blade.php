@extends('layouts.app')

@section('content')
    <div class="container p-0">
        <div>
            <a href="{{ route('crop-stages.create') }}" class="btn btn-info mb-4">Create Crop Stage</a>
        </div>
        
        <table class="table table-bordered w-50">
            <thead>
              <tr style="background-color: #666cff;">
                <th scope="col" style="color:white;">Crop Stage</th>
                <th scope="col" style="color:white;">Action</th>
              </tr>
            </thead>
            <tbody>
                @if($cropStages->count())
                    @foreach ($cropStages as $cropStage)  
                        <tr>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="switch-input js-switch-status" {{ $cropStage->status == 'active' ? 'checked' : ''}} data-id={{ $cropStage->id }}>
                                    <span class="switch-toggle-slider">
                                      <span class="switch-on"></span>
                                      <span class="switch-off"></span>
                                    </span>
                                    <span class="switch-label"></span>
                                  </label>

                                {{ $cropStage->name}}
                            </td>
                            <td style="width: 200px;">
                                <a class="rounded-circle btn-primary text-white p-2 avatar avatar-sm me-2" href="{{ route('crop-stages.edit', ['crop_stage' => $cropStage]) }}" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection 

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-switch-status').click(function() {
                var id = $(this).data('id');
                var status = $(this).is(':checked') ? 'active' : 'inactive';
                $.ajax({
                    type: 'post',
                    url:  "{{ route('crop_stage.update_status') }}",
                    data: {
                        'id': id,
                        'status': status,
                    },
                    success: function(response) {

                    }
                });

            });
        });
    </script>
@endpush