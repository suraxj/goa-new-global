<!-- INTERACTIVE COURSE ELIGIBILITY & FEE CALCULATOR -->
<section class="container my-5">
    <div class="interactive-calc-sec">
        <div class="row align-items-center gy-4">
            <div class="col-lg-5 text-lg-start text-center">
                <span class="gga-badge mb-2"><i class="fas fa-calculator"></i> SMART ELIGIBILITY FINDER</span>
                <h2 class="sec-title mb-3" style="color: #0f172a; font-weight: 800;">
                    Find Eligible Courses & <br /><span class="gga-shimmer-text">Estimated Fee Structure</span>
                </h2>
                <p class="text-muted mb-4" style="line-height: 1.6;">
                    Select your current qualification and career preference to instantly view recommended degree options, duration, and flexible EMI instalment plans.
                </p>
                <div class="d-flex align-items-center gap-3 justify-content-lg-start justify-content-center">
                    <div style="background: rgba(79, 70, 229, 0.1); width: 48px; height: 48px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #4f46e5; font-size: 20px;">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="text-start">
                        <div style="font-weight: 700; color: #0f172a;">100% Free Consultation</div>
                        <div style="font-size: 0.82rem; color: #64748b;">No obligation, instant calculation</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div style="background: #ffffff; padding: 30px; border-radius: 24px; box-shadow: 0 15px 35px rgba(79, 70, 229, 0.1); border: 1px solid rgba(226, 232, 240, 0.8);">
                    <form id="calcForm" onsubmit="calculateCourse(event)">
                        <div class="row g-3">
                            <div class="col-md-6 text-start">
                                <label class="form-label font-weight-bold text-dark mb-1" style="font-weight: 700; font-size: 0.9rem;">1. Current Qualification</label>
                                <select id="calcQual" class="form-select py-2" required style="border-radius: 12px;">
                                    <option value="">Select Qualification...</option>
                                    <option value="10th">Below 10th / 10th Fail or Pass</option>
                                    <option value="12th">12th Pass (Higher Secondary)</option>
                                    <option value="Graduate">Graduation Passed (B.A, B.Com, B.Sc, etc.)</option>
                                    <option value="Professional">Working Professional / Diploma Holder</option>
                                </select>
                            </div>

                            <div class="col-md-6 text-start">
                                <label class="form-label font-weight-bold text-dark mb-1" style="font-weight: 700; font-size: 0.9rem;">2. Desired Field of Study</label>
                                <select id="calcField" class="form-select py-2" required style="border-radius: 12px;">
                                    <option value="">Select Field...</option>
                                    <option value="Management">Business & Management (MBA / BBA)</option>
                                    <option value="IT">IT & Computer Science (BCA / MCA)</option>
                                    <option value="Commerce">Commerce & Finance (B.Com / M.Com)</option>
                                    <option value="Arts">Humanities & Arts (B.A / M.A)</option>
                                    <option value="Schooling">10th / 12th Board Secondary</option>
                                </select>
                            </div>

                            <div class="col-12 mt-4 text-center">
                                <button type="submit" class="calc-btn w-100 py-3" style="font-size: 1rem;">
                                    <i class="fas fa-magic me-2"></i> CALCULATE ELIGIBLE COURSES & FEES
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Results Output Box -->
                    <div id="calcResult" class="mt-4 p-4 d-none" style="background: linear-gradient(135deg, #1e1b4b 0%, #0f172a 100%); border-radius: 16px; color: white;">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge bg-success font-weight-bold px-3 py-1 rounded-pill">ELIGIBILITY VERIFIED</span>
                            <span id="calcDuration" class="text-warning font-weight-bold small"></span>
                        </div>
                        <h4 id="calcTitle" class="text-white font-weight-bold mb-2"></h4>
                        <p id="calcDesc" style="color: #cbd5e0; font-size: 0.9rem;" class="mb-3"></p>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top border-secondary border-opacity-50">
                            <div>
                                <div style="font-size: 0.8rem; color: #94a3b8;">Flexible Payment:</div>
                                <div id="calcFee" style="font-size: 1.2rem; font-weight: 800; color: #fbbf24;"></div>
                            </div>
                            <button class="btn btn-warning fw-bold px-4 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#pop">
                                Apply Now &rarr;
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function calculateCourse(e) {
    e.preventDefault();
    const qual = document.getElementById('calcQual').value;
    const field = document.getElementById('calcField').value;
    const resultBox = document.getElementById('calcResult');
    
    let title = "Recommended Degree Program";
    let duration = "Duration: 3 Years";
    let desc = "Approved distance education degree with flexible weekend online lectures and exam centers in Goa & online.";
    let fee = "Easy EMI from ₹2,500/month";

    if (qual === '10th' || field === 'Schooling') {
        title = "10th & 12th Open Board Secondary Education";
        duration = "Duration: 1 Year Fast-Track";
        desc = "Government recognized 10th & 12th board schooling valid for higher education and passport/jobs.";
        fee = "Easy EMI from ₹1,500/month";
    } else if (qual === 'Graduate' || field === 'Management') {
        title = "Master of Business Administration (MBA) / M.Com / MCA";
        duration = "Duration: 2 Years";
        desc = "UGC & AIU recognized Postgraduate master's degree with specialization options.";
        fee = "Easy EMI from ₹3,500/month";
    } else if (field === 'IT') {
        title = "Bachelor of Computer Applications (BCA) / B.Sc IT";
        duration = "Duration: 3 Years";
        desc = "Industry relevant computer applications degree with software engineering & web development modules.";
        fee = "Easy EMI from ₹2,800/month";
    }

    document.getElementById('calcTitle').innerText = title;
    document.getElementById('calcDuration').innerText = duration;
    document.getElementById('calcDesc').innerText = desc;
    document.getElementById('calcFee').innerText = fee;
    resultBox.classList.remove('d-none');
}
</script>
