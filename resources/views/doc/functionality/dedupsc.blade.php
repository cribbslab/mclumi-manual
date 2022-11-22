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
                        <h2 class="blog-post-title mb-1">Deduplication of scRNA-seq reads</h2>
                        <div class="alert alert-primary" role="alert">
                            The <code>dedup_sc</code>> is designed for deduplication of artifacts
                            in single-cell sequencing data. We walk you through an example input
                            file used in UMI-tools, which can be downloaded via either
                            <ul>
                                <li>
                                    <span class="badge rounded-pill text-bg-light">
                                        <a href="https://github.com/cribbslab/mclumi/releases/download/sc_ex_hgmm_100fastq/hgmm_100_R2_extracted.fastq.gz" target="_blank">https://github.com/cribbslab/mclumi/releases/download/sc_ex_hgmm_100fastq/hgmm_100_R2_extracted.fastq.gz
                                        </a>
                                    </span> or
                                </li>
                                <li>
                                    <span class="badge rounded-pill text-bg-light">
                                        <a href="http://cf.10xgenomics.com/samples/cell-exp/1.3.0/hgmm_100/hgmm_100_fastqs.tar" target="_blank">http://cf.10xgenomics.com/samples/cell-exp/1.3.0/hgmm_100/hgmm_100_fastqs.tar
                                        </a>
                                    </span>for raw reads.
                                </li>
                            </ul>
                            <code>hgmm_100_STAR_FC_sorted.bam</code> is a pre-processed bam
                            file with each read name attaching a barcode using the UMI-tools whitelist module
                            and a UMI. Alternatively, you can also skip over to by downloading a pre-processed bam
                            file
                            <ul>
                                <li>
                                    <span class="badge rounded-pill text-bg-light fs-7">
                                        <a href="https://github.com/cribbslab/mclumi/releases/download/sc_ex_hgmm_100/hgmm_100_STAR_FC_sorted.bam" target="_blank">https://github.com/cribbslab/mclumi/releases/download/sc_ex_hgmm_100/hgmm_100_STAR_FC_sorted.bam
                                        </a>
                                    </span>
                                </li>
                            </ul>
                            It contains 3,553,230 raw reads. The 100 barcodes were generated using UMI-tools whitelist.
                        </div>
                    </div>

                    {{-- Data download --}}
                    <div id="item-1-1">
                        <h2>Data download</h2>
                        <pre><code class="language-python">wget https://github.com/cribbslab/mclumi/releases/download/sc_ex_hgmm_100fastq/hgmm_100_R2_extracted.fastq.gz</code></pre>
                    </div>

                    {{-- Mapping reads --}}
                    <div id="item-1-2">
                        <h2>Mapping reads</h2>
                        <div class="alert alert-secondary" role="alert">
                            We use STAR (v2.7.9a, <a href="https://academic.oup.com/bioinformatics/article/29/1/15/272537" target="_blank">Dobin et al., 2012</a>) to map reads.
                        </div>
                        <p class="fs-5">Step 1. STAR installation</p>
                        <ul>
                            <li>
                                from source
                                <pre><code class="language-python">wget https://github.com/alexdobin/STAR/archive/2.7.9a.tar.gz
tar -xzf 2.7.9a.tar.gz
cd STAR-2.7.9a
cd STAR/source
make STAR

# https://github.com/alexdobin/STAR</code></pre>
                            </li>
                            <li>
                                from conda
                                <pre><code class="language-python">conda install -c bioconda star</code></pre>
                            </li>
                        </ul>

                        <p class="fs-5">Step 2. Building index</p>
                        <div class="alert alert-secondary" role="alert">
                            To build the index of genome for STAR, you should
                            download the human reference genome (GRCh38) first.
                        </div>
                        <pre><code class="language-python"># download the reference genome in gff format
wget ftp://ftp.ncbi.nlm.nih.gov/refseq/H_sapiens/annotation/GRCh38_latest/refseq_identifiers/GRCh38_latest_genomic.fna.gz
wget ftp://ftp.ncbi.nlm.nih.gov/refseq/H_sapiens/annotation/GRCh38_latest/refseq_identifiers/GRCh38_latest_genomic.gff.gz

# unzip the files
zcat GRCh38_latest_genomic.fna.gz > GRCh38_latest_genomic.fna
zcat GRCh38_latest_genomic.gff.gz > GRCh38_latest_genomic.gff

# index building
STAR --runThreadN 20 --runMode genomeGenerate --genomeDir grch38_gd --genomeFastaFiles GRCh38_latest_genomic.fna --sjdbGTFfile GRCh38_latest_genomic.gff --sjdbGTFtagExonParentTranscript Parent</code></pre>

                        <p class="fs-5">Step 3. Mapping</p>
                        <pre><code class="language-python">STAR --runThreadN 10 --genomeDir grch38_gd/ --readFilesIn hgmm_100_R2_extracted.fastq.gz --readFilesCommand zcat --outFilterMultimapNmax 1 --outSAMtype BAM SortedByCoordinate</code></pre>
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-circle-info"></i>
                            After the STAR mapping to GRCh38, there are 588,963 reads left.
                        </div>

                    </div>

                    {{-- Genome annotation --}}
                    <div id="item-1-3">
                        <h2>Genome annotation</h2>
                        <div class="alert alert-secondary" role="alert">
                            Genes that reads belong to are annotated using
                            featureCounts (v2.0.1,
                            <a href="https://academic.oup.com/bioinformatics/article/30/7/923/232889" target="_blank">
                                Liao et al., 2014
                            </a>
                            ) to map reads.
                        </div>
                        <pre><code class="language-python"># assign features
featureCounts -g ID -a GRCh38_latest_genomic.gff -o gene-assigned -R BAM Aligned.sortedByCoord.out.bam -T 4

# sort index
samtools sort Aligned.sortedByCoord.out.bam -o assigned_sorted.bam

# rename
mv assigned_sorted.bam hgmm_100_STAR_FC_sorted.bam</code></pre>
                        <pre><code class="language-python"># assign features
featureCounts -g ID -a GRCh38_latest_genomic.gff -o gene-assigned -R BAM Aligned.sortedByCoord.out.bam -T 4

# sort index
samtools sort Aligned.sortedByCoord.out.bam -o assigned_sorted.bam

# rename
mv assigned_sorted.bam hgmm_100_STAR_FC_sorted.bam</code></pre>

                    </div>

                    {{-- Count matrix generation --}}
                    <div id="item-1-4">
                        <h2>UMI deduplication and generating a gene-by-cell count matrix</h2>
                        <ul>
                            <li>
                                CLI
                                <pre><code class="language-python">mclumi dedup_sc -m directional -gt XT -gist XS -ed 1 -ibam ./hgmm_100_STAR_FC_sorted.bam -obam ./dedup.bam</code></pre>
                            </li>
                            <li>
                                running in Python
                                <pre><code class="language-python">import mclumi as mu

mu.dedup_sc(
    mode='internal',
    # mode='external',

    # method='unique',
    # method='cluster',
    # method='adjacency',
    # method='directional',
    method='mcl',
    # method='mcl_val',
    # method='mcl_ed',

    bam_fpn=to('example/data/hgmm_100_STAR_FC_sorted.bam'),
    gene_assigned_tag='XT',
    gene_is_assigned_tag='XS',
    mcl_fold_thres=1.5,
    inflat_val=1.6,
    exp_val=2,
    iter_num=100,
    verbose=True,
    ed_thres=6,
    is_sv=False,
    sv_fpn=to('example/data/') + '' + 'hgmm_100_STAR_FC_sorted_dedup.bam',
)</code></pre>
                            </li>
                        </ul>

                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-circle-info"></i>
                            <code>hgmm_100_STAR_FC_sorted_dedup.bam</code> is the final results after
                            UMI deduplication. Each read in the deduplicated
                            file is selected as a representative from its
                            network-based graph with the highest UMI count before
                            deduplication. The final results look like this.
                        </div>

                        <div class="row">
                            <div class="col-4 offset-4">
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

                        <div class="alert alert-danger" role="alert">
                            The second column presents dedup UMI counts
                            (corresponding to the number of DNA molecules/transcripts)
                            at given gene-by-cell types. Please look at
                            <a href="{{ url('doc/fileformat/output') }}">here</a> for
                            detailed explanations of the data format.
                        </div>
                    </div>

                    {{-- Output --}}
                    <div id="item-1-5">
                        <h2>Output</h2>
                        <pre><code class="language-python">run Mclumi internally.
21/11/2022 16:48:33 logger: ======>runing method mcl...
21/11/2022 16:48:33 logger: ===>reading the bam file... /home/jsun/software/mclumi/mclumi/example/data/hgmm_100_STAR_FC_sorted.bam
[E::idx_find_and_load] Could not retrieve index file for '/home/jsun/software/mclumi/mclumi/example/data/hgmm_100_STAR_FC_sorted.bam'
21/11/2022 16:48:33 logger: ===>reading BAM time: 0.00s
21/11/2022 16:48:33 logger: =========>start converting bam to df...
21/11/2022 16:49:12 logger: =========>time to df: 38.651s
21/11/2022 16:49:12 logger: ======># of raw reads: 3553230
21/11/2022 16:49:13 logger: ======># of reads with qualified chrs: 3553230
21/11/2022 16:49:15 logger: ======># of reads with assigned genes: 588963
21/11/2022 16:49:15 logger: ======># of unique barcodes: 100
21/11/2022 16:49:15 logger: ======># of unique umis: 367552
21/11/2022 16:49:15 logger: ======># of redundant umis: 588963
21/11/2022 16:49:16 logger: ======># of gene-by-cell positions in the bam: 102842
21/11/2022 16:49:16 logger: ======>edit distance thres: 6
21/11/2022 16:49:16 logger: ===>start building umi graphs...
21/11/2022 16:54:23 logger: ===>time for building umi graphs: 307.47s
21/11/2022 16:54:24 logger: ===>start deduplication by the mcl method...
21/11/2022 17:02:18 logger: ======>finish finding deduplicated umis in 474.66s
21/11/2022 17:02:18 logger: ======>calculate average edit distances between umis...
21/11/2022 17:02:20 logger: ======>finish calculating ave eds in 1.35s
21/11/2022 17:02:22 logger: ======># of deduplicated unique umis 280287 on the basis of the unique method
21/11/2022 17:02:22 logger: ======># of deduplicated reads 323950 on the basis of the unique method
-1.0     57812
 0.0        10
 1.0       206
 2.0        10
 3.0        68
 4.0       416
 5.0      1407
 6.0       498
 7.0      8742
 8.0     22080
 9.0     10222
 10.0     1371
Name: ave_eds, dtype: int64
21/11/2022 17:02:22 logger: ======>start writing deduplicated reads to BAM...
21/11/2022 17:04:18 logger: ======># of the total reads left after deduplication: 197774
21/11/2022 17:04:18 logger: ======>finish writing in 116.40s</code></pre>
                    </div>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Deduplication of scRNA-seq reads</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Data download</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">Mapping reads</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">Genome annotation</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-4">Count matrix generation</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-5">Output</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
