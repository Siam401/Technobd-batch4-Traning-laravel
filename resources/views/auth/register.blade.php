@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">picture</label>

                            <div class="col-md-6">
                                <input id="picture" type="file" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ old('picture') }}" required>

                                @if ($errors->has('picture'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>

                            <div class="col-md-6">
                                <textarea name="bio" id="bio" cols="30" rows="10" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}"></textarea>
                                @if ($errors->has('bio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="facebook_url" class="col-md-4 col-form-label text-md-right">Facebook Url</label>

                            <div class="col-md-6">
                                <input id="facebook_url" type="url" class="form-control{{ $errors->has('facebook_url') ? ' is-invalid' : '' }}" name="facebook_url" value="{{ old('facebook_url') }}" required>

                                @if ($errors->has('facebook_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facebook_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gitlab_url" class="col-md-4 col-form-label text-md-right">Gitlab Url</label>

                            <div class="col-md-6">
                                <input id="gitlab_url" type="url" class="form-control{{ $errors->has('gitlab_url') ? ' is-invalid' : '' }}" name="gitlab_url" value="{{ old('gitlab_url') }}" required>

                                @if ($errors->has('gitlab_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gitlab_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="twitter_url" class="col-md-4 col-form-label text-md-right">Twitter Url</label>

                            <div class="col-md-6">
                                <input id="twitter_url" type="url" class="form-control{{ $errors->has('twitter_url') ? ' is-invalid' : '' }}" name="gitlab_url" value="{{ old('gitlab_url') }}" required>

                                @if ($errors->has('twitter_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('twitter_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
