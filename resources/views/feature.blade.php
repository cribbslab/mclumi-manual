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
        <div class="col-lg-12 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-6 fw-bold lh-1"># Connected components</h1>
            <p class="lead">
                Conventional methods use connected components for UMI grouping
            </p>
            <div class="text-center">
                <img src="{{ URL::asset('img/mclumi/connected_components.png') }}" class="img-thumbnail" alt="" width="600" height="300" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>.
                    10 UMI groups in total by connected components observed at a single genomic position.
                </div>
            </div>

            <h1 class="display-6 fw-bold lh-1"># Markov clustering</h1>
            <p class="lead">
                Markov clustering for UMI grouping
            </p>
            <div class="text-center">
                <img src="{{ URL::asset('img/mclumi/markov_clustering.png') }}" class="img-thumbnail" alt="" width="600" height="300" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>.
                    30 UMI groups in total by MCL grouping observed at a single genomic position.
                </div>
            </div>

            <h1 class="display-6 fw-bold lh-1"># UMI deduplication</h1>
            <p class="lead">
                UMI-tools vs. mclUMI
            </p>
            <div class="text-center">
                <img src="{{ URL::asset('img/mclumi/bar_mclumi_vs.umitools.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>.
                    Performance comparison between UMI-tools and mclUMI.
                </div>
            </div>

            <h1 class="display-6 fw-bold lh-1"># Chimeric read removal</h1>
            <p class="lead">
                the umiRarity method
            </p>
            <div class="text-center">
                <img src="{{ URL::asset('img/dechimeric/boxplot_dechimeric.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                <div class="pb-4 mb-4 fst-italic border-bottom">
                    <br><strong>Caption</strong>.
                    Performance of the umiRarity method for removing chimeric reads in mclUMI.
                </div>
            </div>


            </div>



        </div>

    </div>
</div>

@include('layout.footer')
</body>

</html>
