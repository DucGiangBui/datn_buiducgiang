@if (Session::has('message'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade p-2 bg-gradient-success show" role="alert" aria-live="assertive" id="successToast"
            aria-atomic="true">
            <div class="toast-header border-0 bg-success">
                <span class="text-white me-auto font-weight-bold">THÔNG BÁO</span>
                <small class="text-white">Bây giờ</small>
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
            </div>
            <hr class="horizontal light m-0">
            <div class="toast-body text-white">{{ Session::get('message') }}</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successToast = document.getElementById('successToast');
            const toast = new bootstrap.Toast(successToast);
            toast.show();
        });
    </script>
@endif
@if (Session::has('alert'))
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade p-2 bg-gradient-danger show" role="alert" aria-live="assertive" id="dangerToast"
            aria-atomic="true">
            <div class="toast-header border-0 bg-danger">
                <span class="text-white me-auto font-weight-bold">THÔNG BÁO</span>
                <small class="text-white">Bây giờ</small>
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
            </div>
            <hr class="horizontal light m-0">
            <div class="toast-body text-white">{{ Session::get('alert') }}</div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dangerToast = document.getElementById('dangerToast');
            const toast = new bootstrap.Toast(dangerToast);
            toast.show();
        });
    </script>
@endif
