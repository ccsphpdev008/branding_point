<section      data-scrollax-parent="true">
    <div class="container">
        <div class="section-title">
            <h2>How it works</h2>
            <div class="section-subtitle">Discover &amp; Connect </div>
            <span class="section-separator"></span>
            <p>Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
        </div>
        <div class="process-wrap fl-wrap">
            <ul class="no-list-style">
                @foreach($howitworks as $howitwork)
                <li>
                    <div class="process-item">
                        <span class="process-count">{{ $howitwork->position}} </span>
                        <div class="time-line-icon"><img src="{{ asset($howitwork->image) }}"  height="400px" width="400px"></div>
                        <h1>{!! $howitwork->title !!}</h1>
                        <p>{!! $howitwork->description !!}</p>
                    </div>
                    <span class="pr-dec"></span>
                </li>
                @endforeach
               
            </ul>
            <div class="process-end"><i class="fal fa-check"></i></div>
        </div>
    </div>
</section>
