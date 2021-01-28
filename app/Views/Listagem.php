<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem</title>
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


            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/index'); ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/cadastroContato'); ?>">Cadastro
                    Contato</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/cadastroGrupo'); ?>">Cadastro
                    Grupos</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Listagem</a></li>

        </ul>
    </div>


</header>

<!-- CONTENT -->
<div class="container">
    <div class="mt-3">
        <h2>Listagem de Contatos</h2>
        <input type="search" class="form-control" id="buscaContato" name="buscaContato" onkeypress="recebe_contato()"
               placeholder="Buscar Contato">
        <table class="table table-bordered" id="lista-contato">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($contatos): ?>


                <?php foreach ($contatos as $contato): ?>


                    <tr>
                        <td><?php echo $contato['nome']; ?></td>
                        <td><?php echo $contato['email']; ?></td>
                        <td><?php echo $contato['telefone'] ?></td>
                        <td>
                            <a href="<?php echo base_url('editaContato/' . $contato['id_contato']); ?>"
                               class="btn btn-primary btn-sm" id="botao_editar">Editar</a>
                            <a href="<?php echo base_url('deletarContato/' . $contato['id_contato']); ?>"
                               class="btn btn-danger btn-sm" id="botao_deletar">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>


            </tbody>
        </table>
        <div class="mt-3">
            <h2>Listagem de Grupos</h2>
            <table class="table table-bordered" id="lista-grupo">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ação</th>

                </tr>
                </thead>
                <tbody>
                <?php if ($grupos): ?>

                    <?php foreach ($grupos as $grupo): ?>

                        <tr>
                            <td><?php echo $grupo['nome']; ?></td>
                            <td><?php echo $grupo['descricao']; ?></td>
                            <td>
                                <a href="<?php echo base_url('editaGrupo/' . $grupo['id_grupo']); ?>"
                                   class="btn btn-primary btn-sm">Editar</a>
                                <a href="<?php echo base_url('deletarGrupo/' . $grupo['id_grupo']); ?>"
                                   class="btn btn-danger btn-sm">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

                </tbody>
            </table>


        </div>
    </div>
</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>


    <div class="copyrights">

        <p>&copy;Desenvolvido por Márcio Fernandes</p>

    </div>

</footer>

<!-- SCRIPTS -->

<script src="<?php echo base_url('/assets/js/jquery.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous">

</script>
<script>
    function recebe_contato() {
        let input = $('#buscaContato').val()
        $.ajax({
            url: "<?php echo base_url('Home/ajax_buscar_contato') ?>",
            type: 'post',
            dataType: 'json',
            data: {input: input},
            cache: false,
            success: (data) => {
                //console.log(data);
                const select = data.map((contato) => {
                    return `<tr>
                    <td>${contato.nome}</td>
                    <td>${contato.email}</td>
                    <td>${contato.telefone}{</td>
                    <td><a href="<?php echo base_url('editaContato');?>/${contato.id_contato}"
                               class="btn btn-primary btn-sm" id="botao_editar">Editar</a>
                              <a href="<?php echo base_url('deletarContato');?>/${contato.id_contato}"
                               class="btn btn-danger btn-sm" id="botao_deletar">Deletar</a></td>
</tr>`
                })

                if (select == '') {
                    $('#lista-contato tbody').html('')
                    $('#lista-contato tbody').html('<tr><td colspan="5"> Nenhum resultado encontrado </td></tr>')
                } else {
                    $('#lista-contato tbody').html('')
                    $('#lista-contato tbody').html(select)
                }
            },
            error: () => {
                alert('error')

            }
        })
    }
</script>

<!-- -->

</body>
</html>
