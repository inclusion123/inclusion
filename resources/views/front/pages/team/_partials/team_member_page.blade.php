    <!-- Team Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px">
                <h5 class="fw-bold text-primary text-uppercase">
                    Team Members
                </h5>
                <h1 class="mb-0">
                    Professional Stuffs Ready To Help Your Business
                </h1>
            </div>
            @php
                $team = App\Models\Team::orderBy('id', 'ASC')->get();
            @endphp
            <div class="row g-5">
                @foreach ($team as $team_member)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 wow slideInUp" data-wow-delay="0.3s">
                        {{-- <div class="team-item bg-light rounded overflow-hidden"> --}}
                        <div class="team-item rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('storage/images') }}/{{$team_member->image}}"
                                    alt="" />
                                <div class="team-social">
                                    <a class="btn btn-lg btn-primary btn-lg-square" href="{{$team_member->twitter}}"><i
                                            class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square" href="{{$team_member->facebook}}"><i
                                            class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square" href="{{$team_member->instagram}}"><i
                                            class="fab fa-instagram fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square" href="{{$team_member->linkedin}}"><i
                                            class="fab fa-linkedin-in fw-normal"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h4 class="text-primary">{{$team_member->name}}</h4>
                                <p class="m-0">{{$team_member->designation}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
        <div class="d-flex justify-content-center">
            {{-- {!! $team->links() !!} --}}
        </div>
    </div>
    <!-- Team End -->
