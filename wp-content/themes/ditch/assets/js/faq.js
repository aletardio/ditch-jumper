document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('.faq-question');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', () => {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';
            const answer = button.nextElementSibling;
            
            // Chiudi le altre FAQ
            if (!isExpanded) {
                document.querySelectorAll('.faq-question').forEach(btn => {
                    if (btn !== button) {
                        const otherAnswer = btn.nextElementSibling;
                        btn.setAttribute('aria-expanded', 'false');
                        otherAnswer.setAttribute('aria-hidden', 'true');
                        otherAnswer.style.maxHeight = '0';
                    }
                });
            }
            
            // Apri/chiudi la FAQ cliccata
            button.setAttribute('aria-expanded', !isExpanded);
            answer.setAttribute('aria-hidden', isExpanded);
            
            if (!isExpanded) {
                // Apertura
                const contentHeight = answer.querySelector('.faq-answer-content').scrollHeight + 40;
                answer.style.maxHeight = `${contentHeight}px`;
                
                // Abilita animazione contenuto
                setTimeout(() => {
                    answer.querySelector('.faq-answer-content').style.opacity = '1';
                    answer.querySelector('.faq-answer-content').style.transform = 'translateY(0)';
                }, 50);
            } else {
                // Chiusura
                answer.style.maxHeight = '0';
                answer.querySelector('.faq-answer-content').style.opacity = '0';
                answer.querySelector('.faq-answer-content').style.transform = 'translateY(-10px)';
            }
        });
    });
});