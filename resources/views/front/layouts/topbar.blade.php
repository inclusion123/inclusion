<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i
                        class="fa fa-map-marker-alt me-2"></i>{{ $setting_helper->address }}</small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>{{ $setting_helper->mobile }}</small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>{{ $setting_helper->email }}</small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                    href="{{ $setting_helper->twitter }}" target="_blank"><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                    href="{{ $setting_helper->facebook }}" target="_blank"><i
                        class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                    href="{{ $setting_helper->linkedin }}" target="_blank"><i
                        class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                    href="{{ $setting_helper->instagram }}" target="_blank"><i
                        class="fab fa-instagram fw-normal"></i></a>
                {{-- <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle"
                    href="{{ $setting_helper->youtube }}" target="_blank"><i class="fab fa-youtube fw-normal"></i></a> --}}
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
