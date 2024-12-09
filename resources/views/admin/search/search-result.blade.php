@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Kết quả tìm kiếm</h1>

        <!-- Kiểm tra nếu có lỗi -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Kiểm tra nếu có kết quả -->
        @if ($results->count() > 0)
            <div class="row">
                @foreach ($results as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    {{ $item->user->first_name }} {{ $item->user->last_name }}
                                </h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Email:</strong> {{ $item->user->email }}</p>
                                <p><strong>Chuyên Môn:</strong>
                                    @foreach ($item->specialzations as $special)
                                        {{ $special->specialzation_name }}
                                    @endforeach
                                </p>
                                <p><strong>Số Phép :</strong> {{ $item->license_number ?? 'N/A' }}</p>
                                <p><strong>Số Năm Kinh Nghiệm:</strong> {{ $item->experience_years ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Phân trang -->
            <div class="pagination justify-content-center">
                {{ $results->links() }}
            </div>
        @else
            <div class="alert alert-warning">
                Không có kết quả nào tìm thấy cho từ khóa "{{ request()->input('search') }}".
            </div>
        @endif
    </div>
@endsection
