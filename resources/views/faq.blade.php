@extends('layouts.app')
@section('content')
   
    <div class="row">
       
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-success nav-justified top-icon">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabe-17"><i class="zmdi zmdi-view-dashboard"></i> <span
                                    class="hidden-xs">Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabe-18"><i class="zmdi zmdi-layers"></i> <span
                                    class="hidden-xs">Master Data</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabe-19"><i class="icon-spinner"></i> <span
                                    class="hidden-xs">Comming Soon</span></a>
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
                                suffered alteration in some form, by injected humour, or randomised words which don't look
                                even slightly believable.
                            If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                                embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the Internet
                                tend to repeat predefined chunks as necessary, making this the first true generator on the
                                Internet
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't look
                                even slightly believable.
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                                embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the Internet
                                tend to repeat predefined chunks as necessary, making this the first true generator on the
                                Internet</p>
                        </div>
                        <div id="tabe-18" class="container tab-pane fade">
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.</p>
                            <p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence
                                structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is
                                therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.</p>
                            <p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence
                                structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is
                                therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                        </div>
                        <div id="tabe-19" class="container tab-pane fade">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div id="tabe-20" class="container tab-pane fade">
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
                                est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                            </p>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
                                est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                            </p>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
                                est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
