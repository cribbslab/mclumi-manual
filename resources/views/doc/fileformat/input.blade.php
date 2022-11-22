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
                        <h2 class="blog-post-title mb-1">Input</h2>
                        <div class="alert alert-primary" role="alert">
                            mclUMI receives a bam file as input by
                            default after using a trimmed <code>*.fastq.gz</code> file
                            with each read umi attached to the read name.
                            In single cell sequencing read analysis,
                            barcodes will be attached to the read name prior to their UMIs.
                            The <code>*.fastq.gz</code> can be mapped to a reference genome
                            to yield a bam file using a
                            mapping tool, such as <code>HISAT2</code> or <code>STAR</code>. For simulation purposes,
                            the bam file can be generated using another pipeline
                            called Resimpy, which uses a <code>fastq.gz</code> file as
                            input directly and outputs a bam file because Resimpy
                            will control the format of simulated fastq.gz files to
                            be recognized by the
                            <a href="{{ url('doc/functionality/trim') }}">trim</a> module.
                        </div>
                    </div>

                    {{-- Preprocessed BAM file by UMI-tools --}}
                    <div id="item-1-1">
                        <h2>Preprocessed BAM file by UMI-tools</h2>
                        <div class="alert alert-secondary" role="alert">
                            Besides, we noticed that UMI-tools employed a module for
                            preprocessing a BAM file with high quality.
                            To enable use of this UMI-tools module in mclUMI,
                            you can import a module BundlePos with its class object
                            <code>bundlePos</code> to deal with this issue. All qualified reads
                            will be accessible to section tags
                            <code>PO='pos'</code> in the bundle
                            bam file. Unqualified reads are filtered,
                            due to factors such as poorly recognized contigs.
                        </div>
                        <pre><code class="language-python">from mclumi as mu

in_fpn = to('your_working_path/example.bam')
out_fpn = to('your_working_path/example_bundle.bam')

mu.external.umi_tools_bundle_pos.convert(options=options, in_fpn=in_fpn, out_fpn=out_fpn)</code></pre>
                    </div>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Input</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Preprocessed BAM file by UMI-tools</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
