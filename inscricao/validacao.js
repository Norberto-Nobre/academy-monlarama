
        // Validação no lado do cliente
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const contact = document.getElementById('contact').value.trim();
            const course = document.getElementById('course').value;
            const message = document.getElementById('message').value.trim();
            
            if (name.length < 2) {
                alert('Nome deve ter pelo menos 2 caracteres.');
                e.preventDefault();
                return;
            }
            
            if (!email || !email.includes('@')) {
                alert('Por favor, insira um email válido.');
                e.preventDefault();
                return;
            }
            
            if (contact.length < 9) {
                alert('Por favor, insira um contacto válido.');
                e.preventDefault();
                return;
            }
            
            if (!course) {
                alert('Por favor, selecione um curso.');
                e.preventDefault();
                return;
            }
            
            if (message.length < 10) {
                alert('Mensagem deve ter pelo menos 10 caracteres.');
                e.preventDefault();
                return;
            }
        });

        // Limpar mensagens após alguns segundos
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);
    