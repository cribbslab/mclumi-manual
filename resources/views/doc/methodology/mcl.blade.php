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
                        <h2 class="blog-post-title mb-1">Markov clustering for UMI deduplication</h2>
                        <div class="alert alert-primary" role="alert">
                            mclUMI is a Markov clustering (MCL) network-based software suite
                            comprising two modules of <code>mcl-val</code> and <code>mcl-ed</code>,
                            for precisely localizing unique UMIs and thus
                            removing PCR duplicates. Different from all established methods,
                            our MCL-based methods initially allow UMI nodes to be
                            merged spontaneously based only on the connectivity of
                            edges created by a given edit distance in each of connected
                            components of a UMI-structured graph.
                        </div>
                    </div>

                    {{-- Glimpse of methods --}}
                    <div id="item-1-1">
                        <h2 class="blog-post-title mb-1">Glimpse of the mclUMI method</h2>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/mclumi/umi_dedup_intro.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Illustration of UMI deduplication. Error quantification
                                of UMI-tagged molecules during PCR amplification and
                                sequencing. UMI errors of duplicates become acute
                                during sequencing, which leads to more erroneous UMIs.
                            </div>
                        </div>

                        <div class="text-center">
                            <img src="{{ URL::asset('img/mclumi/simple_graph_illu.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                UMI deduplication by graph-based <code>cluster</code>,
                                <code>adjacency</code>, <code>directional</code>, <code>MCL</code>,
                                <code>MCL-ed</code>, and <code>MCL-val</code> algorithms.
                                Each graph is constructed with an edit-distance threshold
                                1. Edge colours represent different groups.
                                Nodes A and D with 120 and 90 UMIs are chosen to
                                be representative in the two UMI communities detected
                                by MCL, respectively. Using <code>MCL-ed</code>, the two groups in
                                MCL whose representative nodes A and D are 1 edit distance
                                away to satisfy the given threshold 1 are merged into one
                                group. Using <code>MCL-val</code>, the two groups in MCL are not merged
                                because of 2CA-1<2CD or 2CD-1<2CA.
                            </div>
                        </div>

                        <div class="text-center">
                            <img src="{{ URL::asset('img/mclumi/bar_mclumi_vs.umitools.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Performance comparison between UMI-tools and mclUMI.
                            </div>
                        </div>

                        <div class="text-center">
                            <img src="{{ URL::asset('img/mclumi/mcl_vs._direc.png') }}" class="img-thumbnail" alt="" width="1200" height="900" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Comparison of the <code>directional</code> and <code>mclUMI</code>
                                performance on identifying unique UMIs with
                                high sequencing errors across 10 permutation tests. a.
                                Fold changes (FCs) between the estimated and true number of
                                UMI-tagged molecules over multiple sequencing error rates
                                using the <code>directional</code>, <code>mcl_ed</code>,
                                and <code>mcl_val</code> methods. Error bars of each dot (averaged FCs)
                                represents the variance of FCs across 10 permutation
                                tests. b. Close-up of FCs in relatively low
                                (10^(-6)-10^(-3)) and very high sequencing error rates
                                (2.5×10^(-2)-2×10^(-1)). Strip plots display the
                                averaged FC values in diamonds and the FCs per permutation
                                in circles. c. Difference of FC (dFC, see section Evaluation
                                metrics) between <code>directional</code> and <code>mcl_ed</code> (dFC_ed), and
                                <code>directional</code> and <code>mcl_val</code> (dFC_val). d. <code>directional</code>
                                FCs plotted against <code>mcl_ed</code> FCs and <code>mcl_val</code> FCs.
                                Lines with confidence intervals in red are plotted by
                                fitting the pairs of FCs using regression models. e.
                                Distribution of FCs of different UMI identification
                                methods over sequencing error rates.
                            </div>
                        </div>

                        <div class="text-center">
                            <img src="{{ URL::asset('img/mclumi/sc.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Comparison of the <code>directional</code> and <code>mclUMI</code>
                                performance on identifying unique UMIs of
                                true molecules from simulated single-cell
                                sequencing reads changed with sequencing error rates.
                                Each subplot contains a title showing a cell type and a
                                gene type numbered from 1-10 where <code>cnt</code> is the count
                                of a gene expressed at a cell type.
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
                <a class="nav-link" href="#item-1">Markov clustering for UMI deduplication</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Glimpse of mclUMI</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
