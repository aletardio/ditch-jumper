/**
 * Main JavaScript file for Ditch theme
 */

document.addEventListener('DOMContentLoaded', function() {
    // Elementi del menu mobile
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const mobileNav = document.querySelector('.site-header__col--nav');
    const mobileOverlay = document.querySelector('.mobile-menu-overlay');
    const html = document.documentElement;

    // Funzione per gestire lo stato del menu
    function toggleMenu(show) {
        const isExpanded = show ?? !mobileNav.classList.contains('is-active');
        
        if (mobileMenuToggle) {
            mobileMenuToggle.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
        }
        
        mobileNav.classList.toggle('is-active', isExpanded);
        mobileOverlay.classList.toggle('is-active', isExpanded);
        html.classList.toggle('menu-open', isExpanded);
        
        // Blocca lo scroll quando il menu è aperto
        document.body.style.overflow = isExpanded ? 'hidden' : '';
    }

    // Apri/chiudi menu dall'hamburger
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu();
        });
    }

    // Chiudi menu dal pulsante di chiusa
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu(false);
        });
    }

    // Chiudi menu dall'overlay
    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', (e) => {
            // Chiudi solo se si clicca direttamente sull'overlay, non sui suoi figli
            if (e.target === mobileOverlay) {
                toggleMenu(false);
            }
        });
    }

    // Chiudi menu al click su un link
    const navLinks = document.querySelectorAll('.main-navigation__list a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => toggleMenu(false));
    });

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

// Previeni lo scroll quando il menu è aperto
const html = document.documentElement;
const observer = new MutationObserver(function(mutations) {
    if (html.classList.contains('menu-open')) {
        html.style.overflow = 'hidden';
    } else {
        html.style.overflow = '';
    }
});

observer.observe(html, {
    attributes: true,
    attributeFilter: ['class']
});