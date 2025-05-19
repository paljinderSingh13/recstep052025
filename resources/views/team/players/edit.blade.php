@extends('layouts.master')

@section('content')
    <div class="content-body">
             <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Player Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <form action="{{ route('player.update', $player->id) }}" method="POST" enctype="multipart/form-data" class="row">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="team_id" id="team_id" value="{{$player->team_id}}">
                                    <div class="row">
                                    <!-- Picture -->
                                    <div class="mb-3 col-md-6">
                                        <label for="picture" class="form-label">Picture</label>
                                        <input type="file" name="picture" id="picture" class="form-control" accept="image/*"
                                            onchange="previewImage(event, 'picturePreview')" >
                                        <!-- Display the current image if exists -->
                                        <img id="picturePreview" src="{{ $player->picture ? asset($player->picture) : '#' }}" 
                                             alt="Picture Preview" style="display: {{ $player->picture ? 'block' : 'none' }}; max-height: 100px;max-width: 200px; margin-top: 10px;">
                                        @error('picture')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Name -->
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $player->name) }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Type -->
                                    <div class="mb-3 col-md-6">
                                        <label for="type" class="form-label">Type</label>
                                        <select name="type" id="type" class="form-select" required>
                                            <option value="permanent" {{ old('type', $player->type) == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                            <option value="substitute" {{ old('type', $player->type) == 'substitute' ? 'selected' : '' }}>Substitute</option>
                                        </select>
                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Priority -->
                                    <div class="mb-3 col-md-6">
                                        <label for="priority" class="form-label">Priority</label>
                                        <select name="priority" id="substitute" class="form-select" required style="{{ $player->type == 'substitute' ? '' : 'display: none;' }}">
                                            @for($i = 1; $i <= 15; $i++)
                                                @if(!in_array($i, $players['substitute']))
                                                    <option value="{{ $i }}" >{{ $i }}</option>
                                                @else
                                                @if($player->priority == $i)
                                                    <option value="{{ $i }}" {{ old('priority', $player->priority) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endif
                                                @endif
                                            @endfor
                                        </select>
                                        <select name="priority" id="permanent" class="form-select" required style="{{ $player->type == 'permanent' ? '' : 'display: none;' }}">
                                            @for($i = 1; $i <= 15; $i++)
                                                @if(!in_array($i, $players['permanent']))
                                                    <option value="{{ $i }}" >{{ $i }}</option>
                                                @else
                                                @if($player->priority == $i)
                                                    <option value="{{ $i }}" {{ old('priority', $player->priority) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endif
                                                @endif
                                            @endfor
                                        </select>
                                        @error('priority')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="mb-3 col-md-6">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob', $player->dob) }}" max="{{ date('Y-m-d') }}" required>
                                        @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Proof ID -->
                                    <div class="mb-3 col-md-6">
                                        <label for="proof_id" class="form-label">Proof ID</label>
                                        <input type="file" name="proof_id" id="proof_id" class="form-control" accept="image/*"
                                            onchange="previewImages(event, 'proofPreview')">
                                        <!-- Display the current proof ID image if exists -->
                                        <img id="proofPreview" src="{{ $player->proof_id ? asset($player->proof_id) : '#' }}" 
                                             alt="Proof ID Preview" style="display: {{ $player->proof_id ? 'block' : 'none' }}; max-width: 300px; margin-top: 10px;">
                                        @error('proof_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="mb-3 col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $player->phone) }}" required>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $player->email) }}" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="1" {{ old('status', $player->status) == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $player->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Submit and Cancel Buttons -->
                                        <div class="mt-3">
                                            
                                                <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Update</button>
                                            
                                                <a href="{{ url()->previous() }}" type="button" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection

@section('js')
    <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('picturePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewImages(event, previewId) {
        var output = document.getElementById(previewId);
        if (!output) {
            console.error('Element with ID ' + previewId + ' not found.');
            return;
        }

        // Check if a file is selected
        if (!event.target.files || !event.target.files[0]) {
            console.error('No file selected.');
            return;
        }

        var reader = new FileReader();
        reader.onload = function() {
            // Ensure the output element is set up correctly
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    function togglePriorityDropdown(type) {
        document.getElementById('priorityPermanent').style.display = type === 'permanent' ? 'block' : 'none';
        document.getElementById('prioritySubstitute').style.display = type === 'substitute' ? 'block' : 'none';
    }
</script>
<script>
    $(document).ready(function() {
            $(document).on('change','#type',function(){
                var type = $(this).val();
                if(type == 'permanent'){
                    $('#permanent').show();
                    $('#permanent').css('display','block');
                    $('#substitute').hide();
                }
                if(type == 'substitute'){
                    $('#substitute').show();
                    $('#substitute').css('display', 'block');
                    $('#permanent').hide();
                }
            });
     });
        </script>
@endsection
