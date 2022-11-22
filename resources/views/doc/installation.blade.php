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
                        <h2 class="blog-post-title mb-1">Installation</h2>
                        <div class="alert alert-primary" role="alert">
                            mclUMI is required to run on Linux-like or Mac systems because of dependencies.
                        </div>
                    </div>

                    <ul>
                        <li>
                            <div id="item-1-1">
                                <h2>A stable version from PyPi</h2>
                                <pre><code class="language-python">pip install --upgrade mclumix</code></pre>
                            </div>
                        </li>
                        <li>
                            <div id="item-1-2">
                                <h2>The most recent release from Github</h2>
                                <pre><code class="language-python">git clone https://github.com/cribbslab/mclumi.git</code></pre>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Installation</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">From PyPi</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">From Github</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
