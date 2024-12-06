<?php

class SiteController extends Controller
{

    public function home()
    {

        $images = ['imagem1', 'imagem2', 'imagem3'];
        $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius duiLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros. Praesent porta lacinia
        elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros. Praesent porta lacinia elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Pellentesque dolor turpis, pulvinar varius dui id, convallis iaculis eros. Praesent porta lacinia elementum.";

        $this->setLayout('site/shared/layout.php');
        $this->view('site/home/index.php', array(
            'images' => $images,
            'description' => $description
        ));
    }

    public function pedido()
    {
        $this->setLayout('site/shared/layout.php');
        $this->view('site/pedido/index.php');
    }

    public function submitOrder() {
        // Use the mysqli connection
        include 'conexao.php'; // Include your connection file

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $pedido = $_POST['pedido'];
        $endereco = $_POST['endereco'];

        $query = "INSERT INTO pedidos (nome, telefone, pedido, endereco) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);

        // Bind parameters
        $stmt->bind_param("ssss", $nome, $telefone, $pedido, $endereco);

        if ($stmt->execute()) {
            echo json_encode(array("message" => "Pedido enviado com sucesso!"));
        } else {
            echo json_encode(array("message" => "Erro ao enviar o pedido: " . $stmt->error));
        }

        $stmt->close();
        $mysqli->close();
    }

    public function menu()
    {
        $this->setLayout('site/shared/layout.php');
        $this->view('site/menu.php');
    }
}
