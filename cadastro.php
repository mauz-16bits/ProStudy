<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['cName'];
    $password = $_POST['cPsw'];
    $confirmPassword = $_POST['cCpsw'];
    $age = $_POST['cAge'];

    if ($password !== $confirmPassword) {
        echo "As senhas não coincidem!";
        exit();
    }

    $file = 'users.json';
    if (!file_exists($file)) {
        file_put_contents($file, '[]');
    }
    $data = json_decode(file_get_contents($file), true);

    // verificação de usuário, dxa de ser burro henrique akakakak

    foreach ($data as $user) {
        if ($user['name'] === $name) {
            echo "Usuário já cadastrado!";
            echo "<script>
            setTimeout(function(){
            window.location.href = 'index.html';
            }, 1000);
            </script>";
            exit();
        }
    }

    $newUser = [
        "name" => $name,
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "age" => $age
    ];

    $data[] = $newUser;

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    echo "Cadastro realizado com sucesso! Aguarde";
}
    echo "<script>
    setTimeout(function(){
    window.location.href = 'indexapp.html';
    }, 1000);
    </script>";
?>