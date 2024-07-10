<!-- Header -->
<div class="row justify-content-center">
    <div class="col-md-12 grid-margin">
        <div class="row align-items-center">
            <!-- CEET -->
            <div class="col-12 col-xl-2 mb-1 mb-xl-0">
                <div class="d-flex align-items-center">
                    <img src="{{ url('images/dashboard/ceet_logo.png') }}" alt="ceet logo" style="width: 20px; height: auto;">
                    <div class="ml-1">
                        <h6 class="font-weight-normal mb-0" style="font-size: 8px; margin: 0;">Compagnie</h6>
                        <h6 class="font-weight-normal mb-0" style="font-size: 8px; margin: 0;">Energie</h6>
                        <h6 class="font-weight-normal mb-0" style="font-size: 8px; margin: 0;">Electrique</h6>
                        <h6 class="font-weight-normal mb-0" style="font-size: 8px; margin: 0;">du Togo</h6>
                    </div>
                    <h2 class="header-text" style="font-size: 15px; color: #ef1212; margin-left: 5px;">
                        CarControl
                    </h2>
                </div>
            </div>
            <!-- CEET -->

            <!-- title -->
            <div class="col-12 col-xl-6 mb-1 mb-xl-0">
                <div class="custom-card mx-auto">
                    <div class="card-body">
                        @yield('title')
                    </div>
                </div>
            </div>
            <!-- title -->

            <!-- Date Heure -->
            <div class="col-12 col-xl-3 mb-1 mb-xl-0">
                <div class="justify-content-end d-flex">
                    <div class="date-time-container text-center bg-white p-1 rounded">
                        <div id="current-date" class="font-weight-bold mb-0" style="font-size: 12px;"></div>
                        <div id="current-time" class="text-muted" style="font-size: 10px;"></div>
                    </div>
                </div>
            </div>
            <!-- Date Heure -->
        </div>
    </div>
</div>
<!-- Header -->