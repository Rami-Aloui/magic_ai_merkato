@extends('panel.layout.app')

@section('title', __('User Management'))

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 items-center justify-content-between">
                <div class="col">
                    <a href="{{ LaravelLocalization::localizeUrl(route('dashboard.admin.users.index')) }}"
                       class="page-pretitle flex items-center">
                        <svg class="!me-2 rtl:-scale-x-100" width="8" height="10" viewBox="0 0 6 10" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M4.45536 9.45539C4.52679 9.45539 4.60714 9.41968 4.66071 9.36611L5.10714 8.91968C5.16071 8.86611 5.19643 8.78575 5.19643 8.71432C5.19643 8.64289 5.16071 8.56254 5.10714 8.50896L1.59821 5.00004L5.10714 1.49111C5.16071 1.43753 5.19643 1.35718 5.19643 1.28575C5.19643 1.20539 5.16071 1.13396 5.10714 1.08039L4.66071 0.633963C4.60714 0.580392 4.52679 0.544678 4.45536 0.544678C4.38393 0.544678 4.30357 0.580392 4.25 0.633963L0.0892856 4.79468C0.0357141 4.84825 0 4.92861 0 5.00004C0 5.07146 0.0357141 5.15182 0.0892856 5.20539L4.25 9.36611C4.30357 9.41968 4.38393 9.45539 4.45536 9.45539Z" />
                        </svg>
                        {{ __('Back to User Management') }}
                    </a>
                    <h2 class="page-title mb-2">
                        {{ __('Create New User') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <form @if($app_is_demo)  @else action="{{route('dashboard.admin.users.store')}}"
                          @endif method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('Name')}}</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{old('name')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('Surname')}}</label>
                                            <input type="text" class="form-control" id="surname" name="surname"
                                                   value="{{old('surname')}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('Phone')}}</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                   data-mask="+0000000000000" data-mask-visible="true"
                                                   placeholder="+000000000000" autocomplete="off"
                                                   value="{{old('phone')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('Email')}}</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   value="{{old('email')}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{__('Avatar')}}</label>
                                    <input type="file" class="form-control" name="avatar" id="avatar">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                {{ __('Password') }}
                                            </label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password"
                                                       name="password"
                                                       placeholder="{{ __('Your password') }}"
                                                       value="{{old('password')}}" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                {{ __('Re-Password') }}
                                            </label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="repassword"
                                                       name="repassword"
                                                       placeholder="{{ __('Repeat password') }}"
                                                       value="{{old('repassword')}}" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{__('Country')}}</label>
                                    <select type="text" class="form-select" name="country" id="country">
                                        @include('panel.admin.users.countries')
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-label">{{__('Type')}}</div>
                                            <select class="form-select" id="type" name="type">
                                                <option value="user">{{__('User')}}</option>
                                                <option value="admin">{{__('Admin')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-label">{{__('Status')}}</div>
                                            <select class="form-select" id="status" name="status">
                                                <option value="1">{{__('Active')}}</option>
                                                <option value="0">{{__('Passive')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('Remaining Words')}}</label>
                                            <input type="number" name="remaining_words" id="remaining_words"
                                                   class="form-control" value="{{old('remaining_words')}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{__('Remaining Images')}}</label>
                                            <input type="number" name="remaining_images" id="remaining_images"
                                                   class="form-control" value="{{old('remaining_images')}}" />
                                        </div>
                                    </div>
                                </div>
                                <button @if($app_is_demo) type="button" @else type="submit"
                                        @endif class="btn btn-primary w-100">
                                    {{__('Save')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
