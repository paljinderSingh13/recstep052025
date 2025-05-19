@extends('layouts.master')
@section('content')

<div class="content-body">
               <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Schedule</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
               <form  action="{{ route('schedule.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="team_id" value="{{$id}}">
                    <div class="row"> 
                        <div class="mb-3 col-md-6">
                            <label for="Type" class="form-label">Type <span class="text-danger">*</span></label>
                            <select class="default-select form-control wide  @error('type') is-invalid @enderror" id="Type" name="type" required>
                                <option selected>Select Type</option>
                                <option value="Tournaments" {{ old('type') == 'Tournaments' ? 'selected' : '' }}>Tournaments</option>
                                <option value="Game" {{ old('type') == 'Game' ? 'selected' : '' }}>Game</option>
                                <option value="Practice" {{ old('type') == 'Practice' ? 'selected' : '' }}>Practice</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="default-select form-control wide  @error('status') is-invalid @enderror" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    <!-- Tournaments Fields -->
                        <div class="mb-3 col-md-6 tournament-fields" style="display: none;">
                            <label for="Team" class="form-label">Opposing Team <span class="text-danger">*</span></label>
                            <select class="default-select form-control wide  @error('team') is-invalid @enderror" id="Team" name="opposing_team_id">
                                <option selected>Select Opposing Team</option>
                                @foreach($teams as $team)
                                <option value="{{$team->name}}" {{ old('team') == $team->id ? 'selected' : '' }}>{{$team->name}}</option>
                                @endforeach
                            </select>
                            @error('team')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 tournament-fields" style="display: none;">
                            <label for="Location" class="form-label">Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="City" name="location" placeholder="Location">
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 tournament-fields" style="display: none;">
                            <label for="City" class="form-label">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="City" name="city" placeholder="City">
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 tournament-fields game-fields" style="display: none;">
                            <label for="Date" class="form-label">Date <span class="text-danger">*</span></label>
                            <input class="form-control @error('date') is-invalid @enderror" type="date" id="Date" name="date" value="{{ old('date') }}">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 tournament-fields game-fields" style="display: none;">
                            <label for="Time" class="form-label">Time <span class="text-danger">*</span></label>
                            <input class="form-control @error('time') is-invalid @enderror" type="time" id="Time" name="time" value="{{ old('time') }}">
                            @error('time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    <!-- Practice Fields -->
                        <div class="mb-3 col-md-6 practice-fields game-fields" style="display: none;">
                            <label for="purposeD" class="form-label">Purpose Detail <span class="text-danger">*</span></label>
                            <input class="form-control @error('purpose_detail') is-invalid @enderror" type="text" id="purposeD" name="purpose_detail" value="{{ old('purpose_detail') }}">
                            @error('purpose_detail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 practice-fields" style="display: none;">
                            <label for="DateFrom" class="form-label">Date From <span class="text-danger">*</span></label>
                            <input class="form-control @error('date_from') is-invalid @enderror" type="date" id="DateFrom" name="date_from" value="{{ old('date_from') }}">
                            @error('date_from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 practice-fields" style="display: none;">
                            <label for="Dateto" class="form-label">Date To <span class="text-danger">*</span></label>
                            <input class="form-control @error('date_to') is-invalid @enderror" type="date" id="Dateto" name="date_to" value="{{ old('date_to') }}">
                            @error('date_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 practice-fields" style="display: none;">
                            <label for="TimeFrom" class="form-label">Time From <span class="text-danger">*</span></label>
                            <input class="form-control @error('time_from') is-invalid @enderror" type="time" id="TimeFrom" name="time_from" value="{{ old('time_from') }}">
                            @error('time_from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 practice-fields" style="display: none;">
                            <label for="Timeto" class="form-label">Time To <span class="text-danger">*</span></label>
                            <input class="form-control @error('time_to') is-invalid @enderror" type="time" id="Timeto" name="time_to" value="{{ old('time_to') }}">
                            @error('time_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    
                    </div>
                        <div class="mt-3">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                                <a href="{{ route('team.info',base64_encode($id)) }}" class="btn btn-danger ">Cancel</a>
                        </div>
                </form>
<!--end form-->            
            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection
@section('js')

<script>
        $(document).on('change','#Type',function(){
           var selectedType = $('#Type').val();
            $('.tournament-fields').css('display','none');
            $('.practice-fields').css('display','none');
            $('.game-fields').css('display','none');

            if (selectedType === 'Tournaments') {
                $('.tournament-fields').css('display','block');
            } else if (selectedType === 'Practice') {
                $('.practice-fields').css('display','block');
            } else if (selectedType === 'Game') {
                $('.game-fields').css('display','block');
            }
        });
</script>
@endsection