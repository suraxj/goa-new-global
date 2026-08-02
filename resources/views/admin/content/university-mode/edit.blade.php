<div class="modal-body">
    <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel1">
            Edit University Mode
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form class="form row" action="/admin/university/mode/update" method="post" id="common_form_university" enctype="multipart/form-data">
            @csrf
            <div class="col-12 mb-3">
                <label class="form-label">Update Mode</label>
                <input type="hidden" class="form-control" value="{{ $categories->id }}" name="id" />
                <input type="text" class="form-control" value="{{ $categories->name }}" name="category_name" placeholder="Choose the Right..." required />
            </div>

            <div class="col-12 text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(function() {
        $("#common_form_university").on("submit", function(e) {
            var formData = new FormData(this);
            $.ajax({
                url: this.action,
                type: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == '200') {
                        $('#md_modal').modal('hide');
                        Toastify({
                            text: data.msg,
                            duration: 1500,
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    } else {
                        // $('#md_modal').modal('hide');
                        Toastify({
                            text: data.msg,
                            duration: 1500,
                            style: {
                                background: "linear-gradient(111.4deg, rgb(246, 4, 26) 0.4%, rgb(251, 139, 34) 100.2%)",
                            }
                        }).showToast();
                    }
                }
            });
            e.preventDefault();
        });
    });
</script>