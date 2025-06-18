@extends('layouts.register_master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('username') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">User Type</label>
                            <div class="col-md-6">
                                <select id="user_type" class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" name="user_type" required>
                                    <option value="">Select</option>
                                    @foreach($user_types as $type)
                                        <option value="{{ $type->title }}" {{ old('user_type') == $type->title ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_type'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('user_type') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}">
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('dob') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6">
                                <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                    <option value="">Select</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('gender') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone2" class="col-md-4 col-form-label text-md-right">Phone 2</label>
                            <div class="col-md-6">
                                <input id="phone2" type="text" class="form-control{{ $errors->has('phone2') ? ' is-invalid' : '' }}" name="phone2" value="{{ old('phone2') }}">
                                @if ($errors->has('phone2'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone2') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        {{-- Blood Group --}}
                        <div class="form-group row">
                            <label for="bg_id" class="col-md-4 col-form-label text-md-right">Blood Group</label>
                            <div class="col-md-6">
                                <select id="bg_id" class="form-control{{ $errors->has('bg_id') ? ' is-invalid' : '' }}" name="bg_id">
                                    <option value="">Select</option>
                                    @foreach($blood_groups as $bg)
                                        <option value="{{ $bg->id }}" {{ old('bg_id') == $bg->id ? 'selected' : '' }}>{{ $bg->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('bg_id'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('bg_id') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('address') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">Photo URL</label>
                            <div class="col-md-6">
                                <input id="photo" type="text" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo', 'http://localhost/global_assets/images/user.png') }}">
                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('photo') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
