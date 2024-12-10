@extends('admin.layouts.master')

@section('title')
    Thêm Mới Giảng Viên
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.instructors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <!-- First Name -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" value="{{ old('first_name') }}"
                            name="first_name">
                    </div>
                </div>
                <!-- Last Name -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" value="{{ old('last_name') }}"
                            name="last_name">
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email">
            </div>

            <!-- Password & Confirm Password -->
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="form-group mb-3">
                <label for="user_image" class="form-label">Image</label>
                <input type="file" name="user_image" id="user_image" class="form-control" />
            </div>

            <!-- Role -->
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                    <option value="instructor">Instructor</option>
                </select>
            </div>

            <div class="form-group">
                <label for="specialzations">Chọn Chuyên Môn:</label>
                <select name="specialzations[]" id="specialzations" class="form-control">
                    @foreach ($specialzations as $specialzation)
                        <option value="{{ $specialzation->id }}">
                            {{ $specialzation->specialzation_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- License Number -->
            <div class="form-group">
                <label for="license_number">License Number</label>
                <input type="text" class="form-control" id="license_number" value="{{ old('license_number') }}"
                    name="license_number">
            </div>
            <!-- Experience & Active Status -->
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="experience_years">Experience Years</label>
                        <input type="number" class="form-control" id="experience_years"
                            value="{{ old('experience_years') }}" name="experience_years">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-control">
                        <label for="is_active">Active Status</label>
                        <input type="checkbox" name="is_active" id="is_active" value="1">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
