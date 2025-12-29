document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('.faq-question');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', () => {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';
            const answer = button.nextElementSibling;
            
            // Chiudi tutte le altre FAQ
            if (!isExpanded) {
                document.querySelectorAll('.faq-question').forEach(btn => {
                    if (btn !== button) {
                        btn.setAttribute('aria-expanded', 'false');
                        btn.nextElementSibling.setAttribute('aria-hidden', 'true');
                    }
                });
            }
            
            // Apri/chiudi la FAQ cliccata
            button.setAttribute('aria-expanded', !isExpanded);
            answer.setAttribute('aria-hidden', isExpanded);
        });
    });
});