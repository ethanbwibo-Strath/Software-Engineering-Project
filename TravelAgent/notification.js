// Example of dynamically adding notifications
const notifications = document.querySelector('.notifications ul');

function addNotification(message) {
    const newNotification = document.createElement('li');
    newNotification.textContent = message;
    notifications.appendChild(newNotification);
}

// Example usage
addNotification("New booking for Client B - Package A");
