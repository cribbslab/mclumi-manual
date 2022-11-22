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
                        <h2 class="blog-post-title mb-1">Trim</h2>
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

                    {{-- Running --}}
                    <div id="item-1-1">
                        <h2>Running</h2>
                        <ol>
                            <li>
                                <p class="fs-5">in CLI</p>
                                <pre><code class="language-python">mclumi trim -i ./pcr_1.fastq.gz -o ./pcr_1222.fastq.gz -rs primer_1+umi_1+seq_1+seq_2+umi_2+primer_2 -l 20+12+6+8+10+20</code></pre>
                            </li>
                            <li>
                                <p class="fs-5">in Python</p>
                                <div class="alert alert-secondary" role="alert">
                                    In python inline mode, a set of
                                    parameters need to be specified in json format for the
                                    composition/structure of your input reads.
                                    We show an example of trimming reads by
                                    template switching oligos (TSO), each consisting of a barcode
                                    first, an UMI then,
                                    a genomic sequence, the second barcode, and the second UMI.

                                    <br>
                                    <br>
                                    Suppose you have the whole structure of each read orderly placed by a primer,
                                    a UMI, a genomic sequence, another genomic sequence, the second UMI,
                                    the third UMI, and another primer, then you need to use the following
                                    grammar to describe the structure,
                                    <code>primer_1+umi_1+seq_1+seq_2+umi_2+umi_3+primer_2</code>. For each
                                    component, like <code>umi_1</code>, you have to set the attribute
                                    <code>len</code> to it as below. The <code>fastq</code> parameter says
                                    the read file path and the new file path with trimmed reads.
                                </div>
                                <pre><code class="language-python">read_structure = {
    'read_struct': 'primer_1+umi_1+seq_1+seq_2+umi_2+umi_3+primer_2',
    'umi_1': {
        'len': 12,
    },
    'umi_2': {
        'len': 10,
    },
    'umi_3': {
        'len': 12,
    },
    'primer_1': {
        'len': 20,
    },
    'primer_2': {
        'len': 20,
    },
    'seq_1': {
        'len': 6,
    },
    'seq_2': {
        'len': 8,
    },
    'fastq': {
        'fpn': to('example/data/pcr_1.fastq.gz'),
        'trimmed_fpn': to('example/data/pcr_1_trim.fastq.gz'),
    },
}</code></pre>
                                <div class="alert alert-secondary" role="alert">
                                    Then, all you need to do is to give the
                                    <code>read_structure</code> json declaration to the <code>trim</code> module.
                                </div>
                                <pre><code class="language-python">import mclumi as mu

mu.trim(
    params=read_structure,
)</code></pre>
                            </li>
                        </ol>
                    </div>

                    {{-- Output --}}
                    <div id="item-1-2">
                        <h2>Output</h2>
                        <pre><code class="language-python">21/11/2022 00:55:59 logger: run Mclumi internally.
21/11/2022 00:55:59 logger: Your params for trimming UMIs are:
21/11/2022 00:55:59 logger: ===>reading from fastq...
21/11/2022 00:55:59 logger: ===>umi structure: primer_1+umi_1+seq_1+seq_2+umi_2+umi_3+primer_2
21/11/2022 00:55:59 logger: ===>bc positions in the read structure:
21/11/2022 00:55:59 logger: ===>umi positions in the read structure: 1, 4, 5
21/11/2022 00:55:59 logger: ===>seq positions in the read structure: 2, 3
21/11/2022 00:55:59 logger: ======>finding the starting positions of all UMIs...
21/11/2022 00:55:59 logger: ======>finding the starting positions of all UMIs...
21/11/2022 00:55:59 logger: =========>umi_1 starting position: 20
21/11/2022 00:55:59 logger: =========>umi_2 starting position: 46
21/11/2022 00:55:59 logger: =========>umi_3 starting position: 56
21/11/2022 00:55:59 logger: ======>finding the starting positions of all genomic sequence...
21/11/2022 00:55:59 logger: =========>seq_1 starting position: 32
21/11/2022 00:55:59 logger: =========>seq_2 starting position: 38
21/11/2022 00:55:59 logger: ===>umi_1 has been taken out
21/11/2022 00:55:59 logger: ===>umi_2 has been taken out
21/11/2022 00:55:59 logger: ===>umi_3 has been taken out
21/11/2022 00:55:59 logger: ===>seq_1 has been taken out
21/11/2022 00:55:59 logger: ===>seq_2 has been taken out
21/11/2022 00:55:59 logger: ===>start saving in gz format...
21/11/2022 00:55:59 logger: ===>trimmed UMIs have been saved in gz format.</code></pre>
                    </div>


                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Trim</a>
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
