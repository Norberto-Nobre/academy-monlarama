document.getElementById('formulario-inscricao').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch('quform/contact.php', {
            method: 'POST',
            body: formData
        });

        const resultado = await response.text();

        const mensagemDiv = document.getElementById('mensagem');
        mensagemDiv.innerHTML = resultado;
        mensagemDiv.style.display = 'block';

        form.reset();

    } catch (error) {
        document.getElementById('mensagem').innerHTML = '<p class="text-danger">Erro ao enviar a inscrição. Tente novamente.</p>';
        document.getElementById('mensagem').style.display = 'block';
    }
});