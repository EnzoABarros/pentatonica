<?php
session_start();

$url_atual = $_SERVER['REQUEST_URI'];

$eh_inicio   = $url_atual === '/pentatonicaa/PROJETO/pentatonicaa/public/' || $url_atual === '/pentatonicaa/PROJETO/pentatonicaa/public/index.php';
$eh_guitarra = strpos($url_atual, '/pentatonicaa/PROJETO/pentatonicaa/public/guitarras') !== false;
$eh_leilao   = strpos($url_atual, '/pentatonicaa/PROJETO/pentatonicaa/public/leiloes') !== false;
$eh_carrinho = strpos($url_atual, '/pentatonicaa/PROJETO/pentatonicaa/public/carrinho') !== false;
?>

<nav class="<?= isset($_SESSION['usuario']['tipo']) && $_SESSION['usuario']['tipo'] === 'adm' ? 'adm-header' : 'header' ?>" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;">
    <div class="logo-container">
        <div class="logo">
            <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" alt="Logo Pentatônica">
        </div>
        <?php if (isset($_SESSION['usuario'])): ?>
            <span class="user-name">
                Olá, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>
            </span>
        <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['usuario']['tipo']) && $_SESSION['usuario']['tipo'] === 'adm'): ?>
        <div class="menu" onclick="abrirMenuAdm()">
            ☰
        </div>
    <?php endif; ?>

    <div class="botoes-links">
        <?php if (!$eh_inicio): ?>
            <a id="btn-inicio" href="/pentatonicaa/PROJETO/pentatonicaa/public/"><button>Início</button></a>
        <?php endif; ?>

        <?php if (!$eh_leilao): ?>
            <a id="btn-1" href="/pentatonicaa/PROJETO/pentatonicaa/public/leiloes"><button>Leilões</button></a>
        <?php endif; ?>

        <?php if (!$eh_guitarra): ?>
            <a id="btn-2" href="/pentatonicaa/PROJETO/pentatonicaa/public/guitarras"><button>Guitarras</button></a>
        <?php endif; ?>

        <?php if (!isset($_SESSION['usuario'])): ?>
            <a id="btn-3" href="/pentatonicaa/PROJETO/pentatonicaa/public/login"><button>Login</button></a>
            <a id="btn-4" href="/pentatonicaa/PROJETO/pentatonicaa/public/cadastro"><button>Cadastrar-se</button></a>
        <?php else: ?>
            <?php if (!$eh_carrinho): ?>
                <a id="btn-carrinho" href="/pentatonicaa/PROJETO/pentatonicaa/public/carrinho"><button>Carrinho</button></a>
            <?php endif; ?>

            <?php if ($_SESSION['usuario']['tipo'] === 'adm'): ?>
                <a id="btn-cadastrar-guitarra" href="/pentatonicaa/PROJETO/pentatonicaa/public/cadastro-guitarra"><button>Cadastrar Guitarra</button></a>
                <a id="btn-cadastrar-leilao" href="/pentatonicaa/PROJETO/pentatonicaa/public/cadastro-leilao"><button>Cadastrar Leilão</button></a>
            <?php endif; ?>
            
            <a href="/pentatonicaa/PROJETO/pentatonicaa/public/logout"><button>Sair</button></a>
        <?php endif; ?>
    </div>
</nav>

<script>
    function abrirMenuAdm() {
        const menu = document.querySelector('.botoes-links');
        const icon = document.querySelector('.menu');
        menu.style.display = (menu.style.display === 'none' || menu.style.display === '') ? 'flex' : 'none';
        icon.style.filter = (menu.style.display === 'flex') ? 'invert(1)' : 'none';
    }
</script>
