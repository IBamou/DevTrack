@php
    $messages = [];
    if (session('success')) $messages[] = ['type' => 'success', 'text' => session('success')];
    if (session('error')) $messages[] = ['type' => 'error', 'text' => session('error')];
    if (session('status') === 'profile-updated') $messages[] = ['type' => 'success', 'text' => 'Profile updated successfully.'];
    if (session('status') === 'password-updated') $messages[] = ['type' => 'success', 'text' => 'Password updated successfully.'];
@endphp

@if (!empty($messages))
<div id="toast-container" class="fixed top-4 right-4 z-[100] flex flex-col gap-3 max-w-sm w-full pointer-events-none"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toasts = @json($messages);

    toasts.forEach(function(toast, index) {
        setTimeout(function() {
            showToast(toast, container);
        }, index * 150);
    });
});

function showToast(toast, container) {
    const el = document.createElement('div');

    const config = {
        success: {
            bg: 'bg-emerald-50 border-emerald-200',
            text: 'text-emerald-800',
            icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        },
        error: {
            bg: 'bg-red-50 border-red-200',
            text: 'text-red-800',
            icon: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        },
    };

    const c = config[toast.type] || config.error;

    el.className = 'pointer-events-auto flex items-start gap-3 rounded-xl border ' + c.bg + ' px-4 py-3 shadow-lg';
    el.style.transform = 'translateX(120%)';
    el.style.opacity = '0';
    el.style.transition = 'transform 0.2s ease-out, opacity 0.2s ease-out';
    el.innerHTML =
        '<div class="flex-shrink-0 mt-0.5">' +
            '<svg class="w-5 h-5 ' + c.text + '" fill="none" stroke="currentColor" viewBox="0 0 24 24">' + c.icon + '</svg>' +
        '</div>' +
        '<p class="text-sm font-medium ' + c.text + '">' + escapeHtml(toast.text) + '</p>' +
        '<button class="flex-shrink-0 ml-auto opacity-60 hover:opacity-100 ' + c.text + '" onclick="removeToast(this)" aria-label="Dismiss">' +
            '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>' +
            '</svg>' +
        '</button>';

    container.appendChild(el);

    requestAnimationFrame(function() {
        requestAnimationFrame(function() {
            el.style.transform = 'translateX(0)';
            el.style.opacity = '1';
        });
    });

    setTimeout(function() {
        removeToast(el.querySelector('button'));
    }, 5000);
}

function removeToast(btn) {
    const el = btn.closest ? btn.closest('div') : btn.parentElement;
    if (!el || el.style.opacity === '0') return;
    el.style.transform = 'translateX(120%)';
    el.style.opacity = '0';
    setTimeout(function() { el.remove(); }, 200);
}

function escapeHtml(text) {
    var div = document.createElement('div');
    div.appendChild(document.createTextNode(text));
    return div.innerHTML;
}
</script>
@endif
