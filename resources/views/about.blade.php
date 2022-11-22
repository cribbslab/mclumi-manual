<!DOCTYPE html>
<html lang="zh">
@include('layout.head')
@include('layout.script')

<body>
@include('layout.nav')

{{--<div class="container shadow w-75 h-100 col-md-12 p-3 mb-5 mt-2 bg-white">--}}
{{--    @yield('content')--}}

{{--</div>--}}

<div class="container my-5 ">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-12 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-6 fw-bold lh-1"># About</h1>
            <br>
            <p class="lead">
                The <i class="fa-brands fa-battle-net"></i>mclUMI toolkit
                is developed and supported by
                <a href="https://cribbslab.co.uk/" target="_blank">
                    cribbslab
                </a>.
            </p>

            <div class="p-4 mb-3 bg-light rounded">
                <ul >
                    <li>Markov clustering network-based UMI deduplication</li>
                    <li>Contributors: Jianfeng Sun and Adam P. Cribbs </li>
                    <li>
                        Affiliation: Nuffield Department of Orthopaedics, Rheumatology and
                        Musculoskeletal Sciences (NDORMS), Headington, Oxford OX3 7LD,
                        University of Oxford.
                    </li>
                    <li>Contact: jianfeng.sunmt@gmail.com</li>
                </ul>

            </div>



        </div>

    </div>
</div>

@include('layout.footer')
</body>

</html>
