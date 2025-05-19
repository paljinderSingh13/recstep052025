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
                                    <form action="{{ route('player.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="team_id" id="team_id" value="{{ $id }}">
                                    <div class="row">
                                        
                                    <div class="mb-3 col-md-6">
                                        <label for="picture" class="form-label">Picture</label>
                                        <input type="file" name="picture" id="picture"
                                            class="form-control" accept="image/*"
                                            onchange="previewImage(event)" required>
                                        <img id="picturePreview" src="#" alt="Picture Preview"
                                            style="display: none; max-width: 300px; margin-top: 10px;">
                                        @error('picture')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control" value="{{ old('name') }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="type" class="form-label">Type</label>
                                            <select name="type" id="type" class="form-select" required>
                                            <option value="permanent" {{ old('type') == '1' ? 'selected' : '' }}>Permanent
                                            </option>
                                            <option value="substitute" {{ old('type') == '0' ? 'selected' : '' }}>Substitute
                                            </option>
                                        </select>
                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="priority" class="form-label">Priority</label>
                                            <select name="priority" id="permanent" class="form-select" required>
                                            @for($i = 1; $i <= 15; $i++)
                                                @if(in_array($i, $player['permanent']))
                                                
                                                @else
                                                <option value="{{ $i }}" >{{ $i }}</option>
                                                @endif
                                            @endfor
                                            
                                        </select>
                                        <select name="priority" id="substitute" class="form-select" required style="display: none;">
                                            @for($i = 1; $i <= 15; $i++)
                                                @if(in_array($i, $player['substitute']))
                                                @else
                                                <option value="{{ $i }}" >{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                        @error('priority')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" id="dob"
                                            class="form-control" value="{{ old('dob') }}" max="{{ date('Y-m-d') }}" required>
                                        @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="proof_id" class="form-label">Proof ID </label>
                                        <input type="file" name="proof_id" id="proof_id"
                                            class="form-control" required>
                                            @error('proof_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                    </div>
                                 


                                    <div class="mb-3 col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" id="phone"
                                            class="form-control" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control" value="{{ old('email') }}" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control" value="{{ old('password') }}" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$"
            title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long." required>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                        <div class="mt-3">
                                                <button type="submit"
                                                    class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Submit</button>
                                                <a href="{{ route('team.info',base64_encode($id)) }}" type="button"
                                                    class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</a>
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
                var input = event.target;
                var file = input.files[0];
                var preview = document.getElementById('picturePreview');

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };

                    reader.readAsDataURL(file);
                } else {
                    preview.src = '#';
                    preview.style.display = 'none';
                }
            }
        </script>
        <script>
            $(document).on('change','#type',function(){
                var type = $(this).val();
                if(type == 'permanent'){
                    $('#substitute').hide();
                    $('#permanent').show();
                }
                if(type == 'substitute'){
                    $('#permanent').hide();
                    $('#substitute').show();
                }
            });
        </script>
    @endsection