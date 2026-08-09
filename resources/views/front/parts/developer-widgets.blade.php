<!-- ==========================================================================
     GLOBAL ACADEMY - DEVELOPER SHOWCASE WIDGETS
     Designed & Built by Suraj Prakash Singh (Full-Stack Web Developer)
     ========================================================================== -->

<!-- 1. FLOATING DEVELOPER BADGE PILL -->
<a href="#devModal" data-bs-toggle="modal" data-bs-target="#devModal" class="dev-badge-pill" title="Developer Info & Tech Stack">
    <span class="dev-badge-pulse"></span>
    <span>Dev: <strong>Suraj Prakash Singh</strong></span>
</a>

<!-- 2. DEVELOPER TECH STACK MODAL -->
<div class="modal fade" id="devModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: linear-gradient(135deg, #0b0f19 0%, #1e1b4b 100%); color: white; border-radius: 24px; border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 30px 80px rgba(0,0,0,0.6);">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-warning text-dark font-weight-bold px-3 py-1 rounded-pill">FULL-STACK DEVELOPER</span>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <div style="width: 80px; height: 80px; margin: 0 auto; border-radius: 50%; background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%); display: flex; align-items: center; justify-content: center; font-size: 36px; color: white; box-shadow: 0 10px 25px rgba(79, 70, 229, 0.5);">
                        <i class="fas fa-code"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1 text-white">Suraj Prakash Singh</h3>
                <p class="text-info font-weight-bold mb-3" style="font-size: 0.95rem;">Lead Full-Stack Web Application Developer</p>
                <p class="text-white-50 small mb-4">Architected & developed the complete Apex Horizon Institute web application platform featuring 3D glassmorphic animations, responsive UI design, and lead management systems.</p>
                
                <h5 class="fs-14 text-uppercase text-muted fw-bold mb-3 tracking-wide">Project Tech Stack & Architecture</h5>
                <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                    <span class="badge bg-primary px-3 py-2 rounded-pill">Laravel 10 PHP</span>
                    <span class="badge bg-info text-dark px-3 py-2 rounded-pill">JavaScript ES6+</span>
                    <span class="badge bg-success px-3 py-2 rounded-pill">MySQL Database</span>
                    <span class="badge bg-purple px-3 py-2 rounded-pill" style="background: #8b5cf6;">3D Glassmorphism</span>
                    <span class="badge bg-secondary px-3 py-2 rounded-pill">Bootstrap 5</span>
                    <span class="badge bg-dark px-3 py-2 rounded-pill">AJAX Engine</span>
                </div>

                <div class="p-3 rounded-16 text-start mb-2" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px;">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="small text-muted">Developer Contact:</span>
                        <a href="mailto:prakashsinghsuraj69@gmail.com" class="text-info font-weight-bold small">prakashsinghsuraj69@gmail.com</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="small text-muted">Developer Portfolio:</span>
                        <a href="https://suraxj-portfolio.vercel.app" target="_blank" class="text-warning font-weight-bold small">suraxj-portfolio.vercel.app &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0 justify-content-center pb-4">
                <a href="https://suraxj-portfolio.vercel.app" target="_blank" class="btn btn-cyber-glow px-4 py-2 me-2">
                    <i class="fas fa-globe me-1"></i> Visit Developer Portfolio
                </a>
                <button type="button" class="btn btn-outline-light rounded-pill px-4 py-2" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 3. SMART ADMISSION ASSISTANT WIDGET -->
<div class="assistant-trigger-btn" id="assistantBtn" title="Suraj's Smart Admission Guide">
    <i class="fas fa-robot"></i>
</div>

<div class="assistant-drawer" id="assistantDrawer">
    <div class="assistant-header">
        <div class="d-flex align-items-center gap-2">
            <i class="fas fa-robot text-info fs-18"></i>
            <div>
                <h6 class="m-0 fw-bold text-white">Smart Admission Guide</h6>
                <small class="text-success" style="font-size: 0.75rem;">● Online | Developed by Suraj</small>
            </div>
        </div>
        <button type="button" class="btn-close btn-close-white" id="closeAssistantBtn"></button>
    </div>
    <div class="assistant-body">
        <p class="mb-3">Welcome to <strong>Apex Horizon Institute</strong>! How can I assist your educational journey today?</p>
        <button class="assistant-option-btn" onclick="assistantAnswer('approvals')">📜 Are degrees UGC & WES approved?</button>
        <button class="assistant-option-btn" onclick="assistantAnswer('fees')">💰 What are the monthly EMI fee options?</button>
        <button class="assistant-option-btn" onclick="assistantAnswer('contact')">📞 How do I talk to an admission counselor?</button>

        <div id="assistantResponse" class="mt-3 p-3 rounded-12 d-none" style="background: rgba(255,255,255,0.08); border-left: 3px solid #38bdf8;"></div>
    </div>
</div>

<!-- 4. CONSOLE EASTER EGG & SCRIPT LOGIC -->
<script>
    console.log(
        "%c 🚀 Website Designed & Developed by Suraj Prakash Singh %c Full-Stack Web Developer %c\nPortfolio: https://suraxj-portfolio.vercel.app\nContact: prakashsinghsuraj69@gmail.com",
        "background: #4f46e5; color: white; font-weight: bold; font-size: 14px; padding: 6px 12px; border-radius: 4px 0 0 4px;",
        "background: #06b6d4; color: white; font-weight: bold; font-size: 14px; padding: 6px 12px; border-radius: 0 4px 4px 0;",
        "font-size: 12px; color: #64748b; font-style: italic; margin-top: 4px;"
    );

    document.addEventListener('DOMContentLoaded', function() {
        const assistantBtn = document.getElementById('assistantBtn');
        const assistantDrawer = document.getElementById('assistantDrawer');
        const closeAssistantBtn = document.getElementById('closeAssistantBtn');

        if (assistantBtn && assistantDrawer && closeAssistantBtn) {
            assistantBtn.addEventListener('click', function() {
                assistantDrawer.style.display = assistantDrawer.style.display === 'block' ? 'none' : 'block';
            });

            closeAssistantBtn.addEventListener('click', function() {
                assistantDrawer.style.display = 'none';
            });
        }
    });

    function assistantAnswer(type) {
        const respDiv = document.getElementById('assistantResponse');
        if (!respDiv) return;

        respDiv.classList.remove('d-none');
        if (type === 'approvals') {
            respDiv.innerHTML = "<strong>UGC & WES Recognition:</strong><br>All degrees are 100% UGC, DEB, AIU, and WES accredited for government jobs and international higher studies.";
        } else if (type === 'fees') {
            respDiv.innerHTML = "<strong>Monthly EMI Installments:</strong><br>Programs start at ₹1,500/month with zero-interest installment options for working professionals.";
        } else if (type === 'contact') {
            respDiv.innerHTML = "<strong>Admission Counseling:</strong><br>Call us at <strong>+91 98817 88888</strong> or email <strong>prakashsinghsuraj69@gmail.com</strong> for instant guidance.";
        }
    }
</script>
