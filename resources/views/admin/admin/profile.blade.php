@extends('admin.layouts.master')
@push('links')

@endpush


@section('main')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
        </div>
    </div>
</div>
<!-- end page title -->




<div class="position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg profile-setting-img">
        <img src="{{asset(getAdmin('cover_photo')??'assets/images/profile-bg.jpg')}}" class="profile-wid-img" alt="">
        <div class="overlay-content">
            <div class="text-end p-3">
                <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                    {!! Form::open(['route'=>['admin.profile.cover.photo.update',Auth::guard('admin')->user()->id],'method'=>'put', 'files'=>true, 'id'=>'update_profile_cover_photo']) !!}
                    <input onchange="updateProfileCoverPhoto($(this))" id="profile-foreground-img-file-input" type="file" name="cover_photo" class="profile-foreground-img-file-input">
                     {!! Form::close() !!}
                    <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                        <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xxl-3">
        <div class="card mt-n5">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        <img src="{{asset(getAdmin('avatar')??'assets/images/users/avatar-1.jpg')}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            {!! Form::open(['route'=>['admin.profile.photo.update',Auth::guard('admin')->user()->id],'method'=>'put', 'files'=>true, 'id'=>'update_profile_photo']) !!}
                            <input onchange="updateProfilePhoto($(this))" id="profile-img-file-input" name="avatar" type="file" class="profile-img-file-input">
                            {!! Form::close() !!}
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                    <h5 class="fs-16 mb-1">{{getAdmin('name')}}</h5>
                    <p class="text-muted mb-0">{{getAdmin('role')}}</p>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personal_details" role="tab">
                            <i class="fas fa-home"></i> Personal Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#change_password" role="tab">
                            <i class="far fa-user"></i> Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#admin_setting" role="tab">
                            <i class="far fa-envelope"></i> Setting
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personal_details" role="tabpanel">
                        <form action="javascript:void(0);">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                        {!! Form::label('first_name', 'First Name') !!}
                                        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                                        <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                        {!! Form::label('last_name', 'Last Name') !!}
                                        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                                        <small class="text-danger">{{ $errors->first('last_name') }}</small>
                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::email('email', null, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'eg: foo@bar.com']) !!}
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                                        {!! Form::label('mobile_no', 'Mobile No.') !!}
                                        {!! Form::text('mobile_no', null, ['class' => 'form-control', 'placeholder' => 'Mobile No.']) !!}
                                        <small class="text-danger">{{ $errors->first('mobile_no') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                        {!! Form::label('gender', 'Gender') !!}
                                        {!! Form::select('gender', ['male'=>'Male', 'female'=>'Female'], null, ['id' => 'gender', 'class' => 'form-control', 'placeholder' => 'Gender']) !!}
                                        <small class="text-danger">{{ $errors->first('gender') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                              
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                        {!! Form::label('date_of_birth', 'Date Of Birth') !!}
                                        {!! Form::text('date_of_birth', null, ['class' => 'form-control', 'placeholder' => 'Date Of Birth']) !!}
                                        <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                        {!! Form::label('state', 'State') !!}
                                        {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'State']) !!}
                                        <small class="text-danger">{{ $errors->first('state') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                        {!! Form::label('city', 'City') !!}
                                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
                                        <small class="text-danger">{{ $errors->first('city') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                        {!! Form::label('zipcode', 'Zipcode') !!}
                                        {!! Form::text('zipcode', null, ['class' => 'form-control', 'placeholder' => 'Zipcode']) !!}
                                        <small class="text-danger">{{ $errors->first('zipcode') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        {!! Form::label('address', 'Address') !!}
                                        {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Address','rows'=>3]) !!}
                                        <small class="text-danger">{{ $errors->first('address') }}</small>
                                    </div>
                                    <div class="mb-3 pb-2">
                                        <label for="exampleFormControlTextarea" class="form-label">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea" placeholder="Enter your description" rows="3">Hi I'm Anna Adame,It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is European languages are members of the same family.</textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        {!! Form::button('Update Details', ['class' => 'btn btn-soft-secondary waves-effect waves-light','onClick'=>'updateDetails($(this))']) !!}
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="change_password" role="tabpanel">
                        {!! Form::open(['route'=>['admin.update-password',Auth::guard('admin')->user()->id],'method'=>'put', 'files'=>true, 'id'=>'change_password_form']) !!}
                            <div class="row g-2">
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                        {!! Form::label('current_password', 'Current Password') !!}
                                        {!! Form::password('current_password', ['class' => 'form-control', 'placeholder'=>'Current Password']) !!}
                                        <small class="text-danger">{{ $errors->first('current_password') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                        {!! Form::label('new_password', 'New Password') !!}
                                        {!! Form::password('new_password', ['class' => 'form-control', 'placeholder'=>'New Password']) !!}
                                        <small class="text-danger">{{ $errors->first('new_password') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                                        {!! Form::label('new_password_confirmation', 'Confirm Password') !!}
                                        {!! Form::password('new_password_confirmation', ['class' => 'form-control','placeholder'=>'Confirm Password']) !!}
                                        <small class="text-danger">{{ $errors->first('new_password_confirmation') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        {!! Form::button('Change Password', ['class' => 'btn btn-soft-secondary waves-effect waves-light','onClick'=>'changePassword($(this))']) !!}
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        {!! Form::close() !!}
                     
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="admin_setting" role="tabpanel">
                        <form>
                            <div id="newlink">
                                <div id="1">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="jobTitle" class="form-label">Job Title</label>
                                                <input type="text" class="form-control" id="jobTitle" placeholder="Job title" value="Lead Designer / Developer">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="companyName" class="form-label">Company Name</label>
                                                <input type="text" class="form-control" id="companyName" placeholder="Company name" value="Themesbrand">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="experienceYear" class="form-label">Experience Years</label>
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <select class="form-control" data-choices data-choices-search-false name="experienceYear" id="experienceYear">
                                                            <option value="">Select years</option>
                                                            <option value="Choice 1">2001</option>
                                                            <option value="Choice 2">2002</option>
                                                            <option value="Choice 3">2003</option>
                                                            <option value="Choice 4">2004</option>
                                                            <option value="Choice 5">2005</option>
                                                            <option value="Choice 6">2006</option>
                                                            <option value="Choice 7">2007</option>
                                                            <option value="Choice 8">2008</option>
                                                            <option value="Choice 9">2009</option>
                                                            <option value="Choice 10">2010</option>
                                                            <option value="Choice 11">2011</option>
                                                            <option value="Choice 12">2012</option>
                                                            <option value="Choice 13">2013</option>
                                                            <option value="Choice 14">2014</option>
                                                            <option value="Choice 15">2015</option>
                                                            <option value="Choice 16">2016</option>
                                                            <option value="Choice 17" selected>2017</option>
                                                            <option value="Choice 18">2018</option>
                                                            <option value="Choice 19">2019</option>
                                                            <option value="Choice 20">2020</option>
                                                            <option value="Choice 21">2021</option>
                                                            <option value="Choice 22">2022</option>
                                                        </select>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-auto align-self-center">
                                                        to
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-5">
                                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default2">
                                                            <option value="">Select years</option>
                                                            <option value="Choice 1">2001</option>
                                                            <option value="Choice 2">2002</option>
                                                            <option value="Choice 3">2003</option>
                                                            <option value="Choice 4">2004</option>
                                                            <option value="Choice 5">2005</option>
                                                            <option value="Choice 6">2006</option>
                                                            <option value="Choice 7">2007</option>
                                                            <option value="Choice 8">2008</option>
                                                            <option value="Choice 9">2009</option>
                                                            <option value="Choice 10">2010</option>
                                                            <option value="Choice 11">2011</option>
                                                            <option value="Choice 12">2012</option>
                                                            <option value="Choice 13">2013</option>
                                                            <option value="Choice 14">2014</option>
                                                            <option value="Choice 15">2015</option>
                                                            <option value="Choice 16">2016</option>
                                                            <option value="Choice 17">2017</option>
                                                            <option value="Choice 18">2018</option>
                                                            <option value="Choice 19">2019</option>
                                                            <option value="Choice 20" selected>2020</option>
                                                            <option value="Choice 21">2021</option>
                                                            <option value="Choice 22">2022</option>
                                                        </select>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="jobDescription" class="form-label">Job Description</label>
                                                <textarea class="form-control" id="jobDescription" rows="3" placeholder="Enter description">You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you're working with reputable font websites. </textarea>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="hstack gap-2 justify-content-end">
                                            <a class="btn btn-success" href="javascript:deleteEl(1)">Delete</a>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                            <div id="newForm" style="display: none;">

                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="javascript:new_link()" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                            <!--end col-->
                        </form>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

</div>





@endsection




@push('scripts')
<script type="text/javascript" src="{{asset('assets/js/pages/profile-setting.init.js')}}"></script>
<script type="text/javascript">
    
   

     function updateProfileCoverPhoto(element){
        var requestData,otpdata,data;
        formData = new FormData(document.querySelector('#update_profile_cover_photo'));

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:"{{ route('admin.profile.cover.photo.update',Auth::guard('admin')->user()->id) }}",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success:function(response){
                console.log(response);
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "success",

                }).showToast();
                //toastr.success(response.message); 
                document.querySelector('#update_profile_cover_photo').reset();
            },
            error:function(error){
                console.log(error);
                Toastify({
                    text: error.responseJSON.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "error",

                }).showToast();
                //toastr.error(error.responseJSON.message); 
                handleErrors(error.responseJSON);

            }
        });
    }



    function updateProfilePhoto(element){
        var requestData,otpdata,data;
        formData = new FormData(document.querySelector('#update_profile_photo'));

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:"{{ route('admin.profile.photo.update',Auth::guard('admin')->user()->id) }}",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success:function(response){
                console.log(response);
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "success",

                }).showToast();
                //toastr.success(response.message); 
                document.querySelector('#update_profile_photo').reset();
            },
            error:function(error){
                console.log(error);
                Toastify({
                    text: error.responseJSON.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "error",

                }).showToast();
                //toastr.error(error.responseJSON.message); 
                handleErrors(error.responseJSON);

            }
        });
    }


    function changePassword(element){
        var button = new Button(element);
        button.process();
        clearErrors();
        var requestData,otpdata,data;
        formData = new FormData(document.querySelector('#change_password_form'));

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:'{{ route('admin.update-password',Auth::guard('admin')->user()->id) }}',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success:function(response){
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "success",

                }).showToast();
                //toastr.success(response.message); 
                button.normal();
                document.querySelector('#change_password_form').reset();
            },
            error:function(error){
                Toastify({
                    text: error.responseJSON.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "error",

                }).showToast();
                //toastr.error(error.responseJSON.message); 
                button.normal();
                handleErrors(error.responseJSON);

            }
        });
    }
</script>
@endpush