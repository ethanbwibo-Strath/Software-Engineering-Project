// Select all navigation items
const navItems = document.querySelectorAll('.nav-item');

// Add event listener to each nav item
navItems.forEach(item => {
    item.addEventListener('click', function() {
        // Remove 'active' class from all items
        navItems.forEach(i => i.classList.remove('active'));
        
        // Add 'active' class to the clicked item
        this.classList.add('active');
    });
});
