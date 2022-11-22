<div class="flex-shrink-1 p-6 bg-white" style="width: 280px;">
    <a href="{{ url('doc/overview') }}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-5 fw-semibold">Documentation</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                Get started
            </button>
            <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/overview') }}" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
                    <li><a href="{{ url('doc/installation') }}" class="link-dark d-inline-flex text-decoration-none rounded">Installation</a></li>
                    <li><a href="{{ url('doc/quickstart') }}" class="link-dark d-inline-flex text-decoration-none rounded">Quick start</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#cath-collapse" aria-expanded="true">
                File format
            </button>
            <div class="collapse show" id="cath-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/fileformat/input') }}" class="link-dark d-inline-flex text-decoration-none rounded">Input</a></li>
                    <li><a href="{{ url('doc/fileformat/output') }}" class="link-dark d-inline-flex text-decoration-none rounded">Output</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#ppi-collapse" aria-expanded="true">
                Functionality
            </button>
            <div class="collapse show" id="ppi-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/functionality/trim') }}" class="link-dark d-inline-flex text-decoration-none rounded">1. Trimming reads</a></li>
                    <li><a href="{{ url('doc/functionality/dedup_basic') }}" class="link-dark d-inline-flex text-decoration-none rounded">2. Single genomic locus</a></li>
                    <li><a href="{{ url('doc/functionality/dedup_pos') }}" class="link-dark d-inline-flex text-decoration-none rounded">3. Multiple genomic loci</a></li>
                    <li><a href="{{ url('doc/functionality/dedup_gene') }}" class="link-dark d-inline-flex text-decoration-none rounded">4. Bulk RNA-seq</a></li>
                    <li><a href="{{ url('doc/functionality/dedup_sc') }}" class="link-dark d-inline-flex text-decoration-none rounded">5. scRNA-seq</a></li>
                    <li><a href="{{ url('doc/functionality/dechimeric') }}" class="link-dark d-inline-flex text-decoration-none rounded">6. Chimeric read removal</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#rrc-collapse" aria-expanded="true">
                Methodology
            </button>
            <div class="collapse show" id="rrc-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/methodology/dechimeric') }}" class="link-dark d-inline-flex text-decoration-none rounded">Deduplication of chimeric reads</a></li>
                    <li><a href="{{ url('doc/methodology/markovclustering') }}" class="link-dark d-inline-flex text-decoration-none rounded">Markov clustering for UMI deduplication</a></li>
                    <li><a href="{{ url('doc/methodology/directional') }}" class="link-dark d-inline-flex text-decoration-none rounded">Directional algorithm</a></li>
                </ul>
            </div>
        </li>

        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="true">
                Others
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('doc/changelog') }}" class="link-dark d-inline-flex text-decoration-none rounded">Change log</a></li>
                    <li><a href="{{ url('whatsnew') }}" class="link-dark d-inline-flex text-decoration-none rounded">What's new</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>

<div class="b-example-divider b-example-vr"></div>
