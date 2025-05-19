<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title>RECSTEP - Sports Club</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="">
    <meta name="description" content="">


    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" href="images/favicon1.ico">
    <link href="{{ asset('assets/vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

</head>


<body>

        <div class="">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Players</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display datatable2" style="min-width: 850px">
                                        <thead>
                                            <tr>
                                                <th>Picture</th>
                                                <th style="min-width: 120px;">Teams</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Priority</th>
                                                <th>Date of Birth</th>
                                                <th>Proof ID</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Player Administrator</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($players as $player)
                                                <tr>
                                                    <td class="sorting_1">
                                                        @if ($player->picture)
                                                            <img class="rounded-circle" width="35"
                                                                src="{{ asset($player->picture) }}" alt="logo">
                                                        @else
                                                            <img class="rounded-circle" width="35"
                                                                src="{{ asset('assets/images/dummyUser.jpg') }}"
                                                                alt="logo">
                                                        @endif
                                                    </td>
                                                    <td style="width: 120px;">
                                                        <div style="max-width: 120px; white-space: nowrap;">
                                                            @if (!empty($player->teamMeta) && count($player->teamMeta) > 0)
                                                                @foreach ($player->teamMeta as $team)
                                                                    {{ $team->team->name }}
                                                                    ({{ $team->team->age_group }}) <br>
                                                                @endforeach
                                                            @else
                                                                No Team Assigned
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td><span
                                                            style="text-transform: capitalize;">{{ $player->name }}</span>
                                                    </td>

                                                    <td>{{ $player->type }}</td>
                                                    <td>{{ $player->priority }}</td>
                                                    <td>{{ $player->dob }}</td>
                                                    <td>
                                                        @if ($player->proof_id)
                                                            <a href="{{ asset($player->proof_id) }}"
                                                                target="_blank">View
                                                                Document</a>
                                                        @endif
                                                    </td>
                                                    <td>{{ $player->phone }}</td>
                                                    <td>{{ $player->email }}</td>
                                                    <td>
                                                        @if (!empty($player->administrator) && count($player->administrator) > 0)
                                                            {!! $player->administrator->pluck('user.name')->implode('</br>') !!}
                                                        @else
                                                            Not Assigned
                                                        @endif
                                                    </td>
                                                    <td>{{ $player->status == 1 ? 'Active' : 'Inactive' }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="footer">
                <div class="copyright">
                    <p>Copyright © 2024 - All Right Reserved By RECSTEP</p>
                </div>
            </div>
        </div>


        <!-- Required vendors -->
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
        <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <!-- Apex Chart -->
        <script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>
        <script src="{{ asset('assets/vendor/chart-js/chart.bundle.min.js') }}"></script>
        <!-- Chart piety plugin files -->
        <script src="{{ asset('assets/vendor/peity/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('assets/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
        <!-- Dashboard 1 -->
        <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="{{ asset('assets/js/ic-sidenav-init.js') }}"></script>
        <!-- <script src="js/demo.js"></script> -->
        <!-- <script src="js/styleSwitcher.js"></script> -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Delete modal
                $('#deleteModalCenter').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + teamName + '?');
                    modal.find('#delete-form').attr('action', '{{ route('clubadm.destroy', ':id') }}'.replace(
                        ':id', btoa(teamId)));
                });

                $('#deleteModalCenterTeam').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + teamName + '?');
                    modal.find('#delete-form').attr('action', '{{ route('team.destroy', ':id') }}'.replace(
                        ':id', btoa(teamId)));
                });

                // Active status modal
                $('#activeModalCenter').on('show.bs.modal', function(event) {

                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name
                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        teamName + '?');
                    modal.find('#active-form').attr('action', '{{ route('clubadm.updateStatus', ':id') }}'
                        .replace(':id', teamId));
                });

                $('#activeModalCenterTeam').on('show.bs.modal', function(event) {

                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name
                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        teamName + '?');
                    modal.find('#active-form').attr('action', '{{ route('team.updateStatus', ':id') }}'
                        .replace(':id', teamId));
                });

                // player
                $('#deleteModalCenterPlayer').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var playerId = button.data('player-id'); // Extract player ID
                    var playerName = button.data('player-name'); // Extract player name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + playerName +
                        '?');
                    modal.find('#delete-formPlayer').attr('action', '{{ route('player.destroy', ':id') }}'
                        .replace(
                            ':id', btoa(playerId)));
                });
                $('#activeModalCenterPlayer').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var playerId = button.data('player-id'); // Extract player ID
                    var playerName = button.data('player-name'); // Extract player name

                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        playerName + '?');
                    modal.find('#active-formPlayer').attr('action', '{{ route('player.updateStatus', ':id') }}'
                        .replace(':id', btoa(playerId)));
                });

                $('#deleteModalCenterSchedule').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var scheduleId = button.data('schedule-id'); // Extract schedule ID
                    var scheduleName = button.data('schedule-name'); // Extract schedule name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + scheduleName +
                        '?');
                    modal.find('#delete-formSchedule').attr('action', '{{ route('schedule.destroy', ':id') }}'
                        .replace(
                            ':id', btoa(scheduleId)));
                });
                $('#activeModalCenterSchedule').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var scheduleId = button.data('schedule-id'); // Extract schedule ID
                    var scheduleName = button.data('schedule-name'); // Extract schedule name

                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        scheduleName + '?');
                    modal.find('#active-formSchedule').attr('action',
                        '{{ route('schedule.updateStatus', ':id') }}'
                        .replace(':id', btoa(scheduleId)));
                });

            });
        </script>
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1.5,
                spaceBetween: 15,
                navigation: {
                    nextEl: "",
                    prevEl: "",
                },
                breakpoints: {
                    360: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.5,
                        spaceBetween: 40,
                    },
                    1200: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                },
            });
            var swiper = new Swiper(".mySwiper1", {
                slidesPerView: 4,
                spaceBetween: 15,
                navigation: {
                    nextEl: "",
                    prevEl: "",
                },
                breakpoints: {
                    360: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.5,
                        spaceBetween: 20,
                    },
                },
            });
        </script>
</body>
<!--end body-->

</html>
