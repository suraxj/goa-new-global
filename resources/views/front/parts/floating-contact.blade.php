@php
    $setting = DB::table('site_settings')->first();
    $phone = $setting->primary_contact ?? '9881788888';
@endphp

<!-- FLOATING QUICK CONTACT BUTTONS -->
<div class="floating-contact-bar">
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $phone) }}?text=Hi%20Goa%20Global%20Academy,%20I%20want%20information%20regarding%20admission" target="_blank" class="floating-btn whatsapp" title="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Phone Floating Button -->
    <a href="tel:{{ $phone }}" class="floating-btn phone" title="Call Counsellor">
        <i class="fas fa-phone-alt"></i>
    </a>
</div>
