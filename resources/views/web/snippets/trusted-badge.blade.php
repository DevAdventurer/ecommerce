@php
$sections = App\Models\TrustedSection::orderBy('created_at','desc')->get();
@endphp
<!-- trusted badge start -->
<div class="trusted-section overflow-hidden bg-trust-1">
    <div class="trusted-section-inner py-4">
        <div class="container">
            <div class="row justify-content-center trusted-row">

                @foreach($sections as $section)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="trusted-badge rounded p-0">
                        <div class="trusted-icon">
                            @if($section->icon_type == 'image')
                                <img class="icon-trusted" src="{{$section->media->file}}" alt="icon-1">
                            @endif
                        </div>
                        <div class="trusted-content">
                            <h2 class="heading_18 trusted-heading">{{$section->title}}</h2>
                            <p class="text_16 trusted-subheading trusted-subheading-2">{{$section->subtitle}}</p>
                        </div>
                    </div>
                </div>
                @endforeach()

            </div>
        </div>
    </div>
</div>
<!-- trusted badge end -->