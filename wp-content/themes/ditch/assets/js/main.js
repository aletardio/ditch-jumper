/**
 * Main JavaScript file for Ditch theme
 */

document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll per i link di ancoraggio
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            // Escludi i link che non sono per ancoraggi o che hanno classi particolari
            if (this.getAttribute('href') === '#' || 
                this.classList.contains('no-smooth-scroll') ||
                this.getAttribute('target') === '_blank') {
                return;
            }

            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const headerHeight = document.querySelector('header') ? 
                    document.querySelector('header').offsetHeight : 100;
                const targetPosition = targetElement.getBoundingClientRect().top + 
                    window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Aggiorna l'URL
                if (history.pushState) {
                    history.pushState(null, null, targetId);
                } else {
                    window.location.hash = targetId;
                }
            }
        });
    });

    // Animazione per le sezioni al caricamento e allo scroll
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementTop < windowHeight - 0) {
                element.classList.add('active');
            }
        });
    };

    // Esegui all'avvio e allo scroll
    animateOnScroll();
    window.addEventListener('scroll', animateOnScroll);
});

// Supporto per il caricamento lazy delle immagini
if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
        if (img.dataset.src) {
            img.src = img.dataset.src;
        }
    });
}