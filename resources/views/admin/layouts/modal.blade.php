<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title', 'ONETAP')
    </title>
    <link rel="shortcut icon" href="{{ asset('client/assets/imgs/fanvicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('client/assets/imgs/fanvicon.png') }}" type="image/x-icon">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="Trang chủtyle" href="{{ asset('admin/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Xác nhận</h5>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xoá dữ liệu không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel-delete">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete">Xoá</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Tùy Chỉnh -->
    <script>
        let deleteUrl = '';

        function confirmDelete(url) {
            deleteUrl = url;  // Lưu URL của form xoá
            $('#confirmModal').modal('show');
        }

        $(document).ready(function() {
            $('#confirm-delete').click(function() {
                if (deleteUrl) {
                    // Tạo một form ẩn và gửi yêu cầu xoá
                    let form = $('<form>', {
                        method: 'POST',
                        action: deleteUrl
                    }).append($('<input>', {
                        type: 'hidden',
                        name: '_token',
                        value: '{{ csrf_token() }}'
                    })).append($('<input>', {
                        type: 'hidden',
                        name: '_method',
                        value: 'DELETE'
                    }));

                    $('body').append(form);
                    form.submit();
                }
                $('#confirmModal').modal('hide');
            });

            $('#cancel-delete').click(function() {
                $('#confirmModal').modal('hide');
            });
        });
    </script>
    <!--   Core JS Files   -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('admin/assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
</body>

</html>
