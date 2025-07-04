<div class="row p-2 pb-0">
    <div class="col-12">
        <div class="card mb-3 btn-reveal-trigger">
            <div class="card-header position-relative min-vh-25 mb-8">
                <div class="cover-image">
                    <div class="bg-holder rounded-3 rounded-bottom-0"
                        style="background-image:url(../../../../asset/img/generic/5.jpg);">
                    </div>
                    <!--/.bg-holder-->

                    <input class="d-none" id="upload-cover-image" type="file" />
                    <label class="cover-image-file-input" for="upload-cover-image"><span
                            class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
                </div>
                <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                    <div class="h-100 w-100 rounded-circle overflow-hidden position-relative"> <img
                            src="{{ asset('asset/img/team/avatar.png') }}" width="200" alt=""
                            data-dz-thumbnail="data-dz-thumbnail" />
                        <input class="d-none" id="profile-image" type="file" />
                        <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span
                                class="bg-holder overlay overlay-0"></span><span
                                class="z-index-1 text-white dark__text-white text-center fs--1"><span
                                    class="fas fa-camera"></span><span class="d-block">Update</span></span></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row g-0 p-2 pt-0 pb-0">
    <div class="col-lg-8 pe-lg-2">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3">
                    <div class="col-lg-12">
                        <label class="form-label" for="first-name">Nama User</label>
                        <input class="form-control" id="first-name" type="text" value="{{Auth::user()->name}}" />
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label" for="last-name">Username</label>
                        <input class="form-control" id="last-name" type="text" value="{{Auth::user()->email}}" />
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label" for="email1">Email</label>
                        <input class="form-control" id="email1" type="text" value="{{Auth::user()->email_}}" />
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Update </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-lg-4 ps-lg-2">
        <div class="sticky-sidebar">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Change Password</h5>
                </div>
                <div class="card-body bg-light">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="old-password">Old Password</label>
                            <input class="form-control" id="old-password" type="password" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="new-password">New Password</label>
                            <input class="form-control" id="new-password" type="password" />
                        </div>
                        <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
