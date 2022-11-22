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
                        <h2 class="blog-post-title mb-1">Overview</h2>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>mclUMI</strong>
                            is a toolkit developed by using the Markov clustering (MCL) network-based
                            algorithm for precisely correcting UMI errors and thus counting unique UMIs.
                            mclUMI is an OOP-styled (object-oriented programming) Python implementation toolkit.
                            It provides 4 modules for UMI deduplication, including <code>dedup_basic</code>,
                            <code>dedup_pos</code>, <code>dedup_gene</code>, and <code>dedup_sc</code>, 1
                            module <code>dechimeric</code> for gene translocation detection, and 1
                            module <code>trim</code> for pro-processing the input alignment file. Each module
                            for UMI deduplication includes 7 algorithms, that is, <code>unique</code>, <code>cluster</code>,
                            <code>adjacency</code>, <code>directional</code>,
                            <code>mcl</code>, <code>mcl_ed</code>, and <code>mcl_val</code>,
                            each taking as input the alignment result in a bam file and output a
                            UMI-deduplicated alignment in a new bam file and another 2 summary files.

                            <br>
                            <br>
                            mclUMI provides two user-friendly interfaces to run
                            internally (Python inline) or externally (CLI). If you choose to run it
                            in Python, all you need to do is to claim <code>import mclumi as mu</code>
                            in a
                            <a href="https://www.python.org/doc/">Python script</a> or a
                            <a href="https://jupyter.org">Jupyter notebook</a> to
                            access all modules in it.
                            Otherwise, you can run mclUMI by putting a command in a command shell
                            with parameters just as below.
                            Details are introduced in
                            <a href="{{ url('doc/functionality/trim') }}">trim</a>,
                            <a href="{{ url('doc/functionality/dedup_basic') }}">dedup_basic</a>
                            <a href="{{ url('doc/functionality/dedup_pos') }}">dedup_pos</a>,
                            <a href="{{ url('doc/functionality/dedup_gene') }}">dedup_gene</a>,
                            <a href="{{ url('doc/functionality/dedup_sc') }}">dedup_sc</a>,
                            <a href="{{ url('doc/functionality/dechimeric') }}">dechimeric</a>.

                            <button type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>

                    <div id="item-2">
                        <h2>The interface of mclUMI</h2>
                        <pre><code class="language-python"> __  __  ____ _    _   _ __  __ ___   _____           _ _    _ _
|  \/  |/ ___| |  | | | |  \/  |_ _| |_   _|__   ___ | | | _(_) |_
| |\/| | |   | |  | | | | |\/| || |    | |/ _ \ / _ \| | |/ / | __|
| |  | | |___| |__| |_| | |  | || |    | | (_) | (_) | |   <| | |_
|_|  |_|\____|_____\___/|_|  |_|___|   |_|\___/ \___/|_|_|\_\_|\__|


 _    _      _
| |  | |    | |
| |  | | ___| | ___ ___  _ __ ___   ___
| |/\| |/ _ \ |/ __/ _ \| '_ ` _ \ / _ \
\  /\  /  __/ | (_| (_) | | | | | |  __/
 \/  \/ \___|_|\___\___/|_| |_| |_|\___|

usage: mclumi [-h] [--read_structure read_structure] [--lens lens] [--input input] [--output output] [--method method] [--input_bam input_bam]
  [--edit_dist edit dist] [--inflation_value inflation_value] [--expansion_value expansion_value] [--iteration_number iteration_number]
  [--mcl_fold_thres mcl_fold_thres] [--tc_thres tc_thres] [--is_sv is_sv] [--output_bam output_bam] [--output_dedup_sum output_dedup_sum]
  [--output_ave_ed output_ave_ed] [--output_bam_c output_bam_c] [--verbose verbose] [--pos_tag pos_tag]
  [--gene_assigned_tag gene_assigned_tag] [--gene_is_assigned_tag gene_is_assigned_tag]
  tool

Welcome to the mclumi toolkit

positional arguments:
  tool                  trim, dedup_basic, dedup_pos, dedup_gene, dedup_sc, dechimeric

optional arguments:
  -h, --help            show this help message and exit
  --read_structure read_structure, -rs read_structure
                        str - the read structure with elements in conjunction with +, e.g., primer_1+umi_1+seq_1+umi_2+primer_2
  --lens lens, -l lens  str - lengths of all sub-structures separated by +, e.g., 20+10+40+10+20 if the read structure is
                        primer_1+umi_1+seq_1+umi_2+primer_2
  --input input, -i input
                        str - input a fastq file in gz format for trimming UMIs
  --output output, -o output
                        str - output a UMI-trimmed fastq file in gz format.
  --method method, -m method
                        str - a dedup method: unique | cluster | adjacency | directional | mcl | mcl_ed | mcl_val | dc_by_cnt
  --input_bam input_bam, -ibam input_bam
                        str - input a bam file curated by requirements of different dedup modules: dedup_basic, dedup_pos, dedup_gene, dedup_sc,
                        dechimeric
  --edit_dist edit dist, -ed edit dist
                        int - an edit distance used for building graphs at a range of [1, l) where l is the length of a UMI
  --inflation_value inflation_value, -infv inflation_value
                        float - an inflation value for MCL, 2.0 by default
  --expansion_value expansion_value, -expv expansion_value
                        int - an expansion value for MCL at a range of (1, +inf), 2 by default
  --iteration_number iteration_number, -itern iteration_number
                        int - iteration number for MCL at a range of (1, +inf), 100 by default
  --mcl_fold_thres mcl_fold_thres, -fthres mcl_fold_thres
                        float - a fold threshold for MCL at a range of (1, l) where l is the length of a UMI.
  --tc_thres tc_thres, -tcthres tc_thres
                        float - a count threshold for removing chimerical reads made during PCR amplification
  --is_sv is_sv, -issv is_sv
                        bool - to make sure if the deduplicated reads writes to a bam file (True by default or False)
  --output_bam output_bam, -obam output_bam
                        str - output a bam file containing UMI-deduplicated or dechimerical reads, or output other summary statistics.
  --output_dedup_sum output_dedup_sum, -odsum output_dedup_sum
                        str - output deduplicated statistics (including count matrix) to a file.
  --output_ave_ed output_ave_ed, -oaed output_ave_ed
                        str - output statistics of average edit distances to a file.
  --output_bam_c output_bam_c, -obam_c output_bam_c
                        str - output a bam file containing chimerical reads.
  --verbose verbose, -vb verbose
                        bool - to enable if output logs are on console (True by default or False)
  --pos_tag pos_tag, -pt pos_tag
                        str - to enable deduplication on the position tags (PO recommended when your bam is tagged)
  --gene_assigned_tag gene_assigned_tag, -gt gene_assigned_tag
                        str - to enable deduplication on the gene tag (XT recommended)
  --gene_is_assigned_tag gene_is_assigned_tag, -gist gene_is_assigned_tag
                        str - to check if reads are assigned the gene tag (XS recommended)</code></pre>
                    </div>
                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Overview</a>
                <a class="nav-link" href="#item-2">The interface of mclUMI</a>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
