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
                        <h2 class="blog-post-title mb-1">umiRarity for chimeric read removal</h2>
                        <div class="alert alert-primary" role="alert">
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

                        <div class="text-center">
                            <img src="{{ URL::asset('img/dechimeric/bar.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Number of unique UMIs. Merged UMIs acute the rarity of
                                UMIs by significantly increasing the number/counts of
                                unique UMIs compared to those of single-ended UMIs.
                                The corrected panel shows a more obvious trend of rarity
                                of merged UMIs over sequencing errors than the non-corrected panel.
                            </div>
                        </div>

                        <div class="text-center">
                            <img src="{{ URL::asset('img/dechimeric/violin.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Violin plot of distributions of corrected and non-corrected
                                unique UMIs (simulated) at 3’ and 5’ ends, and merged UMIs
                                of 3’ and 5’ ends over sequencing errors.
                            </div>
                        </div>

                        <div class="text-center">
                            <img src="{{ URL::asset('img/dechimeric/umirarity_non_corr.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Performance of detection of chimeric reads based on non-corrected
                                UMIs of trimer blocks using the umiRarity method.
                                The chimeric reads (lines in orange) were detected,
                                accompanied by detecting a proportion of PCR duplicates
                                (lines in green) and sacrificing a proportion of real reads
                                (lines in blue). The vertical dash line represents the
                                perfect detection and removal of chimeric reads without sacrificing
                                real reads at the sequencing error at best.
                            </div>
                        </div>

                        <div class="text-center">
                            <img src="{{ URL::asset('img/dechimeric/umirarity_corr.png') }}" class="img-thumbnail" alt="" width="1000" height="700" loading="lazy">
                            <div class="pb-4 mb-4 fst-italic border-bottom">
                                <br><strong>Caption</strong>.
                                Performance of detection of chimeric reads based
                                on corrected UMIs of trimer blocks using the umiRarity
                                method. The chimeric reads (lines in orange) were
                                detected, accompanied by detecting a proportion of
                                PCR duplicates (lines in green) and sacrificing a
                                proportion of real reads (lines in blue). The vertical
                                dash line represents the perfect detection and removal
                                of chimeric reads without sacrificing real reads at the
                                sequencing error at best.
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
                <a class="nav-link" href="#item-1">umiRarity for chimeric read removal</a>
                <nav class="nav nav-pills flex-column">
{{--                    <a class="nav-link ms-3 my-1" href="#item-1-5">self-customized</a>--}}
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
