var app = angular.module('DrivingApp', []);

app.controller('ReasonController', function($scope) {
  $scope.reasons = [
    { title: 'Chủ động lịch học', description: 'Đăng ký linh hoạt theo thời gian rảnh của bạn.' },
    { title: 'Học ngay khi đăng ký', description: 'Không cần chờ đợi, hỗ trợ bắt đầu học ngay.' },
    { title: 'Rõ ràng minh bạch', description: 'Không phát sinh chi phí trong suốt khóa học.' },
    { title: 'Tận tâm nhiệt tình', description: 'Đội ngũ giáo viên luôn hỗ trợ nhiệt tình.' }
  ];
});

app.controller('PriceController', function($scope) {
  $scope.prices = [
    { title: 'Học lái xe B1', details: 'Liên hệ để biết thêm thông tin' },
    { title: 'Học lái xe B2', details: 'Liên hệ để biết thêm thông tin' },
    { title: 'Thi bằng xe máy A1-A2', details: 'Liên hệ để biết thêm thông tin' }
  ];
});
