<div class="modal-body">
    <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel1">
            Create Course FAQ
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="/admin/courses/faq/store" method="post" id="add_banner" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="modal-body">
                <div class="row gy-3">
                    <div class="col-md-12">
                        <label for="basicInput">Select Course</label>
                        <select name="course_id" class="form-control" required>
                            <option value="" selected disabled>Select Course</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="basicInput">Question</label>
                        <textarea name="question" id="question" cols="15" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="basicInput">Answer</label>
                        <textarea name="answer" id="content" cols="30" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $("#add_banner").on("submit", function(e) {
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
                        $('#lg_modal').modal('hide');
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
                        $('#lg_modal').modal('hide');
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