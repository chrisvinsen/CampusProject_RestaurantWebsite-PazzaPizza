@extends('cms.layouts.base')

@section('custom_css')
<!-- Nice Select -->
<link rel="stylesheet" href="{{ asset('plugins/nice-select/nice-select.css') }}">
<!-- Nouislider -->
<link rel="stylesheet" href="{{ asset('plugins/nouislider/nouislider.min.css') }}">
<!-- Bootstrap Select -->
<link rel="stylesheet" href="{{ asset('css/cms/bootstrap-select.min.css') }}">
<!-- Dropify -->
<link rel="stylesheet" href="{{ asset('css/cms/dropify.min.css') }}">
<!-- Sweetalert -->
<link rel="stylesheet" href="{{ asset('css/cms/sweetalert.css') }}">
@endsection

@section('content')
<!-- All Content -->
<!--================ Profile Information Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <h3 class="text-center">Profile Information</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <img class="rounded-circle mx-auto d-block" src="{{ $profile->photo_profile }}" onerror="if (this.src != '{{ asset('/images/cms/default_avatar.jpg') }}') this.src = '{{ asset('/images/cms/default_avatar.jpg') }}';" style="width: 300px; height: 300px; object-fit: cover; display: block;">
                </div>
            </div>
            <div class="col-md-6 p-5">
                <div class="col-md-12 form-group">
                    <span>Full Name</span>
                    <h5>{{ $profile->firstname }} {{ $profile->lastname }}</h5>
                </div>
                <div class="col-md-12 form-group">
                    <span>Email</span>
                    <h5>{{ $profile->email }}</h5>
                </div>
                <div class="col-md-12 form-group">
                    <span>Gender</span>
                    <h5>{{ $profile->gender }}</h5>
                </div>
                <div class="col-md-12 form-group">
                    <span>Birth Date</span>
                    <h5>{{ $profile->birthdate }}</h5>
                </div>
            </div>
        </div>
        <div class="pb-4">
            <button type="button" class="btn btn-outline-secondary px-4 float-right" onclick="showEditProfile({{ $profile->id }})">Edit Profile</button>
            <button type="button" class="btn btn-outline-danger px-4 float-right mx-3" onclick="showEditPassword({{ $profile->id }})">Change Password</button>
        </div>
    </div>
</section>
<!--================ End Profile Information Area =================-->
<!--================ Modal Edit Profle Area =================-->
<div id="editProfile" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; z-index: 10000;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form id="form-profile" method="POST">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="modal-title"><b id="profile-title">Edit Profile Information</b></h4>
                                <span class="d-none" id="profile-id"></span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group m-0">
                                            <label class="control-label">First Name<span class="text-danger">*</span></label>
                                            <input type="text" maxlength="100" class="form-control" name="firstname" id="firstname-id" placeholder="First Name">
                                            <small class="ml-1 text-danger" id="firstname_err"></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group m-0">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" maxlength="100" class="form-control" name="lastname" id="lastname-id" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-0">
                                    <label class="control-label">Email<span class="text-danger">*</span></label>
                                    <input type="email" maxlength="100" class="form-control" name="email" id="email-id" placeholder="Email">
                                    <small class="ml-1 text-danger" id="email_err"></small>
                                </div>
                                <div class="form-group m-0">
                                    <label class="control-label">Birth Date<span class="text-danger">*</span></label>
                                    <input type="text" id="birthdate-id" class="form-control" placeholder="Birth Date" onfocus="(this.type='date')">
                                    <small class="ml-1 text-danger" id="birthdate_err"></small>
                                </div>
                                <div class="form-group m-0">
                                    <label class="control-label d-block">Gender<span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="gender_male" name="gender" value="Male">
                                        <label class="custom-control-label" for="gender_male">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="gender_female" name="gender" value="Female">
                                        <label class="custom-control-label" for="gender_female">Female</label>
                                    </div>
                                    <small class="ml-1 text-danger" id="gender_err"></small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label class="control-label">Image</label>
                                    <input type="file" id="image-id" name="image" class="dropify" data-max-file-size="2M"/> 
                                    <small class="ml-1 text-danger" id="image_err"></small>
                                </div>
                            </div>
                        </div>
                        <hr class="m-t-0">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6 py-1">
                                        <button type="button" class="btn btn-rounded btn-default btn-block waves-effect" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-md-6 col-xs-6 py-1">
                                        <button type="submit" class="btn btn-rounded btn-bms btn-block waves-effect waves-light" id="submit-profile">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="loader"></div>
            </div>
        </div>
    </div>
</div>
<!--================ End Modal Edit Profle Area =================-->
<!-- Modal Change Password Area -->
<div id="editPassword" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; z-index: 10000;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form id="form-password" method="POST">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="modal-title"><b id="password-title">Change Password</b></h4>
                                <span class="d-none" id="profile-id"></span>
                            </div>
                        </div>
                        <br>
                        <div class="row change-password">
                            <div class="col-12">
                                <label class="control-label">Old Password<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" maxlength="100" class="form-control" name="oldpassword" id="oldpassword-id" placeholder="Old Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text" onclick="showOldPassword()">
                                                <i class="fa fa-eye show-password"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="ml-1 text-danger d-block" id="oldpassword_err"></small>
                                </div>
                                <label class="control-label">New Password<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" maxlength="100" class="form-control" name="newpassword" id="newpassword-id" placeholder="New Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fa fa-eye show-password" onclick="showNewPassword()"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="ml-1 text-danger d-block" id="newpassword_err"></small>
                                </div>
                                <label class="control-label">Confirm New Password<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" maxlength="100" class="form-control" name="cnewpassword" id="cnewpassword-id" placeholder="Confirm New Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fa fa-eye show-password" onclick="showCNewPassword()"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="ml-1 text-danger d-block" id="cnewpassword_err"></small>
                                </div>
                            </div>
                        </div>
                        <hr class="m-t-0">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6 py-1">
                                        <button type="button" class="btn btn-rounded btn-default btn-block waves-effect" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-md-6 col-xs-6 py-1">
                                        <button type="submit" class="btn btn-rounded btn-bms btn-block waves-effect waves-light" id="submit-password">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="loader"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Change Password Area -->
<!-- End of all content -->
@endsection

@section('custom_js')
<!-- Bootstrap Select -->
<script src="{{ asset('js/cms/bootstrap-select.min.js') }}"></script>
<!-- Dropify -->
<script src="{{ asset('js/cms/dropify.min.js') }}"></script>
<!-- Sweetalert -->
<script src="{{ asset('js/cms/sweetalert.min.js') }}"></script>
<!-- Custom JS -->
<script>
    function showPassword() {
        if ($("#password").attr('type') == "password") {
            $("#password").attr('type', "text")
        } else {
            $("#password").attr('type', "password")
        }
    }
    function showCPassword() {
        if ($("#confirmPassword").attr('type') == "password") {
            $("#confirmPassword").attr('type', "text")
        } else {
            $("#confirmPassword").attr('type', "password")
        }
    }
    $(function(){
        $('.dropify').dropify({
            error: {
                'fileSize': 'The file size is too big (2M max).',
            }
        });
        $("#firstname-id").on('keyup', function(){
            $("#firstname_err").text("");
        });
        $("#email-id").on('keyup', function(){
            $("#email_err").text("");
        });
        $("#birthdate-id").on('keyup', function(){
            $("#birthdate_err").text("");
        });
        $("#oldpassword-id").on('keyup', function(){
            $("#oldpassword_err").text("");
        });
        $("#newpassword-id").on('keyup', function(){
            $("#newpassword_err").text("");
        });
        $("#cnewpassword-id").on('keyup', function(){
            $("#cnewpassword_err").text("");
        });
    })

    function showEditProfile(idx) {
        $('#editProfile').modal('show');
        $("#profile-id").text(idx);

        $("#firstname_err").text("");
        $("#email_err").text("");
        $("#birthdate_err").text("");
        $("#gender_err").text("");
        $("#image_err").text("");

        setupDataByID(idx);
    }

    function showEditPassword(idx) {
        $('#editPassword').modal('show');
        $("#profile-id").text(idx);

        $("#oldpassword-id").val("");
        $("#newpassword-id").val("");
        $("#cnewpassword-id").val("");

        $("#oldpassword_err").text("");
        $("#newpassword_err").text("");
        $("#cnewpassword_err").text("");
    }

    function setupDataByID(idx) {
        var url = "{{ route('account.profile.edit', ['modelUser' => "id"]) }}";
        url = url.replace('id', idx);
        $.get(url, function( data ) {
            $('#firstname-id').val(data.firstname);
            $('#lastname-id').val(data.lastname);
            $('#email-id').val(data.email);
            $('#birthdate-id').val(data.birthdate);

            if(data.gender.toLowerCase() == "male"){
                $("#gender_male").prop("checked", true);
            }else if(data.gender.toLowerCase() == "female"){
                $("#gender_female").prop("checked", true);
            }

            var base_url = window.location.origin;
            if(data.photo_profile){
                var drEvent = $('#image-id').dropify({
                    defaultFile: base_url + data.photo_profile
                });
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = base_url + data.photo_profile;
            }else{
                var drEvent = $('#image-id').dropify({
                    defaultFile: base_url + "/images/cms/default_avatar.jpg"
                });
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = base_url + "/images/cms/default_avatar.jpg";
            }
            drEvent.destroy();
            drEvent.init();
        });
    }

    function clearFormPassword() {
        $("#oldpassword-id").val("");
        $("#newpassword-id").val("");
        $("#cnewpassword-id").val("");

        $("#oldpassword_err").text("");
        $("#newpassword_err").text("");
        $("#cnewpassword_err").text("");
    }

    $('#form-profile').submit(function(event) {
        event.preventDefault();

        data = new FormData();
        var idx = $("#profile-id").text();
        var url = "{{ route('account.profile.update', ['modelUser' => "id"]) }}";
        url = url.replace('id', idx);

        data.append('firstname', $('#firstname-id').val());
        data.append('lastname', $('#lastname-id').val());
        data.append('email', $('#email-id').val());
        data.append('birthdate', $('#birthdate-id').val());
        data.append('gender',  $("input[name='gender']:checked").val());
        if ($('#image-id')[0].files[0] != null && $('#image-id')[0].files[0] != 'undefined') {
            data.append('image', $('#image-id')[0].files[0]);
        }

        var error = false; 

        if(!data.get('firstname')){
            $("#firstname_err").text("First name field must be filled");
            error = true;
        } 
        if(!data.get('email')){
            $("#email_err").text("Email field must be filled");
            error = true;
        } 
        if(!data.get('birthdate')){
            $("#birthdate_err").text("Birthdate field must be filled");
            error = true;
        } 
        if(!data.get('gender')){
            $("#gender_err").text("Please choose the gender");
            error = true;
        } 

        if(!error){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            ajaxRequest = $.ajax({
                url: url,
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        $('#editProfile').modal('hide');
                        
                        swal({title : "Success!", text: "Profile has been Updated.", type: "success"}, function() {
                            window.location.reload(true);
                        }); 
                    }
                },
                error: function(request, status, error) {
                    if (request.statusText == 'abort') {
                        return;
                    }
                    alert(request.responseJSON.messages);
                }
            });
        }else{
            console.log("Cannot update Profile. Please fill up all the form");
        }
    });

    $('#form-password').submit(function(event) {
        event.preventDefault();

        data = new FormData();
        var idx = $("#profile-id").text();
        var url = "{{ route('account.profile.update', ['modelUser' => "id"]) }}";
        url = url.replace('id', idx);

        data.append('oldpassword', $('#oldpassword-id').val());
        data.append('newpassword', $('#newpassword-id').val());
        data.append('cnewpassword', $('#cnewpassword-id').val());

        var error = false; 

        if(!data.get('oldpassword')){
            $("#oldpassword_err").text("Old Password field must be filled");
            error = true;
        } 
        if(!data.get('newpassword')){
            $("#newpassword_err").text("New Password field must be filled");
            error = true;
        } 
        if(!data.get('cnewpassword')){
            $("#cnewpassword_err").text("Confirm New Password field must be filled");
            error = true;
        }else if(data.get('newpassword') != data.get('cnewpassword')){
            $("#cnewpassword_err").text("Password doesn't match");
            error = true;
        }

        if(!error){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            ajaxRequest = $.ajax({
                url: url,
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        $('#editPassword').modal('hide');
                        
                        swal({title : "Success!", text: "Password has been Updated.", type: "success"}, function() {
                            window.location.reload(true);
                        }); 
                    }
                },
                error: function(request, status, error) {
                    if (request.statusText == 'abort') {
                        return;
                    }
                    $("#oldpassword_err").text(request.responseJSON.messages);
                }
            });
        }else{
            console.log("Cannot update Password. Please fill up all the form");
        }
    });
</script>
@endsection