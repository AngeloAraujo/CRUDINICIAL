
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
-->
   <script src='script.js'></script>
    
    <title>Cadastro de Novo Contato</title>

</head>

<body class='container'>
    <form action="acao.php" method="post" enctype="multipart/form-data" name="myForm">
        <fieldset>
            <div id="telaproduto">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Novo Cadastro</h5>
                        </div><br>
                        <div class="modal-body">
                            <div class="form-group">Id:
                                <input type="text" class='form-control' style='width:50px' readonly name="id" id="id" value=<?= isset($contato) ? $contato['id'] : '' ?>>
                            </div>
                            <div class="form-group">Nome
                                <input class="form-control" type="text" id="nome" name="nome" placeholder="Digite seu nome" value=<?= isset($contato) ? $contato['nome'] : '' ?>>
                            </div><br>
                            <div class="form-group">Sobrenome:
                                <input class="form-control" type="text" id="sobrenome" name="sobrenome" placeholder="Digite seu sobrenome" value=<?= isset($contato) ? $contato['sobrenome'] : '' ?>>
                            </div><br>
                            <div class="form-group">E-mail:
                                <input class="form-control" type="email" id="email" name="email" placeholder="Digite seu e-mail" value=<?= isset($contato) ? $contato['email'] : '' ?>>
                            </div><br>
                            <div class="form-group">Senha:
                                <input class="form-control" type="password" id="senha" name="senha" placeholder="Digite uma senha" value=<?php if (isset($usuario)) echo $usuario['senha'] ?>>
                            </div><br>
                            <div class="form-group">Data de Nascimento:
                                <input class="form-control" type="date" id="dtnasc" name="dtnasc" onchange=preencher() value=<?= isset($contato) ? $contato['dtnasc'] : '' ?>onchange=preencher() >
                            </div><br>
                            <div class="form-group">Idade:
                                <input class="form-control" type="text" id="idade" name="idade" value=<?= isset($_GET['idade']) ? $_GET['idade'] : '' ?>>
                            </div><br>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Endereço</label>
                                </div>
                                <div class="form-group">
                                    <select class="form-select" aria-label=".form-select-sm example" id="endereco" name="endereco">
                                        <option selected>Escolher</option>
                                        <option value="Avenida" <?php if (isset($contato) and $contato['endereco'] == "Avenida") echo 'selected'; ?>>Avenida</option>
                                        <option value="Rua" <?php if (isset($contato) and $contato['endereco'] == 'Rua') echo 'selected'; ?>>Rua</option>
                                        <option value="Estrada" <?php if (isset($contato) and $contato['endereco']  == 'Estrada') echo 'selected'; ?>>Estrada</option>
                                        <option value="Outros" <?php if (isset($contato) and $contato['endereco']  == 'Outros') echo 'selected'; ?>>Outros</option>
                                    </select>
                                </div><br>
                                <input class="form-control" type="text" id="enderecorua" name="enderecorua" value=<?= isset($contato) ? $contato['enderecorua'] : '' ?>>

                            </div>
                            <div class="form-group">Cidade:
                                <input class="form-control" type="text" id="cidade" name="cidade" value=<?= isset($contato) ? $contato['cidade'] : '' ?>>
                            </div>

                            <div class="form-group">Telefone para Contato:
                                <input class="form-control" type="text" id="telefone" name="telefone" value=<?= isset($contato) ? $contato['telefone'] : '' ?>>
                            </div><br>
                            <div class="form-group">Passatempos:
                                <input class="form-control" type="text" id="passatempo" name="passatempo" placeholder="Cite seus hobbies" value=<?= isset($contato) ? $contato['passatempo'] : '' ?>>
                            </div><br>

                            <div>
                                <input class="btn btn-outline-secondary" type="submit" value="Salvar" name="acao">
                                <input class="btn btn-outline-secondary" type="reset" value="Limpar">
                                <a href="index.html"><button class="btn btn-outline-primary">Voltar ao Menu
                                        Inicial</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <script src='script.js'></script>
    </form>



</body>

</html>