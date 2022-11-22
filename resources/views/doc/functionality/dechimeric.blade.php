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
                        <h2 class="blog-post-title mb-1">Deduplication of chimeric reads</h2>
                        <div class="alert alert-primary" role="alert">
                            The <code>trim</code> module in mclUMI allows users to very flexibly
                            trim UMI(s) and/or barcode(s) of any length as well as other
                            components (e.g., primer) from a read with a complex structure.
                            For example, it can be used for trimming from reads sequenced
                            by bulk-RNA-seq and scRNA-seq and so on. The module
                            works based on a clear defined structure of a read. Therefore,
                            the module needs the read length to be identical for all reads
                            presented in an alignment file as
                            UMI-tools does.
                        </div>
                    </div>

                    {{-- Glimpse of methods --}}
                    <div id="item-1-1">
                        <h2 class="blog-post-title mb-1">Glimpse of methods for chimeric read removal</h2>
                        <div class="alert alert-light" role="alert">
                            To detect chimeric artefacts, we proposed two methods,
                            umiRarity and umiRarityCR, which both merge UMIs at 3’
                            and 5’ ends at first and then leverage the rarity of the
                            merged UMIs in terms of their unique counts specific to
                            reads that it is most likely impossible to synthesize
                            during PCR amplification. umiRarity and umiRarityCR are
                            both threshold-dependent methods by setting a frequency of UMI-UMI pairs
                            (i.e., rarity), below which reads were considered chimeric
                            and above which non-chimeric otherwise.
                        </div>

                        <div class="text-center">
                            <img src="{{ URL::asset('img/dechimeric/umiRarity_illu.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Illustration of removal of chimeric reads using the
                                Rarity and RarityCR methods. a. UMI count tables at a given genomic
                                locus. It includes a count table of UMIs at 3’ end, a
                                count table of UMIs at 5’ end, and a count table of UMIs obtained
                                by merging UMIs at 3’ end 5’ ends. Non-corrected UMIs represent
                                UMIs of trimer blocks in their original form, while corrected UMIs
                                represent UMIs of collapsing trimer blocks. b and c show the Rarity
                                and RarityCR methods, respectively.
                            </div>
                        </div>

                        <div class="text-center">
                            <img src="{{ URL::asset('img/dechimeric/umiRarity_performance.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Performance of detection of chimeric artefacts based on
                                corrected and non-corrected UMIs of trimer blocks using umiRarity,
                                umiRarityCR, and a reference model as a control group.
                                In the control group with which we compared our umiRarity
                                and umiRarityCR methods, we apply the umiRarity strategy
                                to only trimer-blocked UMIs at 3’ end for comparison purposes.
                            </div>
                        </div>
                    </div>

                    {{-- Running --}}
                    <div id="item-1-2">
                        <h2>Running</h2>
                        <ol>
                            <li>
                                <p class="fs-5">
                                    in CLI
                                </p>
                                <pre><code class="language-python"></code>mclumi dechimeric -m dc_by_cnt -ibam ./TSO_polyAUMI_gene_sorted.bam -tcthres 1 -obam dechimerical.bam -obam_c chimerical.bam</pre>
                            </li>
                            <li>
                                <p class="fs-5">
                                    in Python
                                </p>
                                <pre><code class="language-python">import mclumi as mu

mu.dechimeric(
    mode='internal',
    # mode='external',

    # method='dc_by_cnt',
    method='dc_by_vote',

    tc_thres=1,

    bam_fpn=to('example/data/TSO_polyAUMI_gene_sorted.bam'),
    verbose=True,
    is_sv=True,
    sv_fpn=to('example/data/dechimeric.bam'),
    sv_chimeric_fpn=to('example/data/chimeric.bam'),
)</code></pre>
                            </li>
                        </ol>
                    </div>

                    {{-- Output --}}
                    <div id="item-1-3">
                        <h2>Output</h2>
                        <ol>
                            <li>
                                <p class="fs-5">
                                    by marking attribute <code>method</code> as <code>dc_by_cnt</code>
                                </p>
                                <pre><code class="language-python">run Mclumi internally.
21/11/2022 22:45:44 logger: ===>reading the bam file... /home/jsun/software/mclumi/mclumi/example/data/TSO_polyAUMI_gene_sorted.bam
21/11/2022 22:45:44 logger: ===>reading BAM time: 0.01s
21/11/2022 22:45:44 logger: =========>start converting bam to df...
21/11/2022 22:45:45 logger: =========>time to df: 0.909s
21/11/2022 22:45:45 logger: ======># of raw reads: 48296
21/11/2022 22:45:45 logger: ======># of reads with qualified chrs: 48296
21/11/2022 22:45:45 logger: ======>Summary report:
21/11/2022 22:45:45 logger: ==================>the threshold you select is 1
21/11/2022 22:45:45 logger: ==================># of unique UMIs: 24679
21/11/2022 22:45:45 logger: ==================>1 paired-UMI(s) has(ve) the highest count 12 | an example of the paired-UMI(s) is: TTTTTTGGGAAAAAATTTAAAAAAGGGAAACCCTTTTTTAAATTTTTTCCCAAAAAAAAATTTTTT
21/11/2022 22:45:45 logger: ==================>4626 paired-UMI(s) has(ve) the highest UMI count 1 | an example of the paired-UMI(s) is: AAAAAAAAAAAAAAAAAATTTCCCCCCAAAAAAAAATTTTTTAAAGGGAAAAAATTTAAAGGGGGG
21/11/2022 22:45:45 logger: ==================>4626 paired-UMI(s) smaller than or equal to thres 1 and 20053 paired-UMI(s) above thres 1
21/11/2022 22:45:45 logger: ==================># of chimerical reads detected: 4626
21/11/2022 22:45:45 logger: ==================># of non-chimerical reads detected: 43670
21/11/2022 22:45:45 logger: ======>start writing...
21/11/2022 22:45:45 logger: ======>finish writing in 0.00s</code></pre>
                            </li>
                            <li>
                                <p class="fs-5">
                                    by marking attribute <code>method</code> as <code>dc_by_vote</code>
                                </p>
                                <pre><code class="language-python">run Mclumi internally.
21/11/2022 22:48:59 logger: ===>reading the bam file... /home/jsun/software/mclumi/mclumi/example/data/TSO_polyAUMI_gene_sorted.bam
21/11/2022 22:48:59 logger: ===>reading BAM time: 0.01s
21/11/2022 22:48:59 logger: =========>start converting bam to df...
21/11/2022 22:49:00 logger: =========>time to df: 0.888s
21/11/2022 22:49:00 logger: ======># of raw reads: 48296
21/11/2022 22:49:00 logger: ======># of reads with qualified chrs: 48296
21/11/2022 22:49:01 logger: ==================># of chimerical reads detected: 3793
21/11/2022 22:49:01 logger: ==================># of non-chimerical reads detected: 44503
21/11/2022 22:49:01 logger: ======>start writing...
21/11/2022 22:49:01 logger: ======>finish writing in 0.00s</code></pre>
                            </li>
                        </ol>
                    </div>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Deduplication of chimeric reads</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Glimpse of methods</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">Running</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">Output</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
