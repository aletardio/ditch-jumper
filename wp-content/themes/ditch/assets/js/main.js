/**
 * Main JavaScript file for Ditch theme
 */

document.addEventListener('DOMContentLoaded', function() {
    // Gestione del menu mobile
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileNav = document.querySelector('.site-header__col--nav');
    const mobileOverlay = document.querySelector('.mobile-menu-overlay');
    const html = document.documentElement;
    
    if (mobileMenuToggle && mobileNav) {
        mobileMenuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            mobileNav.classList.toggle('is-active');
            mobileOverlay.classList.toggle('is-active');
            html.classList.toggle('menu-open', !isExpanded);
        });
        
        // Chiudi il menu quando si clicca sull'overlay
        mobileOverlay.addEventListener('click', function() {
            mobileMenuToggle.setAttribute('aria-expanded', 'false');
            mobileNav.classList.remove('is-active');
            this.classList.remove('is-active');
            html.classList.remove('menu-open');
        });
        
        // Chiudi il menu quando si clicca su un link del menu
    }

    // Apri menu al click sull'hamburger
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', () => toggleMenu(true));
    }

    // Chiudi menu al click sulla X
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', () => toggleMenu(false));
    }

    // Chiudi menu al click sull'overlay
    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', () => toggleMenu(false));
    }

    // Chiudi menu al click su un link del menu
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