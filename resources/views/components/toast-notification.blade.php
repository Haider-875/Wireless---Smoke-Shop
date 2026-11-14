<!-- Floating Toast Notification System (Luxury Dark Aesthetic) -->
@if(session('success') || session('error') || session('info'))
<div id="bugsToastContainer" class="position-fixed" style="top: 24px; right: 24px; z-index: 99999; max-width: 440px; pointer-events: none;">
    @php
        $isSuccess = session()->has('success');
        $isError = session()->has('error');
        $message = session('success') ?? session('error') ?? session('info');
        $accentColor = $isSuccess ? '#22c55e' : ($isError ? '#ef4444' : 'var(--bugs-primary)');
        $icon = $isSuccess ? 'ph-check-circle' : ($isError ? 'ph-warning-circle' : 'ph-info');
    @endphp

    <div id="bugsToast" class="bugs-card p-3 p-sm-4 border position-relative overflow-hidden" 
         role="status" 
         aria-live="polite"
         style="background: rgba(14, 14, 18, 0.94); 
                backdrop-filter: blur(16px); 
                -webkit-backdrop-filter: blur(16px); 
                border: 1px solid rgba(255, 255, 255, 0.12) !important;
                border-left: 4px solid {{ $accentColor }} !important;
                border-radius: 16px; 
                box-shadow: 0 20px 45px rgba(0, 0, 0, 0.8), 0 0 20px rgba(0, 0, 0, 0.4);
                transform: translateX(120%); 
                transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease;
                opacity: 0;
                pointer-events: auto;">
        
        <div class="d-flex align-items-start gap-3">
            <div class="bugs-icon-badge flex-shrink-0" style="width: 38px; height: 38px; background-color: rgba(255, 255, 255, 0.05); color: {{ $accentColor }}; font-size: 1.25rem;">
                <i class="ph {{ $icon }}"></i>
            </div>
            
            <div class="flex-grow-1 pt-0.5">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <span class="eyebrow" style="color: {{ $accentColor }}; font-size: 11px; letter-spacing: 0.1em;">
                        {{ $isSuccess ? 'Counter Request Confirmed' : ($isError ? 'Notice' : 'Update') }}
                    </span>
                    <button type="button" id="bugsToastClose" class="btn btn-sm p-0 text-secondary hover-white border-0" aria-label="Close notification" style="background: transparent; line-height: 1;">
                        <i class="ph ph-x fs-5"></i>
                    </button>
                </div>
                <p class="body-4 text-white mb-0" style="line-height: 1.45; font-size: 0.875rem;">
                    {{ $message }}
                </p>
            </div>
        </div>

        <!-- Timer progress indicator -->
        <div id="bugsToastProgress" style="position: absolute; bottom: 0; left: 0; height: 3px; width: 100%; background-color: {{ $accentColor }}; opacity: 0.75; transform-origin: left; transition: width linear 5000ms;"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toast = document.getElementById('bugsToast');
    const closeBtn = document.getElementById('bugsToastClose');
    const progress = document.getElementById('bugsToastProgress');
    if (!toast) return;

    // Smooth entrance
    setTimeout(() => {
        toast.style.transform = 'translateX(0)';
        toast.style.opacity = '1';
        if (progress) {
            progress.style.width = '0%';
        }
    }, 100);

    function dismissToast() {
        toast.style.transform = 'translateX(120%)';
        toast.style.opacity = '0';
        setTimeout(() => {
            const container = document.getElementById('bugsToastContainer');
            if (container) container.remove();
        }, 400);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', dismissToast);
    }

    // Auto dismiss after 5.5s
    const timer = setTimeout(dismissToast, 5500);

    // Pause auto dismiss on hover
    toast.addEventListener('mouseenter', () => {
        clearTimeout(timer);
        if (progress) progress.style.transition = 'none';
    });
    toast.addEventListener('mouseleave', () => {
        setTimeout(dismissToast, 2000);
    });
});
</script>
@endif

