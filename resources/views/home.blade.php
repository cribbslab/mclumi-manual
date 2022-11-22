<!DOCTYPE html>
<html lang="zh">
@include('layout.head')
@include('layout.script')

<body>
@include('layout.nav')

{{--<div class="container shadow w-75 h-100 col-md-12 p-3 mb-5 mt-2 bg-white">--}}
{{--    @yield('content')--}}

{{--</div>--}}

<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">mclUMI</h1>
            <p class="lead">
                <i class="fa-brands fa-battle-net"></i>
                <strong>mclUMI</strong> is an open-source, modular, and scalable Python programming interface that
                possesses multiple modules for improving sequencing accuracy.
                <br><br><i class="fa-brands fa-battle-net"></i>

                <strong>mclUMI</strong> offers read I/O, preprocessing, UMI deduplication, and
                chimeric read removal based on homotrimer blocks.
                Intriguingly, it utilizes the Markov clustering algorithm to allow us to gain
                multiple choices of UMI count matrices, which is different from currently
                available algorithms or programs. This avoids one-size-fits-all strategies for generating
                deduplicated UMI counts and can help us find the best solution through its built-in expansion and inflation
                settings for reads that sequenced by extremely error-prone or accurate sequencing technologies.

                <br><br><i class="fa-brands fa-battle-net"></i>
                <strong>mclUMI</strong> strives to make read quantification more accurate and easier
                and will accelerate the biological translation.

            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <a href="{{ url('feature') }}" role="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Learn more</a>
                <a href="{{ url('doc/overview') }}" role="button" class="btn btn-outline-secondary btn-lg px-4">Explore</a>
            </div>
        </div>
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
{{--            <img class="rounded-lg-3" src="{{ URL::asset('img/poster.png') }}" alt="" width="1020">--}}
            <img src="{{ URL::asset('img/cover.png') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="1000"
                 height="800" loading="lazy">
        </div>
    </div>
</div>

@include('layout.footer')
</body>

</html>
