<?php

require_once __DIR__ . '/../models/Guitarra.php';
require_once __DIR__ . '/../models/Leilao.php';

class GuitarrasController {

    public function catalogo() {
        $guitarrasModel = new Guitarra();

        if (!empty($_GET)) {
            $guitarras = $guitarrasModel->filtrar($_GET);
        } else {
            $guitarras = $guitarrasModel->listarGuitarras("guitarras");
        }

        require_once __DIR__ . '/../views/pages/guitarras.php';
    }

    public function cadastroGuitarra() {
        require_once __DIR__ . '/../views/pages/cadGuit.php';
    }

    public function cadastroLeilao() {
        require_once __DIR__ . '/../views/pages/cadLei.php';
    }

    public function cadastrarGuitarra() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $preco = $_POST['preco'];
            $descricao = $_POST['descricao'];
            $categoria = $_POST['categoria'];
            $modo = $_POST['modo'];
    
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $nomeTemp = $_FILES['imagem']['tmp_name'];
                $nomeOriginal = basename($_FILES['imagem']['name']);
                $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
                $nomeFinal = uniqid('img_', true) . '.' . $extensao;
    
                $caminhoUploads = __DIR__ . '/../../public/uploads/';
                if (!file_exists($caminhoUploads)) {
                    mkdir($caminhoUploads, 0777, true);
                }
    
                $caminhoCompleto = $caminhoUploads . $nomeFinal;
    
                if (move_uploaded_file($nomeTemp, $caminhoCompleto)) {
                    $urlImagem = '/pentatonicaa/PROJETO/pentatonicaa/public/uploads/' . $nomeFinal;
    
                    $guitarra = new Guitarra();
                    $guitarra->cadastrar($modelo, $marca, $preco, $descricao, $categoria, $modo, $urlImagem);
    
                    echo "<script>alert('Guitarra cadastrada com sucesso!'); history.go(-2);</script>";
                } else {
                    echo "<script>alert('Erro ao mover a imagem.'); history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('Erro no upload da imagem.'); history.go(-1);</script>";
            }
        }
    }
    
    public function cadastrarLeilao() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $preco_inicio = $_POST['preco_inicial'];
            $descricao = $_POST['descricao'];
            $categoria = $_POST['categoria'];
            $modo = $_POST['modo'];
            $data_fim = $_POST['data_final'];
    
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $nomeTemp = $_FILES['imagem']['tmp_name'];
                $nomeOriginal = basename($_FILES['imagem']['name']);
                $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
                $nomeFinal = uniqid('img_', true) . '.' . $extensao;
    
                $caminhoUploads = __DIR__ . '/../../public/uploads/';
                if (!file_exists($caminhoUploads)) {
                    mkdir($caminhoUploads, 0777, true);
                }
    
                $caminhoCompleto = $caminhoUploads . $nomeFinal;
    
                if (move_uploaded_file($nomeTemp, $caminhoCompleto)) {
                    $urlImagem = '/pentatonicaa/PROJETO/pentatonicaa/public/uploads/' . $nomeFinal;
    
                    $leilao = new Leilao();
                    $leilao->cadastrarLeilao($modelo, $marca, $preco_inicio, $descricao, $categoria, $modo, $data_fim, $urlImagem);
    
                    echo "<script>alert('Leilão cadastrado com sucesso!'); history.go(-2);</script>";
                } else {
                    echo "<script>alert('Erro ao mover a imagem.'); history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('Erro no upload da imagem.'); history.go(-1);</script>";
            }
        }
    }
    

    public function leiloes() {
        $filtrosGet = $_GET;
        $leilaoModel = new Leilao();

        $leiloes = $leilaoModel->listarLeiloes($filtrosGet);

        require_once __DIR__ . '/../views/pages/leiloes.php';
    }


    public function comprar() {
        $guitarrasModel = new Guitarra();

        $guitarra = $guitarrasModel->buscarPorId($_GET['id']);

        require_once __DIR__ . '/../views/pages/comprar.php';

    }

    public function removerGuitarra() {

        $guitarrasModel = new Guitarra();

        $guitarrasModel->removerGuitarra($_GET['id']);

        echo "<script>alert('Guitarra removida com sucesso!'); history.go(-1);</script>";
    }
    
    public function editaGuitarra() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $guitarrasModel = new Guitarra();
    
            $guitarra = $guitarrasModel->buscarPorId($id);
    
            if (!$guitarra) {
                echo "<script>alert('Guitarra não encontrada.'); history.go(-1);</script>";
                return;
            }
    
            require_once __DIR__ . '/../views/pages/editarGuit.php';
        } else {
            echo "<script>alert('ID da guitarra não informado.'); history.go(-1);</script>";
        }
    }

    public function editarGuitarra() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $preco = $_POST['preco'];
            $descricao = $_POST['descricao'];
            $categoria = $_POST['categoria'];
    
            $imagem = null;
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
                $imagem = $this->uploadImagem($_FILES['imagem']);
            } else {
                $guitarrasModel = new Guitarra();
                $guitarra = $guitarrasModel->buscarPorId($id);
                $imagem = $guitarra['url_imagem'];
            }
    
            $guitarrasModel = new Guitarra();
            $resultado = $guitarrasModel->atualizar($id, $modelo, $marca, $preco, $descricao, $categoria, $imagem);
    
            if ($resultado) {
                echo "<script>alert('Guitarra atualizada com sucesso!'); history.go(-2);</script>";
            } else {
                echo "<script>alert('Erro ao atualizar a guitarra!'); history.go(-1);</script>";
            }
        }
    }
    
    private function uploadImagem($file) {
        $diretorio = __DIR__ . "/../public/uploads/guitarras/";
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }
    
        $nomeImagem = uniqid('guitarra_') . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $caminhoImagem = $diretorio . $nomeImagem;
    
        if (move_uploaded_file($file['tmp_name'], $caminhoImagem)) {
            return $nomeImagem;
        } else {
            return null;
        }
    }

    public function editaLeilao() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $leilaoModel = new Leilao();
            $leilao = $leilaoModel->buscarPorId($id);
    
            if (!$leilao) {
                echo "<script>alert('Leilão não encontrado.'); history.go(-1);</script>";
                return;
            }
    
            require_once __DIR__ . '/../views/pages/editarLei.php';
        } else {
            echo "<script>alert('ID do leilão não informado.'); history.go(-1);</script>";
        }
    }

    public function editarLeilao() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $modelo = $_POST['modelo'];
            $marca = $_POST['marca'];
            $preco_inicio = $_POST['preco_inicial'];
            $descricao = $_POST['descricao'];
            $categoria = $_POST['categoria'];
            $modo = $_POST['modo'];
            $data_fim = $_POST['data_final'];
    
            $imagem = null;
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
                $imagem = $this->uploadImagem($_FILES['imagem']);
            } else {
                $leilaoModel = new Leilao();
                $leilao = $leilaoModel->buscarPorId($id);
                $imagem = $leilao['url_imagem'];
            }
    
            $leilaoModel = new Leilao();
            $resultado = $leilaoModel->atualizar($id, $modelo, $marca, $preco_inicio, $descricao, $categoria, $modo, $data_fim, $imagem);
    
            if ($resultado) {
                echo "<script>alert('Leilão atualizado com sucesso!'); history.go(-2);</script>";
            } else {
                echo "<script>alert('Erro ao atualizar o leilão!'); history.go(-1);</script>";
            }
        }
    }

    public function removerLeilao() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $leilaoModel = new Leilao();
            $resultado = $leilaoModel->removerLeilao($id);
    
            if ($resultado) {
                echo "<script>alert('Leilão removido com sucesso!'); history.go(-1);</script>";
            } else {
                echo "<script>alert('Erro ao remover o leilão!'); history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('ID do leilão não informado.'); history.go(-1);</script>";
        }
    }
    
    
    
}
