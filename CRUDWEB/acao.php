
<?php
// verificar dados enviados
// echo 'Dados enviados:<br>';
// echo '<pre>';
var_dump($_POST);
// echo '</pre>';
define('JSON','contatos.json');

function carregaDadosFormParaVetor(){
   

    // pega informação enviada via post e guarda no vetor dados   
    $dados = array( 'id' => isset($_POST['id'])?$_POST['id']:'',  // teste ISSET é para verificar se os dados foram enviados
                    'nome' => isset($_POST['nome'])?$_POST['nome']:'',
                    'sobrenome' => isset($_POST['sobrenome'])?$_POST['sobrenome']:'',
                    'dtnasc' => isset($_POST['dtnasc'])?$_POST['dtnasc']:'',
                    'email' => isset($_POST['email'])?$_POST['email']:'',
                    'telefone' => isset($_POST['telefone'])?$_POST['telefone']:'',
                    'senha' => isset($_POST['senha'])?$_POST['senha']:'',
                    'idade' => isset($_POST['idade'])?$_POST['idade']:'',
                    'endereco' => isset($_POST['endereco'])?$_POST['endereco']:'',
                    'enderecorua' => isset($_POST['enderecorua'])?$_POST['enderecorua']:'',
                    'cidade' => isset($_POST['cidade'])?$_POST['cidade']:'',
                    'telefone' => isset($_POST['telefone'])?$_POST['telefone']:'',
                    'passatempo' => isset($_POST['passatempo'])?$_POST['passatempo']:''
                ); 
    return $dados; 
    var_dump($dados);

}


function inserir($novocontato){ // atualiza arquivo com todos os dados
    $dados = carregaDoArquivoParaVetor();
    // $novocontato = carregaDadosFormParaVetor();
    $novocontato['id'] = nextID($dados);
    if (validaDados($novocontato)){
        if ($dados){ 
            array_push($dados,$novocontato);
        }else{
            $dados[] = $novocontato;
        }
        salvaDadosNoArquivo($dados);
        return true;
    }
    return false;
}

function salvaDadosNoArquivo($dados){
    file_put_contents(JSON,json_encode($dados));    
}

function nextID($dados){
    $id = 0;
    if ($dados)
        $id = intval($dados[count($dados)-1]['id']);
    return ++$id;
}

function carregaDoArquivoParaVetor(){
    if (file_exists(JSON)){
        $conteudo = file_get_contents(JSON);
        $contatos = json_decode($conteudo,true);
        return $contatos;
    }
    return null;

}

function validaDados($dados){

    foreach($dados as $campo){  // apenas verifica se tem algum campo em branco
        if ($campo == '')
            return false;
    }
    return true;
}

function excluir($id){
    $dados = carregaDoArquivoParaVetor();
    $i = 0;
    foreach($dados as $contato){
        if ($contato['id'] == $id)
            break;
        else
        $i++;
    }
    array_splice($dados,$i,1);
    salvaDadosNoArquivo($dados);
}

function buscaContato($id){
    $dados = carregaDoArquivoParaVetor();
   // var_dump($dados)
    foreach($dados as $contato){
        if ($contato['id'] == $id)
            return $contato;
    }
}

function alterar($alterado){
    $dados = carregaDoArquivoParaVetor();
    $i = 0;
    foreach($dados as $contato){
        if ($contato['id'] == $alterado['id'])
            break;
        else
        $i++;
    }
    array_splice($dados,$i,1,array($alterado));
    salvaDadosNoArquivo($dados);  
}


$acao = isset($_POST['acao'])?$_POST['acao']:'';

if ($acao =='Salvar'){

    $contato = carregaDadosFormParaVetor();
    var_dump($contato);
   // die();
    if ($contato['id'] == ""){
        if (inserir($contato))
            header('location: index.php');
    }else{    
        alterar($contato);
        header('location: index.php');

    }
}
else{

    $acao = isset($_GET['acao'])?$_GET['acao']:'';
    $id = isset($_GET['id'])?$_GET['id']:'';
    
    if ($acao == 'excluir'){
        excluir($id);
    }else if($acao == 'editar'){
        $contato = buscaContato($id);
        
        
    }
}
?> 