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
            <h1 class="display-6 fw-bold lh-1"># FAQs</h1>

            <div class="p-4 mb-3 bg-light rounded">
                <strong>What questions is mclUMI supposed to address?</strong>
                <p class="blog-post-meta">November 20, 2022 by <a href="https://github.com/2003100127" target="_blank">Jianfeng Sun</a></p>
                mclUMI is a Python toolkit holding a bundle of function modules
                to allow analyses of read pre-processing,
                UMI deduplication, and chimeric read removal. Many, if not most,
                function modules in mclUMI
                are used to specialize in Nanopore sequencing full-length reads but
                can also be applied general-purpose to those by different kinds of sequencing technologies.
                We highlight its markov clustering module that can make UMI deduplication much more extendable ever.
            </div>

        </div>

    </div>
</div>

@include('layout.footer')
</body>

</html>
