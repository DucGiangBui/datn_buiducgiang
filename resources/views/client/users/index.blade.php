@extends('admin.layouts.app')
@section('title', 'Thông tin tài khoản')
@section('content')
    <div class="card">
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
              <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
              <div class="row gx-4 mb-2">
                <div class="col-auto">
                  <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                  </div>
                </div>
                <div class="col-auto my-auto">
                  <div class="h-100">
                    <h5 class="mb-1">a</h5>
                    <p class="mb-0 font-weight-normal text-sm">a</p>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-12 ">
                    <div class="card card-plain h-100">
                      <div class="card-header pb-0 p-3">
                        <div class="row">
                          <div class="col-md-4 text-end">
                            <a href="javascript:;">
                              <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-3">
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                          <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Họ tên:</strong> Alec M. Thompson</li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Điện thoại</strong> (44) 123 1234 123</li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> alecthompson@mail.com</li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Địa chỉ:</strong> USA</li>
                          <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">Social:</strong> &nbsp;
                            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                              <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                              <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                              <i class="fab fa-instagram fa-lg"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

    <script>
        function confirmDelete() {
            if (confirm('Bạn có chắc chắn muốn xóa vai trò này không?')) {
                document.getElementById('delete-role-form').submit();
            }
        }
    </script>
@endsection
