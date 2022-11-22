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
                        <h2 class="blog-post-title mb-1">Deduplication at multiple genomic loci</h2>
                        <div class="alert alert-primary" role="alert">
                            Different from the deduplication at a given genomic locus,
                            the <code>dedup_pos</code> module allows users to
                            remove artifacts caused by PCR and sequencing errors on a large scale
                            based on a set of annotated genomic positions.
                            As an example, you can download a clip of ChIP-seq data used also in UMI-tools.
                            The dataset contains 1,175,027 reads with 20,683 raw unique UMI sequences
                            and 12,047 genomic positions tagged by running the UMI-tools
                            <code>get_bundles</code> method that is also adopted by mclUMI.
                        </div>
                    </div>

                    {{-- Running --}}
                    <div id="item-1-1">
                        <h2>Running</h2>
                        <ol>
                            <li>
                                <p class="fs-5">in CLI</p>
                                <pre><code class="language-python"># data downloading
wget https://github.com/cribbslab/mclumi/releases/download/v0.0.1/example_bundle.bam</code></pre>
                                <pre><code class="language-python">mclumi dedup_pos -m mcl -pt PO -ed 1 -infv 1.6 -expv 2 -ibam ./example_bundle.bam -obam ./basic/dedup.bamm</code></pre>
                            </li>
                            <li>
                                <p class="fs-5">
                                    Then, if you choose to run it in Python, all you need to do is to assign
                                    attributes to the <code>dedup_basic</code> module.
                                </p>
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

    bam_fpn='example/data/example_buddle.bam',
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
                            </li>
                        </ol>
                    </div>

                    {{-- Output --}}
                    <div id="item-1-2">
                        <h2>Output</h2>
                        <pre><code class="language-python">run Mclumi internally.
21/11/2022 13:53:49 logger: ===>reading the bam file... /home/jsun/software/mclumi/mclumi/example/data/example_buddle.bam
[E::idx_find_and_load] Could not retrieve index file for '/home/jsun/software/mclumi/mclumi/example/data/example_buddle.bam'
21/11/2022 13:53:49 logger: ===>reading BAM time: 0.00s
21/11/2022 13:53:49 logger: =========>start converting bam to df...
21/11/2022 13:53:49 logger: =========>time to df: 0.123s
21/11/2022 13:53:49 logger: ======># of raw reads: 20684
21/11/2022 13:53:49 logger: ======># of reads with qualified chrs: 20684
21/11/2022 13:53:49 logger: ======># of unique umis: 1949
21/11/2022 13:53:49 logger: ======># of redundant umis: 20684
21/11/2022 13:53:49 logger: ======># of positions in the bam: 1
21/11/2022 13:53:49 logger: ======>edit distance thres: 1
21/11/2022 13:53:49 logger: ===>start building umi graphs...
21/11/2022 13:53:54 logger: ===>time for building umi graphs: 5.12s
21/11/2022 13:53:54 logger: ===>start deduplication by the mcl method...
21/11/2022 13:54:00 logger: ======>finish finding deduplicated umis in 5.43s
21/11/2022 13:54:00 logger: ======>calculate average edit distances between umis...
21/11/2022 13:54:00 logger: ======>finish calculating ave eds in 0.00s
21/11/2022 13:54:00 logger: ======># of deduplicated unique umis 1905 on the basis of the unique method
21/11/2022 13:54:00 logger: ======># of deduplicated reads 19754 on the basis of the unique method
21/11/2022 13:54:00 logger: ======>start writing deduplicated reads to BAM...
21/11/2022 13:54:00 logger: ======># of the total reads left after deduplication: 44
21/11/2022 13:54:00 logger: ======>finish writing in 0.00s</code></pre>
                    </div>


                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Deduplication at multiple genomic loci</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Running</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">Output</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
