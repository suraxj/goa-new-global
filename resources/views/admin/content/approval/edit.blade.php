<div class="modal-body">
    <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel1">
            Edit Department
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form class="form row" action="/admin/approvals/update" method="post" id="common_form_university" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$approvals->id}}">
            <div class="col-md-12">
                <label for="basicInput">Approval Name</label>
                <input name="name" type="text" id="question" class="form-control" value="{{$approvals->name}}"></input>
            </div>
            <div class="col-md-12">
                <label class="form-label"> Image <small class="text-danger">(Preferred size (WxH): 40x40) (less than 1 MB)</small></label>
                <input type="file" class="form-control" name="banner_image"><img style="width: 100px; height:100px;" src="/{{$approvals->image}}" alt="">
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