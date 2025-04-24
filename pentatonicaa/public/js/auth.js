function validarFormulario() {
    const formulario = document.querySelector("form");
    const senha = document.getElementById("senha").value;
    const confirmarSenha = document.getElementById("confirmar_senha") ? document.getElementById("confirmar_senha").value : null;
    const email = document.getElementById("email").value;
    const cpf = document.querySelector("input[name='cpf']") ? document.querySelector("input[name='cpf']").value : null;

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (formulario.id === "cadastroForm") {
        if (!emailPattern.test(email)) {
            alert("Por favor, insira um email válido.");
            return false;
        }

        const senhaForte = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        if (!senhaForte.test(senha)) {
            alert("A senha deve ter no mínimo 8 caracteres e incluir letras, números e símbolos.");
            return false;
        }

        if (senha !== confirmarSenha) {
            alert("As senhas não coincidem.");
            return false;
        }

        if (!/^\d{11}$/.test(cpf)) {
            alert("CPF inválido. Digite exatamente 11 números.");
            return false;
        }
    }

    if (formulario.id === "loginForm") {
        if (!emailPattern.test(email)) {
            alert("Por favor, insira um email válido.");
            return false;
        }

        if (senha.length < 8) {
            alert("A senha deve ter no mínimo 8 caracteres.");
            return false;
        }
    }

    return true;
}
