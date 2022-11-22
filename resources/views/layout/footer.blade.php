<link rel="stylesheet" href="{{ URL::asset('bootstrap-5.2.0/dist/css/divider.css') }}">

<div class="b-example-divider"></div>

<div class="container">
    <footer class="py-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Main</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('/') }}" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('feature') }}" class="nav-link p-0 text-muted">Feature</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('issue') }}" class="nav-link p-0 text-muted">Issue</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('download') }}" class="nav-link p-0 text-muted">Download</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('faqs') }}" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('about') }}" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Documentation</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('doc/overview') }}" class="nav-link p-0 text-muted">Get started</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/installation') }}" class="nav-link p-0 text-muted">Installation</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/quickstart') }}" class="nav-link p-0 text-muted">Quick start</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/functionality/dedup_pos') }}" class="nav-link p-0 text-muted">UMI deduplication</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/functionality/dechimeric') }}" class="nav-link p-0 text-muted">Chimeric read removal</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/methodology/markovclustering') }}" class="nav-link p-0 text-muted">Methodology</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/changelog') }}" class="nav-link p-0 text-muted">Change log</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Tutorial</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('doc/functionality/trim') }}" class="nav-link p-0 text-muted">Trimming reads</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/functionality/dedup_basic') }}" class="nav-link p-0 text-muted">Deduplication-a locus</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/functionality/dedup_pos') }}" class="nav-link p-0 text-muted">Deduplication-loci</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/functionality/dedup_gene') }}" class="nav-link p-0 text-muted">Deduplication-bulk RNA-seq</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/functionality/dedup_sc') }}" class="nav-link p-0 text-muted">Deduplication-scRNA-seq</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/functionality/dechimeric') }}" class="nav-link p-0 text-muted">Chimeric read removal</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Methodology</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('doc/methodology/dechimeric') }}" class="nav-link p-0 text-muted">Rarity</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/methodology/markovclustering') }}" class="nav-link p-0 text-muted">Markov clustering</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/methodology/directional') }}" class="nav-link p-0 text-muted">Directional</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Data</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('doc/fileformat/input') }}" class="nav-link p-0 text-muted">Input</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('doc/fileformat/output') }}" class="nav-link p-0 text-muted">Output</a></li>
                </ul>
            </div>

            <div class="col-md-2  mb-3">
                <form>
                    <h5>What's new</h5>
                    <p><a href="{{ url('whatsnew') }}" class="nav-link p-0 text-muted">Digest more</a></p>
                    <div class="d-flex flex-column flex-lg-row w-200 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <a href="mailto:jianfeng.sunmt@gmail.com" target="_blank" class="btn btn-outline-danger">Email Us</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy; 2022 All rights reserved.</p>
            <ul class="list-unstyled d-flex">
{{--                <li class="ms-3">--}}
                    <a href="https://www.ndorms.ox.ac.uk/team/jianfeng-sun" class="btn btn-outline-secondary text-dark me-2" role="button">
                        <i class="fa-solid fa-building-columns"></i>
                    </a>
{{--                </li>--}}
{{--                <li class="ms-3">--}}
                    <a href="https://github.com/cribbslab" class="btn btn-outline-secondary text-dark me-2" role="button">
                        <i class="fa-brands fa-github"></i>
                    </a>
{{--                </li>--}}
{{--                <li class="ms-3">--}}
                    <a href="https://twitter.com/Jianfeng_Sunny" class="btn btn-outline-secondary text-dark me-2" role="button">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
{{--                </li>--}}
{{--                <li class="ms-3">--}}
                    <a href="https://www.researchgate.net/profile/Jianfeng-Sun-12" class="btn btn-outline-secondary text-dark me-2" role="button">
                        <i class="fa-brands fa-researchgate"></i>
                    </a>
{{--                </li>--}}
{{--                <li class="ms-3">--}}
                    <a href="https://orcid.org/0000-0002-1274-5080" class="btn btn-outline-secondary text-dark me-2" role="button">
                        <i class="fa-brands fa-orcid"></i>
                    </a>
{{--                </li>--}}
{{--                <li class="ms-3">--}}
                    <a href="https://scholar.google.com/citations?hl=en&user=TfLBR9kAAAAJ&view_op=list_works&sortby=pubdate" class="btn btn-outline-secondary text-dark me-2" role="button">
                        <i class="fa-brands fa-google"></i>
                    </a>
{{--                </li>--}}
            </ul>
        </div>
    </footer>
</div>
