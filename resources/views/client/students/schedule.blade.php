@extends('client.layouts.master')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Lịch Học Lái Xe Ô Tô</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Ngày học</th>
                    <th>Ca học</th>
                    <th>Địa điểm</th>
                    <th>Tên giảng viên</th>
                    <th>Ghi chú</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>08/12/2024</td>
                    <td>08:00-12:00</td>
                    <td>Sân tập lái ABC</td>
                    <td>Giảng viên: Anh Minh</td>
                    <td></td>
                    <td><a href="{{ route('client.students.edit_schedule') }}" class="btn btn-warning">Sửa lịch học</a></td>

                </tr>
                <tr>
                    <td>08/12/2024</td>
                    <td>12:00-16:00</td>
                    <td>Phòng học lý thuyết 202</td>
                    <td>Giảng viên: Minh Hoàng</td>
                    <td>Mang theo sách luật</td>
                    <td><a href="{{ route('client.students.edit_schedule') }}" class="btn btn-warning">Sửa lịch học</a></td>

                </tr>
                <tr>
                    <td>08/12/2024</td>
                    <td>16:00-20:00</td>
                    <td>Sân tập lái ABC</td>
                    <td>Giảng viên: Hoàng Anh</td>
                    <td>Đầy đủ giấy tờ đăng ký</td>
                    <td><a href="{{ route('client.students.edit_schedule') }}" class="btn btn-warning">Sửa lịch học</a></td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
