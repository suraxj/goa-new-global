<div class="modal-body">
    <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel1">
            Edit Home Faq
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="/admin/home/faq/update" method="post" id="updateFaq" enctype="multipart/form-data" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{$faqs->id}}">
            <div class="modal-body">
                <div class="row gy-3">
                   
                    <div class="col-md-12">
                        <label for="basicInput">Question</label>
                        <textarea name="question" id="question" cols="30" class="form-control" rows="4">{{ $faqs->question }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="basicInput">Answer</label>
                        <textarea name="content" id="content" cols="30" class="form-control ckContent" rows="4">{{$faqs->answer}}</textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(function() {
        $("#updateFaq").on("submit", function(e) {
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
<script>
    constructEditor('content')
</script>