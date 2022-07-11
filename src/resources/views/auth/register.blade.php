<!-- /*******************************************************************
***  File Name		: resister.blade.php
***  Version		: V1.5
***  Designer		: 佐藤　駿介
***  Date			: 2022.07.03
***  Purpose       	: アカウント登録画面のレイアウト
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 佐藤　駿介, 2022.06.18
*** V1.5 : 佐藤　駿介, 2022.07.03　日本語対応
*/ -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< HEAD
<<<<<<< HEAD
                <div class="card-header">{{ __('新規登録') }}</div>
=======
                <div class="card-header">{{ __('form.register.wd') }}</div>
>>>>>>> a936ae945ee919d91354b16747614053170e6497
=======
                <div class="card-header">{{ __('form.register.wd') }}</div>
>>>>>>> 968bb2efd3d661241a5e69acae1ba8d0e28261b9

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
<<<<<<< HEAD
<<<<<<< HEAD
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ユーザ名') }}</label>
=======
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('form.register.name') }}</label>
>>>>>>> a936ae945ee919d91354b16747614053170e6497
=======
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('form.register.name') }}</label>
>>>>>>> 968bb2efd3d661241a5e69acae1ba8d0e28261b9

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
<<<<<<< HEAD
<<<<<<< HEAD
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
=======
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('form.register.mail') }}</label>
>>>>>>> a936ae945ee919d91354b16747614053170e6497
=======
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('form.register.mail') }}</label>
>>>>>>> 968bb2efd3d661241a5e69acae1ba8d0e28261b9

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
<<<<<<< HEAD
<<<<<<< HEAD
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>
=======
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('form.register.pass') }}</label>
>>>>>>> a936ae945ee919d91354b16747614053170e6497
=======
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('form.register.pass') }}</label>
>>>>>>> 968bb2efd3d661241a5e69acae1ba8d0e28261b9

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
<<<<<<< HEAD
<<<<<<< HEAD
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('確認用パスワード') }}</label>
=======
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('form.register.pass2') }}</label>
>>>>>>> a936ae945ee919d91354b16747614053170e6497
=======
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('form.register.pass2') }}</label>
>>>>>>> 968bb2efd3d661241a5e69acae1ba8d0e28261b9

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
<<<<<<< HEAD
<<<<<<< HEAD
                                    {{ __('登録') }}
=======
                                    {{ __('form.register.btn') }}
>>>>>>> a936ae945ee919d91354b16747614053170e6497
=======
                                    {{ __('form.register.btn') }}
>>>>>>> 968bb2efd3d661241a5e69acae1ba8d0e28261b9
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
