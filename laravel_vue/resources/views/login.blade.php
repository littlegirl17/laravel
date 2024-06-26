@extends('layout.layout')
@Section('title', 'Đăng nhập')
@Section('content')


    <div class="section">
        <div class="container mt-5">
            <div class="formMauAlert">
                {{-- hiển thị các thông báo lỗi validation nếu có bất kỳ lỗi nào --}}
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger py-2">{{ $error }}</div>
                    @endforeach
                @endif

                @if (session('danger'))
                    <div class="alert alert-danger py-2">{{ session('danger') }}</div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success py-2">{{ session('success') }}</div>
                @endif
            </div>
            <div class="formUser py-5">
                <form action="/login" method="post" class="formMau ">
                    @csrf
                    <h2 class="text-center">ĐĂNG NHẬP</h2>
                    <div class="inputGroup my-3">
                        <input required type="text" name="name" class="inputLogin">
                        <label class="user-label">Username</label>
                    </div>
                    <div class="inputGroup my-3">
                        <input required type="password" name="password" class="inputLogin">
                        <label class="user-label">Password</label>
                    </div>
                    <button class="btnFormUser" onclick="sweetAlertLogin()">Đăng nhập</button>
                </form>

                <div class="loginOr">
                    <p>Hoặc</p>
                </div>
                <div class="loginUser_a">
                    <a href="{{ route('forgetPassword') }}" class="text-decoration-none text-body-tertiary">Quên mật
                        khẩu</a>
                    <a href="{{ route('register') }}" class="mt-2 text-decoration-none text-body-tertiary">Bạn mới
                        biết đến
                        SeaFood?
                        <strong style="color: #31629e"> Đăng
                            ký</strong></a>
                </div>

            </div>
        </div>
    </div>

@endsection
