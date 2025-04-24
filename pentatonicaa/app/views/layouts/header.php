<?php
session_start();
?>

<nav class="header">
    <div class="logo-container">
        <div class="logo">
            <img src="/pentatonicaa/public/images/logo.png" alt="Logo Pentatônica">
        </div>
        <?php if (isset($_SESSION['usuario'])): ?>
            <span class="user-name">
                Olá, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>
            </span>
        <?php endif; ?>
    </div>
    <div class="botoes-links">
        <a id="btn-1" href="/pentatonicaa/public/leiloes"><button>Leilões</button></a>
        <a id="btn-2" href="/pentatonicaa/public/guitarras"><button> Guitarras</button></a>

        <?php if (!isset($_SESSION['usuario'])): ?>
            <a id="btn-3" href="/pentatonicaa/public/login"><button>Login</button></a>
            <a id="btn-4" href="/pentatonicaa/public/cadastro"><button>Cadastrar-se</button></a>
        <?php else: ?>
            <a href="/pentatonicaa/public/logout"><button>Sair</button></a>
        <?php endif; ?>
    </div>
</nav>

