<div id="<?php echo $key??'toastId'?>" class="toast text-bg-<?php echo$type??'success'?> mt-2">
    <script>
        $(document).ready(function(){
            (new bootstrap.Toast($('#<?php echo $key??'toastId'?>').on("hidden.bs.toast", function () {
            $(this).remove();
            }), { delay: 9000 })).show();
        });
    </script>
    <div class="d-flex">
        <div class="toast-body"><?php echo $toast?></div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
</div>