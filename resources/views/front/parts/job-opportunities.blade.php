<div class="modal" id="job-opportunit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg_primary">
            <div class="modal-header">
                <div class="col-10">
                    <h6 class="modal-title txt-secondary text-center"><b style="color: red">Apply Now</b> For Job
                        Opportunites</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <div>
                    <form action="/add_lead" class="contact__form" id="leadFormjob" method="POST">
                        @csrf
                        <div class="row gutter-20">
                            <div class="col-lg-6">
                                <div class="form-grp">
                                    <input type="hidden" value="job" name="type">
                                    <input type="text" onkeypress="return isNotNumberKey(event);" name="name"
                                        placeholder="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-grp">
                                    <input type="text" onkeypress="return isNotNumberKey(event);" name="father"
                                        placeholder="Father Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-grp">
                                    <input type="email" name="email" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-grp">
                                    <input type="tel" name="contact" minlength="10" maxlength="10"
                                        onkeypress="return isNumberKey(event);" placeholder="Phone" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-grp">
                                    <input type="text" name="qualification" placeholder="Qualification" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-grp">
                                    <input type="text" name="remark" placeholder="Remark" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-grp">
                                    <label for="exampleInputEmail1" class="form-label">Upload Your CV <span class="text-danger"> (Pdf File Only)</span> </label>
                                    <input type="file" accept="application/pdf" name="cv" class="form-control" placeholder="Uploder CV" required>
                                </div>
                            </div>
                           

                            <div class="text-center">
                                <button class="btn"> Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
