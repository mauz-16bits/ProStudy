<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['lName'];
    $password = $_POST['lPsw'];

    $file = 'users.json';
    if (!file_exists($file)) {
        echo "Usuário não encontrado!";
        exit();
    }
    $data = json_decode(file_get_contents($file), true);

    foreach ($data as $user) {
        if ($user['name'] === $name && password_verify($password, $user['password'])) {
            echo "Login bem-sucedido! Aguarde";
            echo "<script>
            setTimeout(function(){
            window.location.href = 'indexapp.html';
            }, 1000);
            </script>";
            exit();
        }
    }

    echo "Nome ou senha incorretos!";
    echo "<script>
    setTimeout(function(){
    window.location.href = 'index.html';
    }, 1000);
    </script>";
}


?>

<!-- MANO O MATHEUS É MTO FD KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK -->
<!-- só o basiquinho 😊 -->