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
                        <h2 class="blog-post-title mb-1">The directional algorithm</h2>
                        <div class="alert alert-primary" role="alert">
                            The <code>directional</code> algorithm in the UMI-tools suite
                            has been reported to achieve the best expectancy
                            in identifying PCR duplicates. In mclUMI, we re-implemented
                            the directional method to familiarize ourselves with the
                            UMI deduplication and ensure our further optimization work,
                            so that we could propose a more flexible
                            method based on Markov clustering. What does the output of the
                            <code>directional</code> module in both UMI-tools and mclUMI look like?
                            Please see below.
                        </div>
                    </div>

                    <div id="item-1-1">
                        <h3 class="blog-post-title mb-1">Introduction of graphs</h3>
                        <div class="alert alert-primary" role="alert">
                            We also reimplemented the <code>cluster</code> and <code>adjacency</code>
                            methods of UMI-tools. The story starts: a graph is
                            first constructed with a set of nodes (i.e., unique UMIs),
                            with every two connected with an edge if the edit distance
                            between them in the graph is less than a threshold <code>k</code> and
                            unconnected, otherwise, which results in a multitude of
                            connected components (CCs, also called the <code>cluster</code> method
                            in UMI-tools). Connected subcomponents (sub-CCs) are further
                            compartmentalized on each CC by using one-edge-away visiting
                            strategy from the node with the highest count,
                            leading to the adjacency method in UMI-tools.
                            Since cluster and adjacency often led to an underestimated
                            number and an overestimated number of unique UMIs,
                            the directional method was introduced to seek for a
                            more balanced estimation between somewhat of the two
                            extremes. Starting from the node M with the highest
                            UMI count in each connected component, using the
                            directional strategy any neighbour N connecting the
                            node is grouped into the same sub-CC if CM is at
                            least twofold larger than CN where CM and CN are
                            the counts of nodes M and N. Next, after the
                            first sub-CC in the CC is formed this way the
                            node with the highest count from all remaining unvisited
                            nodes is picked up for forming the second sub-CC.
                            The process is repeated and aborted until all
                            nodes in the CC are visited only once, leaving
                            K sub-CCs in the CC. Clearly, the directional
                            method allows different nodes to be merged into
                            a sub-CC with a higher edit distance between a
                            pair of UMIs, which makes it distinct from most of UMI identification strategies.
                        </div>
                        <div class="text-center">
                            <img src="{{ URL::asset('img/mclumi/ave_ed.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Output of the directional algorithm in UMI-tools and mclUMI.
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
                <a class="nav-link" href="#item-1">The directional algorithm</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Introduction of graphs</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
