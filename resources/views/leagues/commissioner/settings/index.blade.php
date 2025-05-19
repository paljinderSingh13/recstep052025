@extends('leagues.layouts.master')
@section('content')

<div class="content-body">
	<div class="container">
		<div class="row">
			<div class="col-12 mb-3">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">League Settings</h4>
					</div>
					<div class="card-body">
						<div class="basic-form">							
							<div class="row">
								<div class="col-md-6 mb-3">
									<label class="form-label">League Name</label>
									<input type="text" name="text" class="form-control" placeholder="League Name">
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Type Of League</label>
									<select class="form-control default-select">
										<option selected="selected" value="1">Adult - Mens</option>
										<option value="2">Adult - Womens</option>
										<option value="5">Youth - Boys</option>
										<option value="4">Youth - Co-ed</option>
										<option value="6">Youth - Girls</option>
									</select>
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Timezone</label>
									<select class="form-control default-select">
										<option value="">Please select a timezone...</option>
										<option value="Hawaiian Standard Time">(UTC-10:00) Hawaii</option>
										<option selected="selected" value="Alaskan Standard Time">(UTC-9:00) Alaska</option>
										<option value="Pacific Standard Time">(UTC-8:00) Pacific Time (US/Canada)</option>
										<option value="Mountain Standard Time">(UTC-7:00) Mountain Time (US/Canada)</option>
										<option value="Central Standard Time">(UTC-6:00) Central Time (US/Canada)</option>
										<option value="Eastern Standard Time">(UTC-5:00) Eastern Time (US/Canada)</option>
									</select>
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Upload Logo</label>
									<input type="file" name="text" class="form-control" placeholder="Upload logo">
								</div>
								<div class="col-12 mb-3">
									<button class="btn btn-primary">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>


@endsection