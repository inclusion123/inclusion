
@if(!count($items))
<div style="text-align: center;">
    <h1 >Coming Soon...</h1>
    </div>

{{-- <h1>Data not found</h1> --}}
@else
@foreach($items as $item)

<div class="col-lg-4 col-md-4 col-sm-6 col-12 " data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: slideInUp;">
    <div class="template-card">
        <picture class="flex-shrink-0">
            <a href="{{route('front.theme_detail', $item->slug)}}">
                @if($item->featured_image)
                <img src="{{asset('themes_image/featured_image/'.$item->featured_image)}}" loading="lazy" class="img-fluid" alt="Arsha - Free Corporate Bootstrap HTML Template" width="800" height="600" />
                @else
                <img src="{{asset('themes_image/featured_image/'.'not_found_theme_image.png')}}" loading="lazy" class="img-fluid" alt="Arsha - Free Corporate Bootstrap HTML Template" width="800" height="600" />
                @endif
                <div class="image__overlay">
                </div>
            </a>
        </picture>
        <div class="details">
            <h5><a href="{{route('front.theme_detail', $item->slug)}}" rel="bookmark">{{$item->title}}</a></h5>
            <div class="buttons">
                <a href="{{$item->download_link}}" target='_blank' class="download"><span title="Download" class="fas fa-download"></span></a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
{!! $items->render() !!}
