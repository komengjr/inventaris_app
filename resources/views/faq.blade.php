@extends('layouts.app')
@section('content')
    <link href="{{ url('assets/plugins/vertical-timeline/css/vertical-timeline.css', []) }}" rel="stylesheet" />
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pl-2 pt-2 pb-2">
                <div class="col-sm-9">
                    {{-- <h4 class="page-title">Form SDM & Umum</h4> --}}
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Faq</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Frequently Asked Questions</li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 p-3">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-success nav-justified top-icon">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabe-17"><i
                                            class="zmdi zmdi-view-dashboard"></i> <span
                                            class="hidden-xs">Dashboard</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabe-18"><i class="zmdi zmdi-layers"></i>
                                        <span class="hidden-xs">Master Data</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabe-19"><i
                                            class="zmdi zmdi-view-dashboard"></i> <span class="hidden-xs">Comming
                                            Soon</span></a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void();"><i
                                            class="icon-settings"></i> <span class="hidden-xs">Setting</span></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-toggle="tab" href="#tabe-20">Link 1</a>
                                        <a class="dropdown-item" href="javascript:void();">Link 2</a>
                                        <a class="dropdown-item" href="javascript:void();">Link 3</a>
                                    </div>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="tabe-17" class="container tab-pane active p-1" style="text-align: justify;">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                        suffered alteration in some form, by injected humour, or randomised words which
                                        don't look
                                        even slightly believable.
                                        If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                        anything
                                        embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the
                                        Internet
                                        tend to repeat predefined chunks as necessary, making this the first true generator
                                        on the
                                        Internet
                                        There are many variations of passages of Lorem Ipsum available, but the majority
                                        have
                                        suffered alteration in some form, by injected humour, or randomised words which
                                        don't look
                                        even slightly believable.
                                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                        anything
                                        embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the
                                        Internet
                                        tend to repeat predefined chunks as necessary, making this the first true generator
                                        on the
                                        Internet</p>
                                </div>
                                <div id="tabe-18" class="container tab-pane fade">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <section class="cd-timeline js-cd-timeline">
                                                <div class="cd-timeline__container">
                                                    <div class="cd-timeline__block js-cd-block">
                                                        <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                                                            <img src="assets/images/timeline/cd-icon-picture.svg"
                                                                alt="Picture" />
                                                        </div>
                                                        <!-- cd-timeline__img -->

                                                        <div class="cd-timeline__content js-cd-content">
                                                            <h4>Title of section 1</h4>
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit. Iusto, optio, dolorum provident rerum aut hic
                                                                quasi placeat iure tempora laudantium ipsa ad debitis
                                                                unde? Iste voluptatibus minus veritatis qui ut.
                                                            </p>
                                                            <a href="javascript:void();" class="cd-timeline__read-more">Read
                                                                more</a>
                                                            <span class="cd-timeline__date">Jan 14</span>
                                                        </div>
                                                        <!-- cd-timeline__content -->
                                                    </div>
                                                    <!-- cd-timeline__block -->

                                                    <div class="cd-timeline__block js-cd-block">
                                                        <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                                                            <img src="assets/images/timeline/cd-icon-movie.svg"
                                                                alt="Movie" />
                                                        </div>
                                                        <!-- cd-timeline__img -->

                                                        <div class="cd-timeline__content js-cd-content">
                                                            <h4>Title of section 2</h4>
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit. Iusto, optio, dolorum provident rerum aut hic
                                                                quasi placeat iure tempora laudantium ipsa ad debitis
                                                                unde?
                                                            </p>
                                                            <a href="javascript:void();" class="cd-timeline__read-more">Read
                                                                more</a>
                                                            <span class="cd-timeline__date">Jan 18</span>
                                                        </div>
                                                        <!-- cd-timeline__content -->
                                                    </div>
                                                    <!-- cd-timeline__block -->

                                                    <div class="cd-timeline__block js-cd-block">
                                                        <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                                                            <img src="assets/images/timeline/cd-icon-picture.svg"
                                                                alt="Picture" />
                                                        </div>
                                                        <!-- cd-timeline__img -->

                                                        <div class="cd-timeline__content js-cd-content">
                                                            <h4>Title of section 3</h4>
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit. Excepturi, obcaecati, quisquam id molestias eaque
                                                                asperiores voluptatibus cupiditate error assumenda
                                                                delectus odit similique earum voluptatem doloremque
                                                                dolorem ipsam quae rerum quis. Odit, itaque, deserunt
                                                                corporis vero ipsum nisi eius odio natus ullam provident
                                                                pariatur temporibus quia eos repellat consequuntur
                                                                perferendis enim amet quae quasi repudiandae sed quod
                                                                veniam dolore possimus rem voluptatum eveniet eligendi
                                                                quis fugiat aliquam sunt similique aut adipisci.
                                                            </p>
                                                            <a href="javascript:void();" class="cd-timeline__read-more">Read
                                                                more</a>
                                                            <span class="cd-timeline__date">Jan 24</span>
                                                        </div>
                                                        <!-- cd-timeline__content -->
                                                    </div>
                                                    <!-- cd-timeline__block -->

                                                    <div class="cd-timeline__block js-cd-block">
                                                        <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                                                            <img src="assets/images/timeline/cd-icon-location.svg"
                                                                alt="Location" />
                                                        </div>
                                                        <!-- cd-timeline__img -->

                                                        <div class="cd-timeline__content js-cd-content">
                                                            <h4>Title of section 4</h4>
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit. Iusto, optio, dolorum provident rerum aut hic
                                                                quasi placeat iure tempora laudantium ipsa ad debitis
                                                                unde? Iste voluptatibus minus veritatis qui ut.
                                                            </p>
                                                            <a href="javascript:void();" class="cd-timeline__read-more">Read
                                                                more</a>
                                                            <span class="cd-timeline__date">Feb 14</span>
                                                        </div>
                                                        <!-- cd-timeline__content -->
                                                    </div>
                                                    <!-- cd-timeline__block -->

                                                    <div class="cd-timeline__block js-cd-block">
                                                        <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                                                            <img src="assets/images/timeline/cd-icon-location.svg"
                                                                alt="Location" />
                                                        </div>
                                                        <!-- cd-timeline__img -->

                                                        <div class="cd-timeline__content js-cd-content">
                                                            <h4>Title of section 5</h4>
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                elit. Iusto, optio, dolorum provident rerum.
                                                            </p>
                                                            <a href="javascript:void();" class="cd-timeline__read-more">Read
                                                                more</a>
                                                            <span class="cd-timeline__date">Feb 18</span>
                                                        </div>
                                                        <!-- cd-timeline__content -->
                                                    </div>
                                                    <!-- cd-timeline__block -->

                                                    <div class="cd-timeline__block js-cd-block">
                                                        <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                                                            <img src="assets/images/timeline/cd-icon-movie.svg"
                                                                alt="Movie" />
                                                        </div>
                                                        <!-- cd-timeline__img -->

                                                        <div class="cd-timeline__content js-cd-content">
                                                            <h4>Final Section</h4>
                                                            <p>This is the content of the last section</p>
                                                            <span class="cd-timeline__date">Feb 26</span>
                                                        </div>
                                                        <!-- cd-timeline__content -->
                                                    </div>
                                                    <!-- cd-timeline__block -->
                                                </div>
                                            </section>
                                            <!-- cd-timeline -->
                                        </div>
                                    </div>
                                </div>
                                <div id="tabe-19" class="container tab-pane fade">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                        reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                        reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                                <div id="tabe-20" class="container tab-pane fade">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                        quisquam
                                        est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                        non
                                        numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                        voluptatem.
                                    </p>
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                        quisquam
                                        est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                        non
                                        numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                        voluptatem.
                                    </p>
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                        quisquam
                                        est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                                        non
                                        numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                        voluptatem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('assets/plugins/vertical-timeline/js/vertical-timeline.js', []) }}"></script>
@endsection
