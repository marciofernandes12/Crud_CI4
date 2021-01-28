<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Grupos</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="/ico.ico"/>

    <!-- STYLES -->


</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

    <div class="menu">

        <ul class="nav justify-content-end">


            </li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/index'); ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/cadastroContato'); ?>">Cadastro
                    Contato</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Cadastro Grupos</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/listar'); ?>">Listagem</a></li>

        </ul>
    </div>

    <div class="heroe">


    </div>

</header>

<!-- CONTENT -->
<div class="container">
    <h1>Editar Grupos</h1>
    <form method="post" action="<?= base_url('/editarGrupo') ?>" id="editarGrupo">
        <input type="hidden" name="id_grupo" id="id_grupo" value="<?= $grupo['id_grupo']; ?>">
        <div class="mb-3">
            <label for="nomeGrupo" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nomeGrupo" name="nomeGrupo" value=" <?= $grupo['nome']; ?>">
        </div>
        <div class="mb-3">
            <label for="descGrupo" class="form-label">Descrição</label>
            <textarea class="form-control" id="descGrupo" name="descGrupo"> <?= $grupo['descricao']; ?></textarea>
        </div>

        <div>
            <button class="btn btn-success">Alterar</button>
        </div>
    </form>

</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>


    <div class="copyrights">

        <p>&copy;Desenvolvido por Márcio Fernandes</p>

    </div>

</footer>

<!-- SCRIPTS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous">

</script>

<!-- -->

</body>
</html>
