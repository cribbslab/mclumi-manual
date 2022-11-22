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
                        <h2 class="blog-post-title mb-1">Output</h2>
                        <div class="alert alert-primary" role="alert">
                            mclUMI provides three output files after running each of the
                            <code>dedup_basic</code>, <code>dedup_pos</code>,
                            <code>dedup_gene</code>, and <code>dedup_sc</code> modules, with the following names.

                            <ol>
                                <li>
                                    <span class="badge rounded-pill text-bg-light">{method}_ave_ed_pos_bin.txt</span>
                                </li>
                                <li>
                                    <span class="badge rounded-pill text-bg-light">{method}_dedup_sum.txt</span>
                                </li>
                                <li>
                                    <span class="badge rounded-pill text-bg-light">{name}_dedup.bam</span>
                                </li>
                            </ol>
                            <code>{method}</code> above refers to one of the seven tags,
                            <ol>
                                <li>
                                    <code>uniq</code>
                                </li>
                                <li>
                                    <code>cc</code>
                                </li>
                                <li>
                                    <code>adj</code>
                                </li>
                                <li>
                                    <code>direc</code>
                                </li>
                                <li>
                                    <code>mcl</code>
                                </li>
                                <li>
                                    <code>mcl_val</code>
                                </li>
                                <li>
                                    <code>mcl_ed</code>
                                </li>
                            </ol>
                            standing for the <code>unique</code>, <code>adjacency</code>,
                            <code>directional</code>, <code>mcl</code>, <code>mcl_val</code>,
                            or <code>mcl_ed</code> method, correspondingly.
                            <code>{name}</code> can be designated by users. The result format is spelt out below.
                        </div>
                    </div>

                    {{-- 1. Deduplication at a genomic locus --}}
                    <div id="item-1-1">
                        <h2>1. Deduplication at a genomic locus</h2>
                        <div class="alert alert-secondary" role="alert">
                            After running module <a href="{{ url('doc/functionality/dedup_basic') }}">dedup_basic</a>,
                            the deduplicated reads will be stored in a new bam file and
                            the UMI count summary results will be stored in a
                            <span class="badge rounded-pill text-bg-light">{method}_ave_ed_pos_bin.txt</span>
                            indicating observed UMIs under a certain condition (e.g., at genomic positions)
                            file and a <span class="badge rounded-pill text-bg-light">{method}_dedup_sum.txt</span> file
                            indicating deduplicated UMI counts across all reads in the newly generated bam file.
                        </div>

                        <ol>
                            <li>
                                <p class="fs-5">
                                    For <span class="badge rounded-pill text-bg-light">{method}_ave_ed_pos_bin.txt</span>,
                                    we have a table as below.
                                </p>
                                <div class="row">
                                    <div class="col-4 offset-4">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">edit distance</th>
                                                <th scope="col">number</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                            <tr>
                                                <th scope="row">-1.0</th>
                                                <td>3652</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2.0</th>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3.0</th>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">…</th>
                                                <td>…</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <i class="fa-solid fa-circle-info"></i>
                                    Note
                                    <ul>
                                        <li>
                                            the 1st column: average edit distance between UMIs at genomic positions.
                                        </li>
                                        <li>
                                            the 2nd column: number of gene-by-cell types observed with those average edit distance, respectively.
                                        </li>
                                        <li>
                                            -1.0 represents that only one unique umi seen at a single genomic position; in total there are 3652 genomic positions seen with one unique umi.
                                        </li>
                                    </ul>
                                </div>
                                <div class="alert alert-danger" role="alert">
                                    Besides, data at the 3rd row is interpreted as:
                                    the number of genomic positions observed
                                    with an average edit distance 3 between UMIs is 4.
                                </div>
                            </li>
                            <li>
                                <p class="fs-5">
                                    For <span class="badge rounded-pill text-bg-light">{method}_dedup_sum.txt</span>,
                                    we have a table as below.
                                </p>
                                <div class="row">
                                    <div class="col-8 offset-2">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">index</th>
                                                <th scope="col">{method}_umi_len</th>
                                                <th scope="col">ave_eds</th>
                                                <th scope="col">uniq_umi_len</th>
                                                <th scope="col">dedup_uniq_diff_pos</th>
                                                <th scope="col">dedup_read_diff_pos</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                            <tr>
                                                <th scope="row">None</th>
                                                <td>4</td>
                                                <td>4.0</td>
                                                <td>4</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <i class="fa-solid fa-circle-info"></i>
                                    Note
                                    <ul>
                                        <li>
                                            the 1st column: single genomic locus denoted as <code>None</code>
                                        </li>
                                        <li>
                                            the 2nd column: deduplicated UMI counts (corresponding
                                            to the number of DNA molecules/transcripts) at genomic positions.
                                        </li>
                                        <li>
                                            the 3rd column: average edit distances between UMIs at given genomic positions
                                        </li>
                                        <li>
                                            the 4th column: unique UMI counts at given genomic positions
                                        </li>
                                        <li>
                                            the 5th column: difference in dedup UMI counts and original unique UMI counts
                                        </li>
                                        <li>
                                            the 6th column: difference in the number of dedup reads and original reads
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ol>

                    </div>

                    {{-- 2. Deduplication at multiple genomic loci --}}
                    <div id="item-1-2">
                        <h2>2. Deduplication at multiple genomic loci</h2>
                        <div class="alert alert-secondary" role="alert">
                            The output below is obtained after running module
                            <a href="{{ url('doc/functionality/dedup_pos') }}">dedup_pos</a>.
                        </div>

                        <ol>
                            <li>
                                <p class="fs-5">
                                    For <span class="badge rounded-pill text-bg-light">{method}_ave_ed_pos_bin.txt</span>,
                                    the output format is kept the same as above.
                                </p>
                            </li>
                            <li>
                                <p class="fs-5">
                                    For <span class="badge rounded-pill text-bg-light">{method}_dedup_sum.txt</span>,
                                    we have a table as below.
                                </p>
                                <div class="row">
                                    <div class="col-8 offset-2">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">index</th>
                                                <th scope="col">{method}_umi_len</th>
                                                <th scope="col">ave_eds</th>
                                                <th scope="col">uniq_umi_len</th>
                                                <th scope="col">dedup_uniq_diff_pos</th>
                                                <th scope="col">dedup_read_diff_pos</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                            <tr>
                                                <th scope="row">0</th>
                                                <td>4</td>
                                                <td>4.0</td>
                                                <td>4</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>2</td>
                                                <td>5.0</td>
                                                <td>2</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>7</td>
                                                <td>4.0</td>
                                                <td>9</td>
                                                <td>2</td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">…</th>
                                                <td>…</td>
                                                <td>…</td>
                                                <td>…</td>
                                                <td>…</td>
                                                <td>…</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <i class="fa-solid fa-circle-info"></i>
                                    Note
                                    <ul>
                                        <li>
                                            the 1st column: genomic positions of interest
                                        </li>
                                        <li>
                                            the 2nd column: deduplicated UMI counts (corresponding
                                            to the number of DNA molecules/transcripts) at genomic positions.
                                        </li>
                                        <li>
                                            the 3rd column: average edit distances between UMIs at given genomic positions
                                        </li>
                                        <li>
                                            the 4th column: unique UMI counts at given genomic positions
                                        </li>
                                        <li>
                                            the 5th column: difference in dedup UMI counts and original unique UMI counts
                                        </li>
                                        <li>
                                            the 6th column: difference in the number of dedup reads and original reads
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ol>
                    </div>

                    {{-- 3. Deduplication of bulk RNA-seq reads --}}
                    <div id="item-1-3">
                        <h2>3. Deduplication of bulk RNA-seq reads</h2>
                        <div class="alert alert-secondary" role="alert">
                            The output below is obtained after running module
                            <a href="{{ url('doc/functionality/dedup_gene') }}">dedup_gene</a>.
                        </div>
                        <ol>
                            <li>
                                <p class="fs-5">
                                    For <span class="badge rounded-pill text-bg-light">{method}_ave_ed_pos_bin.txt</span>,
                                    the output format is kept the same as above.
                                </p>
                            </li>
                            <li>
                                <p class="fs-5">
                                    For <span class="badge rounded-pill text-bg-light">{method}_dedup_sum.txt</span>,
                                    we can actually have more tables as below.
                                </p>
                                <ul>
                                    <li>
                                        <p class="fs-5">If we denote reads to be from genes, we have</p>
                                        <div class="row">
                                            <div class="col-8 offset-2">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">index</th>
                                                        <th scope="col">{method}_umi_len</th>
                                                        <th scope="col">ave_eds</th>
                                                        <th scope="col">uniq_umi_len</th>
                                                        <th scope="col">dedup_uniq_diff_pos</th>
                                                        <th scope="col">dedup_read_diff_pos</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-group-divider">
                                                    <tr>
                                                        <th scope="row">ENSG00000000003</th>
                                                        <td>5</td>
                                                        <td>9.0</td>
                                                        <td>5</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ENSG00000000419</th>
                                                        <td>8</td>
                                                        <td>9.0</td>
                                                        <td>8</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ENSG00000000457</th>
                                                        <td>2</td>
                                                        <td>9.0</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">…</th>
                                                        <td>…</td>
                                                        <td>…</td>
                                                        <td>…</td>
                                                        <td>…</td>
                                                        <td>…</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fa-solid fa-circle-info"></i>
                                            Note
                                            <ul>
                                                <li>
                                                    the 1st column: gene types
                                                </li>
                                                <li>
                                                    the 2nd column: deduplicated UMI counts (corresponding
                                                    to the number of DNA molecules/transcripts) at a given gene type
                                                </li>
                                                <li>
                                                    the 3rd column: average edit distances between UMIs at given gene types
                                                </li>
                                                <li>
                                                    the 4th column: unique UMI counts at given gene types
                                                </li>
                                                <li>
                                                    the 5th column: difference in dedup UMI counts and original unique UMI counts
                                                </li>
                                                <li>
                                                    the 6th column: difference in the number of dedup reads and original reads
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="fs-5">If we denote reads to be from chromosomes, we have</p>
                                        <div class="row">
                                            <div class="col-8 offset-2">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">index</th>
                                                        <th scope="col">{method}_umi_len</th>
                                                        <th scope="col">ave_eds</th>
                                                        <th scope="col">uniq_umi_len</th>
                                                        <th scope="col">dedup_uniq_diff_pos</th>
                                                        <th scope="col">dedup_read_diff_pos</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-group-divider">
                                                    <tr>
                                                        <th scope="row">chr1</th>
                                                        <td>7372</td>
                                                        <td>10.0</td>
                                                        <td>9962</td>
                                                        <td>2590</td>
                                                        <td>2590</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">chr10</th>
                                                        <td>1</td>
                                                        <td>-1.0</td>
                                                        <td>1969</td>
                                                        <td>1968</td>
                                                        <td>1968</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">chr11</th>
                                                        <td>563</td>
                                                        <td>10.0</td>
                                                        <td>6332</td>
                                                        <td>5769</td>
                                                        <td>5769</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">…</th>
                                                        <td>…</td>
                                                        <td>…</td>
                                                        <td>…</td>
                                                        <td>…</td>
                                                        <td>…</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>

                    {{-- 4. Deduplication of scRNA-seq reads --}}
                    <div id="item-1-4">
                        <h2>4. Deduplication of scRNA-seq reads</h2>
                        <div class="alert alert-secondary" role="alert">
                            The output below is obtained after running module
                            <a href="{{ url('doc/functionality/dedup_sc') }}">dedup_sc</a>.
                        </div>
                        <ol>
                            <li>
                                <p class="fs-5">
                                    For <span class="badge rounded-pill text-bg-light">{method}_ave_ed_pos_bin.txt</span>,
                                    the output format is kept the same as above.
                                </p>
                            </li>
                            <li>
                                <p class="fs-5">
                                    For <span class="badge rounded-pill text-bg-light">{method}_dedup_sum.txt</span>,
                                    we have a table as below.
                                </p>
                                <div class="row">
                                    <div class="col-8 offset-2">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">index</th>
                                                <th scope="col">{method}_umi_len</th>
                                                <th scope="col">ave_eds</th>
                                                <th scope="col">uniq_umi_len</th>
                                                <th scope="col">dedup_uniq_diff_pos</th>
                                                <th scope="col">dedup_read_diff_pos</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                            <tr>
                                                <th scope="row">(‘AAAGATGAGAAACGAG’, ‘exon-NM_000099.4-3’)</th>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">(‘AAAGATGAGAAACGAG’, ‘exon-NM_000100.4-3’)</th>
                                                <td>14</td>
                                                <td>0</td>
                                                <td>14</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">(‘AAAGATGAGAAACGAG’, ‘exon-NM_000101.4-6’)</th>
                                                <td>3</td>
                                                <td>0</td>
                                                <td>3</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">…</th>
                                                <td>…</td>
                                                <td>…</td>
                                                <td>…</td>
                                                <td>…</td>
                                                <td>…</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="alert alert-warning" role="alert">
                                    <i class="fa-solid fa-circle-info"></i>
                                    Note
                                    <ul>
                                        <li>
                                            the 1st column: gene-by-cell types
                                        </li>
                                        <li>
                                            the 2nd column: dedup UMI counts (corresponding to the number
                                            of DNA molecules/transcripts) at given gene-by-cell types
                                        </li>
                                        <li>
                                            the 3rd column: average edit distance between UMIs at given gene-by-cell types
                                        </li>
                                        <li>
                                            the 4th column: unique UMI counts at given gene-by-cell types
                                        </li>
                                        <li>
                                            the 5th column: difference in dedup UMI counts and original unique UMI counts
                                        </li>
                                        <li>
                                            the 6th column: difference in the number of dedup reads and original reads
                                        </li>
                                    </ul>
                                </div>
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
                <a class="nav-link" href="#item-1">Output</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Deduplication at a genomic locus</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Deduplication at multiple genomic loci</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. Deduplication of bulk RNA-seq reads</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-4">4. Deduplication of scRNA-seq reads</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
