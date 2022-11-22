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
                        <h2 class="blog-post-title mb-1">Deduplication of bulk RNA-seq reads</h2>
                        <div class="alert alert-primary" role="alert">
                            A typical scenario where the <code>dedup_gene</code> module is applied
                            is the application of deduplication of bulk RNA-seq reads annotated
                            with gene tags.
                        </div>
                    </div>

                    {{-- Running --}}
                    <div id="item-1-1">
                        <h2>Running</h2>
                        <ol>
                            <li>
                                <p class="fs-5">
                                    in CLI
                                </p>
                                <pre><code class="language-python"># data downloading
wget https://github.com/cribbslab/mclumi/releases/download/bulkrna-seq/bulk-RNA-seq_ex.bam</code></pre>
                                <pre><code class="language-python">mclumi dedup_gene -m directional -gt XT -gist XS -ed 1 -ibam ./hgmm_100_STAR_FC_sorted.bam -obam ./dedup.bam</code></pre>
                            </li>
                            <li>
                                <p class="fs-5">
                                    Then, if you choose to run it in Python, all you need to do is to assign
                                    attributes to the <code>dedup_basic</code> module.
                                </p>
                                <pre><code class="language-python">import mclumi as mu

mu.dedup_gene(
    mode='internal',
    # mode='external',

    # method='unique',
    # method='cluster',
    # method='adjacency',
    # method='directional',
    method='mcl',
    # method='mcl_val',
    # method='mcl_ed',

    bam_fpn=to('example/data/RM82_CLK1_DMSO_2_XT.bam'),
    gene_assigned_tag='XT',
    gene_is_assigned_tag='XS',
    mcl_fold_thres=1.6,
    inflat_val=1.6,
    exp_val=2,
    iter_num=100,
    verbose=True,
    ed_thres=7,
    is_sv=False,
    sv_fpn=to('example/data/RM82_CLK1_DMSO_2_XT_dedup.bam'),
    sv_dsum_fpn=to('example/data/RM82_CLK1_DMSO_2_XT_dedup.txt'),
)</code></pre>
                            </li>
                        </ol>
                    </div>

                    {{-- Output --}}
                    <div id="item-1-2">
                        <h2>Output</h2>
                        <pre><code class="language-python">run Mclumi internally.
21/11/2022 14:13:53 logger: ===>reading the bam file... /home/jsun/software/mclumi/mclumi/example/data/RM82_CLK1_DMSO_2_XT.bam
[W::hts_idx_load3] The index file is older than the data file: /home/jsun/software/mclumi/mclumi/example/data/RM82_CLK1_DMSO_2_XT.bam.bai
21/11/2022 14:13:53 logger: ===>reading BAM time: 0.14s
21/11/2022 14:13:53 logger: =========>start converting bam to df...
21/11/2022 14:14:23 logger: =========>time to df: 30.334s
21/11/2022 14:14:23 logger: ======># of raw reads: 792174
21/11/2022 14:14:23 logger: ======># of reads with qualified chrs: 658681
21/11/2022 14:14:24 logger: ======># of reads with assigned genes: 658681
21/11/2022 14:15:11 logger: ======># of unique umis: 658564
21/11/2022 14:15:11 logger: ======># of redundant umis: 658681
21/11/2022 14:15:12 logger: ======># of gene positions in the bam: 60239
21/11/2022 14:15:12 logger: ======>edit distance thres: 7
21/11/2022 14:15:12 logger: ===>start building umi graphs...
21/11/2022 14:22:50 logger: ===>time for building umi graphs: 458.36s
21/11/2022 14:22:50 logger: ===>start deduplication by the mcl method...
21/11/2022 14:32:50 logger: ======>finish finding deduplicated umis in 599.77s
21/11/2022 14:32:51 logger: ======># of deduplicated unique umis: 408023 based on the unique method
21/11/2022 14:32:51 logger: ======># of deduplicated reads: 408147 based on the unique method
21/11/2022 14:32:51 logger: ======>calculate average edit distances between umis...
21/11/2022 14:32:53 logger: ======>finish calculating ave eds in 1.93s
21/11/2022 14:32:53 logger: ======>start writing summary statistics...
21/11/2022 14:32:53 logger: ======>finish writing the summary statistics in 0.08s
21/11/2022 14:32:53 logger: ======>start writing deduplicated reads to BAM...
21/11/2022 14:34:35 logger: ======># of the total reads left after deduplication: 250652
21/11/2022 14:34:35 logger: ======>finish writing in 101.48s</code></pre>
                    </div>
                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Deduplication of bulk RNA-seq reads</a>
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
