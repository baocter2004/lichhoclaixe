@extends('client.layouts.master')

@section('content')
<div class="container-fluid py-3 img-background">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Form Card -->
            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Đăng Ký Học Lái Xe Ô Tô</h3>
                </div>
                <div class="card-body">
                    <form action="/submit_registration" method="post">
                        <!-- Họ và tên -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên" required>
                        </div>

                        <!-- Số điện thoại -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                        </div>

                        <!-- Địa chỉ -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" required>
                        </div>

                        <!-- Ngày sinh -->
                        <div class="mb-3">
                            <label for="dob" class="form-label">Ngày muốn đăng kí tập</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>

                        <!-- Hạng bằng lái -->
                        <div class="mb-3">
                            <label for="licenseType" class="form-label">Hạng bằng lái</label>
                            <select class="form-select" id="licenseType" name="licenseType" required>
                                <option value="" disabled selected>Chọn hạng bằng</option>
                                <option value="B1">B1</option>
                                <option value="B2">B2</option>
                                <option value="C">C</option>
                            </select>
                        </div>

                        <!-- Ghi chú -->
                        <div class="mb-3">
                            <label for="notes" class="form-label">Ghi chú</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Nhập ghi chú (nếu có)"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Form Card -->
        </div>
    </div>
</div>
@endsection
