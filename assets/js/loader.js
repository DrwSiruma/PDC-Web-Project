document.addEventListener('DOMContentLoaded', function() {
    const loaderOverlay = document.querySelector('.loader-overlay');

    // Show loader on link click
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function(event) {
            loaderOverlay.style.display = 'flex';
        });
    });

    // Hide loader when the page is fully loaded
    window.addEventListener('load', function() {
        loaderOverlay.style.display = 'none';
    });
});