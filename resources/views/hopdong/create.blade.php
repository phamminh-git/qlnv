<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Thêm hợp đồng') }}</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{route('hopdong.save')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="ngayKy" class="col-md-4 col-form-label text-md-right">{{ __('Ngay Ky') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="ngayKy" type="date" class="form-control @error('ngayKy') is-invalid @enderror" name="ngayKy" value="{{ old('ngayKy') }}" required autocomplete="ngayKy" autofocus>
            
                                            @error('ngayKy')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ngayHetHan" class="col-md-4 col-form-label text-md-right">{{ __('Ngay Het Han') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="ngayHetHan" type="date" class="form-control @error('ngayHetHan') is-invalid @enderror" name="ngayHetHan" value="{{ old('ngayHetHan') }}" required autocomplete="ngayHetHan" autofocus>
            
                                            @error('ngayHetHan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ten" class="col-md-4 col-form-label text-md-right">{{ __('Ten nhan vien') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="ten" type="text" class="form-control @error('ten') is-invalid @enderror" name="ten" value="{{ old('ten') }}" required autocomplete="ten" autofocus>
            
                                            @error('ten')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gioiTinh" class="col-md-4 col-form-label text-md-right">{{ __('Gioi Tinh') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="gioiTinh" type="text" class="form-control @error('gioiTinh') is-invalid @enderror" name="gioiTinh" value="{{ old('gioiTinh') }}" required autocomplete="gioiTinh" autofocus>
            
                                            @error('gioiTinh')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ngaySinh" class="col-md-4 col-form-label text-md-right">{{ __('Ngay Sinh') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="ngaySinh" type="date" class="form-control @error('ngaySinh') is-invalid @enderror" name="ngaySinh" value="{{ old('ngaySinh') }}" required autocomplete="ngaySinh" autofocus>
            
                                            @error('ngaySinh')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="diaChi" class="col-md-4 col-form-label text-md-right">{{ __('Dia Chi') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="diaChi" type="text" class="form-control @error('diaChi') is-invalid @enderror" name="diaChi" value="{{ old('diaChi') }}" required autocomplete="diaChi" autofocus>
            
                                            @error('diaChi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="sdt" class="col-md-4 col-form-label text-md-right">{{ __('sdt') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="sdt" type="text" class="form-control @error('sdt') is-invalid @enderror" name="sdt" value="{{ old('sdt') }}" required autocomplete="sdt" autofocus>
            
                                            @error('sdt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="vaiTro" class="col-md-4 col-form-label text-md-right">{{ __('VaiTro') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="vaiTro" type="text" class="form-control @error('vaiTro') is-invalid @enderror" name="vaiTro" value="{{ old('vaiTro') }}" required autocomplete="vaiTro" autofocus>
            
                                            @error('vaiTro')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Nhap anh dai dien') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">
            
                                            @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
            
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="luong" class="col-md-4 col-form-label text-md-right">{{ __('luong') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="luong" type="number" class="form-control @error('luong') is-invalid @enderror" name="luong" value="{{ old('luong') }}" required autocomplete="luong">
            
                                            @error('luong')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phucap" class="col-md-4 col-form-label text-md-right">{{ __('phucap') }}</label>
            
                                        <div class="col-md-6">
                                            <table>
                                                @foreach ($phucaps as $phucap)
                                                    <tr>
                                                        <td>{{$phucap->ten}}</td>
                                                        <td><input type="checkbox"  name="phucap[]" id="" value="{{$phucap->id}}"></td>
                                                    </tr>
                                                @endforeach
                                            </table>
            
                                            @error('phucap')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Thêm') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
