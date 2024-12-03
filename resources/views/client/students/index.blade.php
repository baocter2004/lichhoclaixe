@extends('client.layouts.master')

@section('content')
    <div class="container my-5">
        <h2 class="text-center section-title">Quy trình đăng ký</h2>
        <div class="row align-items-center mt-4">
            <!-- Image Section -->
            <div class="col-md-6 image-container">
                <img src="https://via.placeholder.com/500x300" alt="Hình ảnh đăng ký" class="img-fluid">
            </div>
            <!-- Steps Section -->
            <div class="col-md-6">
                <div class="d-flex mb-4">
                    <div class="me-3">
                        <i class="bi bi-pencil-square step-icon"></i>
                    </div>
                    <div>
                        <h5 class="step-title">Đăng ký Online</h5>
                        <p>Đăng ký học lái xe Ô tô ngay tại nhà với đăng ký học lái xe Ô tô Online tại Website Học lái xe Hà
                            An để được học ngay trong ngày.</p>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <div class="me-3">
                        <i class="bi bi-handshake step-icon"></i>
                    </div>
                    <div>
                        <h5 class="step-title">Nghe tư vấn và hoàn tất hồ sơ</h5>
                        <p>Sau khi đăng ký, bạn Tư vấn tuyển sinh Đào tạo lái xe của Trung tâm sẽ trực tiếp liên hệ với bạn
                            để giải đáp thắc mắc & giúp bạn hoàn tất việc đăng ký học lái xe.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="me-3">
                        <i class="bi bi-car-front step-icon"></i>
                    </div>
                    <div>
                        <h5 class="step-title">Đi học ngay</h5>
                        <p>Sau khi đăng ký, bạn sẽ được sắp xếp lịch học lý thuyết và đi học lái buổi đầu tiên ngay tại sân
                            tập của trung tâm.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
