@extends('client.layouts.master')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Sửa Lịch Học</h2>
        <form class="p-4 border rounded shadow-sm bg-light">
            <!-- Ngày học -->
            <div class="mb-3">
                <label for="date" class="form-label">Ngày học</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <!-- Ca học -->
            <div class="mb-3">
                <label for="time-slot" class="form-label">Ca học</label>
                <select class="form-select" id="time-slot" name="time-slot" required>
                    <option value="" disabled selected>Chọn ca học</option>
                    <option value="morning">Sáng (7:00 - 11:00)</option>
                    <option value="afternoon">Chiều (13:00 - 17:00)</option>
                    <option value="evening">Tối (18:00 - 21:00)</option>
                </select>
            </div>

            <!-- Loại bằng -->
            <div class="mb-3">
                <label for="license-type" class="form-label">Loại bằng</label>
                <select class="form-select" id="license-type" name="license-type" required>
                    <option value="" disabled selected>Chọn loại bằng</option>
                    <option value="B1">Bằng B1</option>
                    <option value="B2">Bằng B2</option>
                    <option value="C">Bằng C</option>
                </select>
            </div>

            <!-- Nút lưu -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Lưu thay đổi</button>
                <a href="#" class="btn btn-secondary px-4">Hủy</a>
            </div>
        </form>
    </div>
@endsection
