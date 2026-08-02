 <div class="space">
     <div class="container">
         <div class="title-area text-center">

             <h2 class="sec-title th_fade_anim">
                 <span class="th-text-perspective">Frequently Asked have any questions?
                 </span>
             </h2>
         </div>
         <div
             class="row gy-40 gx-80 justify-content-center justify-content-lg-start">

             <div class="col-lg-12">
                 <div class="tab-pane fade show active"
                     id="faq-tab1-pane"
                     role="tabpanel"
                     aria-labelledby="faq-tab1"
                     tabindex="0">

                     <div class="accordion" id="faqAccordion">

                         @foreach($faqs as $index => $faq)
                         <div class="accordion-card style2 @if($index == 0) active @endif">

                             <div class="accordion-header" id="heading{{ $faq->id }}">
                                 <button
                                     class="accordion-button @if($index > 0) collapsed @endif"
                                     type="button"
                                     data-bs-toggle="collapse"
                                     data-bs-target="#collapse{{ $faq->id }}"
                                     aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                     aria-controls="collapse{{ $faq->id }}">

                                     {{ $faq->question }}
                                 </button>
                             </div>

                             <div
                                 id="collapse{{ $faq->id }}"
                                 class="accordion-collapse collapse @if($index == 0) show @endif"
                                 data-bs-parent="#faqAccordion">

                                 <div class="accordion-body">
                                     <p class="faq-text">
                                         {!! $faq->answer !!}
                                     </p>
                                 </div>
                             </div>

                         </div>
                         @endforeach

                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>