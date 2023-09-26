@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Case Inbox</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javaScript:void();">Dashtreme</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javaScript:void();">Case</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Report
                        </li>
                    </ol>
                </div>

            </div>
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Left sidebar -->
                                <div class="col-lg-3 col-md-4">
                                    <a href="mail-compose.html" class="btn btn-danger btn-block">New Case</a>
                                    <div class="card mt-3 shadow-none">
                                        <div class="list-group shadow-none">
                                            <a href="javascript:void();" class="list-group-item active"><i
                                                    class="fa fa-inbox mr-2"></i>Case Baru
                                                <b>(12)</b></a>
                                            <a href="javascript:void();" class="list-group-item"><i
                                                    class="fa fa-star-o mr-2"></i>Case Proses</a>
                                            <a href="javascript:void();" class="list-group-item"><i
                                                    class="fa fa-file-text-o mr-2"></i>Case Selesai
                                                <b>(10)</b></a>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Left sidebar -->

                                <!-- Right Sidebar -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            {{-- <div class="btn-toolbar" role="toolbar">
                                                <div class="btn-group mr-1">
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light">
                                                        <i class="fa fa-inbox"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light">
                                                        <i class="fa fa-refresh"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </div>
                                                <div class="btn-group mr-1">
                                                    <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-folder"></i>
                                                        <b class="caret"></b>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="javaScript:void();" class="dropdown-item">Action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Another
                                                            action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Something else
                                                            here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javaScript:void();" class="dropdown-item">Separated
                                                            link</a>
                                                    </div>
                                                </div>
                                                <div class="btn-group mr-1">
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-tag"></i>
                                                        <b class="caret"></b>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="javaScript:void();" class="dropdown-item">Action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Another
                                                            action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Something else
                                                            here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javaScript:void();" class="dropdown-item">Separated
                                                            link</a>
                                                    </div>
                                                </div>

                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        More
                                                        <span class="caret"></span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="javaScript:void();" class="dropdown-item">Action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Another
                                                            action</a>
                                                        <a href="javaScript:void();" class="dropdown-item">Something else
                                                            here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javaScript:void();" class="dropdown-item">Separated
                                                            link</a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="position-relative has-icon-right">
                                                <input type="text" class="form-control" placeholder="search mail" />
                                                <div class="form-control-position">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End row -->

                                    <div class="card mt-3 shadow-none">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox1" type="checkbox"
                                                                        checked="checked" />
                                                                    <label for="checkbox1"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Google Inc</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-info mr-2"></i>Lorem ipsum
                                                                    dolor sit amet, consectetuer
                                                                    adipiscing</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">08:23 AM</td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox2" type="checkbox"
                                                                        checked="checked" />
                                                                    <label for="checkbox2"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star text-warning"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">John Deo</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-success mr-2"></i>Hi Bro,
                                                                    How are you?</a>
                                                            </td>
                                                            <td></td>
                                                            <td class="text-right">07:03 AM</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox3" type="checkbox" />
                                                                    <label for="checkbox3"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Director</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-blue mr-2"></i>Dolor sit
                                                                    amet, consectetuer
                                                                    adipiscing</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">03:00 AM</td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox4" type="checkbox"
                                                                        checked="checked" />
                                                                    <label for="checkbox4"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star text-warning"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Manager</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-warning mr-2"></i>Lorem
                                                                    ipsum dolor sit amet, consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">20 Jan</td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox5" type="checkbox" />
                                                                    <label for="checkbox5"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star text-warning"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Facebook</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Lorem ipsum dolor sit amet,
                                                                    consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td></td>
                                                            <td class="text-right">20 Jan</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox6" type="checkbox"
                                                                        checked="checked" />
                                                                    <label for="checkbox6"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star text-warning"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Facebook</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Lorem ipsum dolor sit amet,
                                                                    consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td></td>
                                                            <td class="text-right">20 Jan</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox7" type="checkbox" />
                                                                    <label for="checkbox7"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Twitter Inc</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-info mr-2"></i>Lorem ipsum
                                                                    dolor sit amet, consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">20 Jan</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox-7" type="checkbox" />
                                                                    <label for="checkbox-7"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">LinkedIn</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-rose mr-2"></i>Lorem ipsum
                                                                    dolor sit amet, consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">20 Jan</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox8" type="checkbox" />
                                                                    <label for="checkbox8"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Yahoo</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Lorem ipsum dolor sit amet,
                                                                    consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">20 Jan</td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox9" type="checkbox"
                                                                        checked="checked" />
                                                                    <label for="checkbox9"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Google</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-info mr-2"></i>Lorem ipsum
                                                                    dolor sit amet, consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">20 Jan</td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox10" type="checkbox" />
                                                                    <label for="checkbox10"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star text-warning"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">John Deo</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-success mr-2"></i>Hi
                                                                    brother, How are you?</a>
                                                            </td>
                                                            <td></td>
                                                            <td class="text-right">18 Jan</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox11" type="checkbox"
                                                                        checked="checked" />
                                                                    <label for="checkbox11"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Manager</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-primary mr-2"></i>Dolor
                                                                    sit amet, consectetuer
                                                                    adipiscing</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">18 Jan</td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox12" type="checkbox" />
                                                                    <label for="checkbox12"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star text-warning"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Manager</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-warning mr-2"></i>Lorem
                                                                    ipsum dolor sit amet, consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">10 Jan</td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox13" type="checkbox"
                                                                        checked="checked" />
                                                                    <label for="checkbox13"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star text-warning"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Facebook</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Lorem ipsum dolor sit amet,
                                                                    consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td></td>
                                                            <td class="text-right">15 Jan</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox14" type="checkbox" />
                                                                    <label for="checkbox14"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star text-warning"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Google Inc</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Lorem ipsum dolor sit amet,
                                                                    consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td></td>
                                                            <td class="text-right">04 March</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox15" type="checkbox"
                                                                        checked="checked" />
                                                                    <label for="checkbox15"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Twitter Inc</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-info mr-2"></i>Lorem ipsum
                                                                    dolor sit amet, consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">12 March</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox16" type="checkbox" />
                                                                    <label for="checkbox16"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Jhon Smith</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html"><i
                                                                        class="fa fa-circle text-rose mr-2"></i>Lorem ipsum
                                                                    dolor sit amet, consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">15 March</td>
                                                        </tr>

                                                        <tr class="table-active">
                                                            <td>
                                                                <div class="icheck-material-primary my-0">
                                                                    <input id="checkbox17" type="checkbox" />
                                                                    <label for="checkbox17"> </label>
                                                                </div>
                                                            </td>
                                                            <td class="mail-rateing">
                                                                <i class="fa fa-star"></i>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Google Inc</a>
                                                            </td>
                                                            <td>
                                                                <a href="mail-read.html">Lorem ipsum dolor sit amet,
                                                                    consectetuer
                                                                    adipiscing elit</a>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-paperclip"></i>
                                                            </td>
                                                            <td class="text-right">10 March</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <hr />

                                            <div class="row">
                                                <div class="col-7">Showing 1 - 25 of 300</div>
                                                <div class="col-5">
                                                    <div class="btn-group float-right">
                                                        <button type="button" class="btn btn-light waves-effect">
                                                            <i class="fa fa-chevron-left"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-light waves-effect">
                                                            <i class="fa fa-chevron-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card body -->
                                    </div>
                                    <!-- card -->
                                </div>
                                <!-- end Col-9 -->
                            </div>
                            <!-- End row -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->
    </div>
@endsection
