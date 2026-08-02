<div class="modal" id="poppartner" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg_primary">
            <div class="modal-header">
                <div class="col-10">
                    <h6 class="modal-title txt-secondary text-center"><b style="color: red">Great Decision!</b> Become Our Partner</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <div>
                    <form action="/add_lead" class="contact__form" id="leadFormpartner" method="POST">
                        @csrf
                        <div class="row gutter-20">
                           <div class="col-lg-12">
                              <div class="form-grp">
                                <input type="hidden" value="B2B" name="type">
                                 <input type="text" onkeypress="return isNotNumberKey(event);" name="institutename" placeholder="name" required>
                              </div>
                           </div>
                           <div class="col-lg-12">
                            <div class="form-grp">
                               <input type="text" onkeypress="return isNotNumberKey(event);" name="name" placeholder="Institute Owner Name" required>
                            </div>
                         </div>
                           <div class="form-grp">
                              <input type="email" name="email" placeholder="E-mail">
                           </div>
                           <div class="form-grp">
                              <input type="tel" name="contact" minlength="10" maxlength="10" onkeypress="return isNumberKey(event);" placeholder="Phone" required>
                           </div>
                        </div>

                         <div class="form-grp">
                            <textarea name="message" placeholder="Type Your requirement (Optional)"></textarea>
                         </div>

                        <div class="text-center">
                        <button class="btn">Submit</button>
                        </div>
                     </form>

                </div>
            </div>
        </div>
    </div>
</div>
