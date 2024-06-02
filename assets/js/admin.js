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