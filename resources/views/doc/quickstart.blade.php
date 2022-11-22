<!DOCTYPE html>
<html lang="zh">
@include('layout.head')

<body>
@include('layout.nav')

<div class="d-flex">
    @include('layout.sidebar')

    <div class="shadow-lg  p-10 m-2 documentation is-dark" :class="{'expanded': ! sidebar}">
        <div class="row">

            <div class="col-11">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                    <div id="item-1">
                        <h2 class="blog-post-title mb-1">Quick start</h2>
                        <div class="alert alert-primary" role="alert">
                            We set up a quick start here to guide you through an example
                            to use mclUMI for UMI deduplication.
                            Every module for this purpose in mclUMI provides 7 methods, that is,
                            <code>unique</code>, <code>cluster</code>, <code>adjacency</code>,
                            <code>directional</code>, <code>mcl</code>, <code>mcl_ed</code>,
                            and <code>mcl_val</code> to handle precise unique UMI counting in
                            the following application scenarios,
                            <a href="{{ url('doc/functionality/dedup_basic') }}">
                                <span class="fw-bold fst-italic">1). a single genomic locus,</span>
                            </a>
                            <a href="{{ url('doc/functionality/dedup_pos') }}">
                                <span class="fw-bold fst-italic">2). multiple genomic loci</span>,
                            </a>
                            <a href="{{ url('doc/functionality/dedup_gene') }}">
                                <span class="fw-bold fst-italic">3). genes</span>,
                            </a>
                            and
                            <a href="{{ url('doc/functionality/dedup_sc') }}">
                                <span class="fw-bold fst-italic">4). cell-by-gene types</span>.
                            </a>
                        </div>
                    </div>

                    {{-- Case study --}}
                    <div id="item-1-1">
                        <h2>Case study</h2>
                        <div class="alert alert-primary" role="alert">
                            We present a case study for UMI deduplication according to genomic positions.
                            In mclUMI, <code>dedup_pos</code> is responsible for UMI deduplication
                            according to genomic positions, which allows users to deduplicate PCR artifacts/UMIs
                            based on a set of genomic position annotations on a large scale.
                            In the quick start guide, we omit data preprocessing procedures
                            and start by directly using a dataset (a clip of ChIP-seq data used also in UMI-tools).
                            containing 1,175,027 reads with 20,683 raw unique UMI sequences and
                            12,047 genomic positions by running the
                            UMI-tools <code>get_bundles</code> method.
                            This method is also adopted by mclUMI. For details, please see the
                            <code>mclumi.align.BundlePos</code> module.
                        </div>
                    </div>

                    {{-- Download data --}}
                    <div id="item-1-2">
                        <h2>Download data</h2>
                        <pre><code class="language-python">wget https://github.com/cribbslab/mclumi/releases/download/v0.0.1/example_bundle.bam</code></pre>
                    </div>

                    {{-- Running --}}
                    <div id="item-1-3">
                        <h2>Running</h2>
                        <p class="fs-5">1. use in CLI</p>
                        <pre><code class="language-python">mclumi dedup_pos -m mcl -pt PO -ed 1 -infv 1.6 -expv 2 -ibam ./example_bundle.bam -obam ./basic/dedup.bam</code></pre>

                        <p class="fs-5">2. use in Python</p>
                        <pre><code class="language-python">import mclumi as mu

mu.dedup_pos(
    mode='internal',

    # method='unique',
    # method='cluster',
    # method='adjacency',
    # method='directional',
    method='mcl',
    # method='mcl_val',
    # method='mcl_ed',

    bam_fpn='example/data/example_bundle.bam',
    pos_tag='PO',
    mcl_fold_thres=1.5,
    inflat_val=1.6,
    exp_val=2,
    iter_num=100,
    verbose=True,
    ed_thres=1,
    is_sv=False,
    sv_fpn='example/data/pos/assigned_sorted_dedup.bam',
)</code></pre>
                    </div>

                    {{-- Output --}}
                    <div id="item-1-4">
                        <h2>Output</h2>
                        <pre><code class="language-python">The dedup_pos module is being used...
/home/jsun/anaconda3/envs/mcl/lib/python3.8/site-packages/mclumi/deduplicate/monomer/DedupPos.py
20/11/2022 22:09:23 logger: ===>reading the bam file... ./example_buddle.bam
[E::idx_find_and_load] Could not retrieve index file for './example_buddle.bam'
20/11/2022 22:09:23 logger: ===>reading BAM time: 0.01s
20/11/2022 22:09:23 logger: =========>start converting bam to df...
20/11/2022 22:09:23 logger: =========>time to df: 0.140s
20/11/2022 22:09:23 logger: ======># of raw reads: 20684
20/11/2022 22:09:23 logger: ======># of reads with qualified chrs: 20684
20/11/2022 22:09:23 logger: ======># of unique umis: 1949
20/11/2022 22:09:23 logger: ======># of redundant umis: 20684
20/11/2022 22:09:23 logger: ======># of positions in the bam: 1
20/11/2022 22:09:23 logger: ======>edit distance thres: 1
20/11/2022 22:09:23 logger: ===>start building umi graphs...
20/11/2022 22:09:29 logger: ===>time for building umi graphs: 6.14s
20/11/2022 22:09:30 logger: ===>start deduplication by the mcl method...
20/11/2022 22:09:35 logger: ======>finish finding deduplicated umis in 5.43s
20/11/2022 22:09:35 logger: ======>calculate average edit distances between umis...
20/11/2022 22:09:35 logger: ======>finish calculating ave eds in 0.00s
20/11/2022 22:09:35 logger: ======># of deduplicated unique umis 1905 on the basis of the unique method
20/11/2022 22:09:35 logger: ======># of deduplicated reads 19754 on the basis of the unique method
5.0    1
Name: ave_eds, dtype: int64
20/11/2022 22:09:35 logger: ======>start writing deduplicated reads to BAM...
20/11/2022 22:09:35 logger: ======># of the total reads left after deduplication: 44
[E::idx_find_and_load] Could not retrieve index file for './example_buddle.bam'
20/11/2022 22:09:35 logger: ======>finish writing in 0.01s</code></pre>
                    </div>

                    {{-- Result --}}
                    <div id="item-1-5">
                        <h2>Result</h2>
                        <div class="alert alert-light" role="alert">
                            The <code>dedup_pos</code> module returns another two files as follows.
                            <ol>
                                <li><span class="badge rounded-pill text-bg-light">mcl_ave_ed_pos_bin.txt</span></li>
                                <li><span class="badge rounded-pill text-bg-light">mcl_dedup_sum.txt</span></li>
                            </ol>

                            <span class="badge rounded-pill text-bg-light">mcl_ave_ed_pos_bin.txt</span>
                            mainly summarizes the total number of genomic positions with respect to their average
                            edit distances. Further explanations can be found on
                            <a href="{{ url('doc/fileformat/output') }}">output_format</a>.

                            All methods in UMI-tools have been re-constructed in mclUMI
                            by implementing the <span class="badge rounded-pill text-bg-light">cluster</span> and
                                <span class="badge rounded-pill text-bg-light">adjacency</span> methods
                            based on the breadth first search (BFS) algorithm and
                            the directional method based on the depth first
                            search (DFS) algorithm. After then, in order to test
                            whether these methods are implemented correctly,
                            the two software packages were performed on
                            the above dataset, and the results of deduplication show that the
                            <span class="badge rounded-pill text-bg-light">directional</span>
                            method from either software performs identically. Details can be found
                            <a href="{{ url('doc/methodology/directional') }}">here</a>.

                            <div id="item-1">
                                <div class="text-center">
                                    <img src="{{ URL::asset('img/mclumi/bulk.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                                    <div class="pb-4 mb-4 fst-italic border-bottom">
                                        <br><strong>Caption</strong>.
                                        Output of 7 methods in mclUMI.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Quick start</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Case study</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">Download data</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">Running</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-4">Output</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-5">Result</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
