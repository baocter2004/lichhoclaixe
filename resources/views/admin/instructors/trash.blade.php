@extends('admin.layouts.master')

@section('title')
    List Instructors Trash
@endsection

@section('content')
    @if ($instructors->isEmpty())
        <div class="text-center mt-3 mb-2">
            <h2>Danh Sách Trống</h2>
        </div>
    @else
        <div class="table-responsive-xxl">
            <table class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-light">
                    <caption>
                        Danh Sách Giảng Viên
                    </caption>
                    <tr>
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Hình Ảnh</th>
                        <th>Email</th>
                        <th>Số Giấy Phép</th>
                        <th>Chuyên Môn</th>
                        <th>Kinh Nghiệm</th>
                        <th>Tình Trạng</th>
                        <th>Vai Trò</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($instructors as $instructor)
                        <tr class="table-primary">
                            <td scope="row">{{ $instructor->id }}</td>
                            <td scope="row">
                                {{ $instructor->user->last_name . ' ' . $instructor->user->first_name }}
                            </td>
                            <td scope="row">
                                <img src="{{ Storage::url($instructor->user->user_image) }}" width="50px"
                                    class="img-fluid rounded-top" alt="" />
                            </td>
                            <td scope="row">{{ $instructor->user->email }}</td>
                            <td scope="row">{{ $instructor->license_number }}</td>
                            <td scope="row">
                                @if ($instructor->specialzations && $instructor->specialzations->isNotEmpty())
                                    @foreach ($instructor->specialzations as $key => $specialzation)
                                        {{ $specialzation->specialzation_name }}
                                    @endforeach
                                @else
                                    <p>Chưa Có Chuyên Môn</p>
                                @endif
                            </td>

                            <td scope="row">{{ $instructor->experience_years }} năm</td>
                            <td scope="row">
                                @if ($instructor->user->is_active === 1)
                                    <span class="badge badge-info">Hoạt Động</span>
                                @else
                                    <span class="badge badge-danger">Không Hoạt Động</span>
                                @endif
                            </td>
                            <td scope="row">{{ $instructor->user->role }}</td>
                            <td scope="row">
                                <form action="{{ route('admin.instructors.restore', $instructor->id) }}" method="POST">
                                    @csrf
                                    <button class="btn mb-2 btn-primary"
                                        onclick="return confirm('Bạn Có Muốn Khôi Phục ?')">
                                        <i class="fas fa-recycle"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.instructors.force-destroy', $instructor->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Bạn có Muốn Xoá ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    @endif
@endsection