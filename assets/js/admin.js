function toggleBranchSelection() {
    var role = document.getElementById('role').value;
    var branchSection = document.getElementById('branch-section');
    var branchInput = document.getElementById('branch');
    
    if (role === 'outlet') {
        branchSection.style.display = '';
    } else {
        branchSection.style.display = 'none';
        branchInput.value = ''; // Clear the branch value when the role is not outlet
    }
}

// Call the function on page load to check the initial state
toggleBranchSelection();

// JavaScript to handle tab display
document.querySelectorAll('.nav-link').forEach((tab) => {
    tab.addEventListener('click', (event) => {
        // Hide all tab panes
        document.querySelectorAll('.tab-pane').forEach((pane) => {
            pane.classList.add('d-none');
            pane.classList.remove('show', 'active');
        });

        // Show the selected tab pane
        const target = document.querySelector(event.target.dataset.bsTarget);
        target.classList.remove('d-none');
        target.classList.add('show', 'active');
    });
});