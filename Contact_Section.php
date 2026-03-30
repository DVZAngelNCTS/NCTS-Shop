<section id="contact" class="contact-section">

    <div class="contact-glow contact-glow--left"></div>
    <div class="contact-glow contact-glow--right"></div>

    <div class="container" style="position:relative;z-index:1;">

        <!-- Header -->
        <div class="text-center mb-5 reveal">
            <span class="pres-badge mb-3">
                <span class="pres-badge-dot"></span>
                Get in touch
            </span>
            <h2 class="contact-title mt-3">Contact <span class="pres-title-gradient">us</span></h2>
            <p class="contact-lead mt-3">
                A question, an issue, or just curious? Reach out through any channel below — we're here 24/7.
            </p>
            <div class="pres-divider mx-auto mt-4"></div>
        </div>

        <div class="row g-4 align-items-start">

            <!-- Left: channels + info -->
            <div class="col-lg-5 d-flex flex-column gap-3 reveal reveal-delay-1">

                <a href="#" class="contact-channel-card">
                    <div class="contact-channel-icon-wrap contact-channel-icon-wrap--discord">
                        <i class="bi bi-discord fs-4"></i>
                    </div>
                    <div class="contact-channel-body">
                        <div class="contact-channel-name">Discord</div>
                        <div class="contact-channel-desc">Fastest way to reach us — join our server for live support.</div>
                    </div>
                    <i class="bi bi-arrow-right contact-channel-arrow"></i>
                </a>

                <a href="mailto:support@ncts.gg" class="contact-channel-card">
                    <div class="contact-channel-icon-wrap contact-channel-icon-wrap--mail">
                        <i class="bi bi-envelope-fill fs-4"></i>
                    </div>
                    <div class="contact-channel-body">
                        <div class="contact-channel-name">Email</div>
                        <div class="contact-channel-desc">support@ncts.gg — we reply within 2 hours on average.</div>
                    </div>
                    <i class="bi bi-arrow-right contact-channel-arrow"></i>
                </a>

                <a href="#" class="contact-channel-card">
                    <div class="contact-channel-icon-wrap contact-channel-icon-wrap--twitter">
                        <i class="bi bi-twitter-x fs-4"></i>
                    </div>
                    <div class="contact-channel-body">
                        <div class="contact-channel-name">Twitter / X</div>
                        <div class="contact-channel-desc">Follow us for update announcements and patch status.</div>
                    </div>
                    <i class="bi bi-arrow-right contact-channel-arrow"></i>
                </a>

                <!-- Response time note -->
                <div class="contact-status-note">
                    <div class="contact-status-dot"></div>
                    <span class="contact-status-text">Support team is currently <strong style="color:var(--cyan);">online</strong> — avg. reply time &lt; 2h</span>
                </div>

            </div>

            <!-- Right: contact form -->
            <div class="col-lg-7 reveal reveal-delay-2">
                <div class="contact-form-card">
                    <p class="contact-form-title">Send us a message</p>

                    <div class="contact-field">
                        <label class="contact-label">Subject</label>
                        <div class="contact-chips">
                            <span class="contact-chip active" onclick="toggleChip(this)">Support</span>
                            <span class="contact-chip" onclick="toggleChip(this)">Billing</span>
                            <span class="contact-chip" onclick="toggleChip(this)">Bug report</span>
                            <span class="contact-chip" onclick="toggleChip(this)">Partnership</span>
                            <span class="contact-chip" onclick="toggleChip(this)">Other</span>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-sm-6 contact-field">
                            <label class="contact-label">Username / Order ID</label>
                            <input type="text" class="contact-input" placeholder="e.g. ncts_user or #12345">
                        </div>
                        <div class="col-sm-6 contact-field">
                            <label class="contact-label">Email</label>
                            <input type="email" class="contact-input" placeholder="you@example.com">
                        </div>
                    </div>

                    <div class="contact-field">
                        <label class="contact-label">Message</label>
                        <textarea class="contact-textarea" placeholder="Describe your issue or question in detail…"></textarea>
                    </div>

                    <button class="contact-submit-btn" type="button">
                        <i class="bi bi-send-fill"></i>
                        Send message
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
function toggleChip(el) {
    document.querySelectorAll('.contact-chip').forEach(c => c.classList.remove('active'));
    el.classList.add('active');
}
</script>
