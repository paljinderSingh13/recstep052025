@extends('leagues.layouts.master')
@section('content')

@php
$slug = session('slug');
@endphp

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="shadow-sm border rounded">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Create Fields/Directions</h4>
                    </div>
                    <div class="card-body">
                        <p>Creating fields is a crucial part of Leageez and its scheduling system. Be sure to enter a valid address so players, coaches, and parents can easily get directions to the field location.</p>

                        <form method="POST" action="{{ route('league.fields.store', $slug) }}">
                            @csrf
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Field Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Field Name" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter a Location" id="address" value="{{ old('address') }}" required>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Google Maps Embed Code</label>
                                        <textarea name="google_maps_embed" class="form-control" id="google_maps_embed" placeholder="Paste Google Maps iframe code here" readonly>{{ old('google_maps_embed') }}</textarea>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        @if(old('google_maps_embed'))
                                            {!! old('google_maps_embed') !!}
                                        @else
                                            <div id="map" style="width: 100%; height: 250px;" class="mb-3 rounded border"></div>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary">Add Field</button>
                                    <a href="{{ route('league.fields.index', $slug) }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar Section -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="right-sidebar">
                    <div class="shadow-sm border rounded mb-3">
                        <div class="card-header bg-primary rounded-top">
                            <div class="card-title">
                                <h4 class="text-white mb-0">Recent/Upcoming Game</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="p-3 border-top text-center">
                                <button class="btn btn-sm btn-outline-primary">View Full Schedule</button>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-sm border rounded mb-3">
                        <div class="card-header bg-primary rounded-top">
                            <div class="card-title">
                                <h4 class="text-white mb-0">Apr 23, 2025 08:00 AM</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="p-3">
                                <p class="mb-0">The Blue Tigers</p>
                            </div>
                            <div class="p-3 bg-primary-light">
                                <p class="mb-0">Mumbai Indian</p>
                            </div>
                            <div class="p-3">
                                <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> Boston Park</button>
                                <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> Regular Season</button>
                                <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> First Division</button>
                            </div>
                            <div class="p-3 border-top text-center">
                                <button class="btn btn-sm btn-outline-primary">View Game Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End sidebar -->
        </div>
    </div>
</div>

@endsection

@section('js')
<!-- Load Google Maps JavaScript API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM4QuEWeOy5nLZAbTHsR_Ssm7KUMQDP9U&callback=initAutocomplete&libraries=places&v=weekly" async defer></script>

<script>
    let map;

    function initAutocomplete() {
        const locationInput = document.getElementById('address');

        if (locationInput instanceof HTMLInputElement) {
            const locationAutocomplete = new google.maps.places.Autocomplete(locationInput);
            locationAutocomplete.addListener('place_changed', function () {
                const place = locationAutocomplete.getPlace();
                if (place.geometry && place.geometry.location) {
                    const lat = place.geometry.location.lat();
                    const lng = place.geometry.location.lng();
                    map.setCenter({ lat, lng });
                    updateEmbedCode(lat, lng);
                }
            });
        }

        initMap(); // Call map after autocomplete
    }

    function initMap() {
        const defaultCenter = { lat: 48.40608515, lng: -97.1963987 };

        map = new google.maps.Map(document.getElementById("map"), {
            center: defaultCenter,
            zoom: 5,
        });

        updateEmbedCode(defaultCenter.lat, defaultCenter.lng);

        map.addListener("center_changed", () => {
            const center = map.getCenter();
            updateEmbedCode(center.lat(), center.lng());
        });
    }

    function updateEmbedCode(lat, lng) {
        const iframeCode = `<iframe class="rounded" width="100%" height="250" style="border:0;" loading="lazy" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDM4QuEWeOy5nLZAbTHsR_Ssm7KUMQDP9U&center=${lat},${lng}&zoom=12&maptype=roadmap"></iframe>`;
        document.getElementById("google_maps_embed").value = iframeCode;
    }
</script>
@endsection
