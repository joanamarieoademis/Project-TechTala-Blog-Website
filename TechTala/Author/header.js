const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('nav ul');

hamburger.addEventListener('click', function () {
    this.classList.toggle('active');
    menu.classList.toggle('active');
});


window.addEventListener("scroll", function(){
    var nav = this.document.querySelector("nav");
    nav.classList.toggle("sticky", this.window.scrollY > 0);
})


document.addEventListener('DOMContentLoaded', function() {
    const logout = document.querySelectorAll('a[href*="Authentication/homepage.html"]');
    
    logout.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            
            const confirmLog = confirm('Are you sure you want to logout?');
            if (confirmLog) {
                window.location.href = this.href;
            }
        });
    });
});