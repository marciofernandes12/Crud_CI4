<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Contatos</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="<?php echo base_url('/assets/css/style.css') ?>" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="/ico.ico"/>

    <!-- STYLES -->


</head>
<body>


<header>

    <div class="menu">

        <ul class="nav justify-content-end">


            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/index'); ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/cadastroContato'); ?>">Cadastro
                    Contatos</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/cadastroGrupo'); ?>">Cadastro
                    Grupos</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/Listar'); ?>">Listagem</a></li>

        </ul>
    </div>


</header>

<!-- CONTENT -->

<div class="container">

    <h1>Editar Contatos</h1>
    <form method="post" action="<?= base_url('/editarContato') ?>" id="editaContato" class="form-floating mb-3">
        <input type="hidden" name="id_contato" id="id_contato" value="<?= $contato['id_contato']; ?>">
        <div class="mb-3">
            <label for="nomeContato">Nome</label>
            <input type="text" class="form-control" id="nomeContato" name="nomeContato[]"
                   value="<?= $contato['nome']; ?>" required>
        </div>
        <div class="adicionarEmail">
            <label for="emailContato" class="form-label">Email</label>
            <button type="button" class="btn btn-success" id="adicionaEmail">+</button>
            <input type="text" class="form-control" id="emailContato" name="emailContato[]"
                   value="<?= $contato['email']; ?>" required>
        </div>
        <div class="adicionarTelefone">
            <label for="telefoneContato" class="form-label">Telefone</label>
            <button type="button" class="btn btn-success" id="adicionaTelefone">+</button>
            <input type="text" class="form-control" name="telefoneContato[]" id="telefoneContato"
                   value="<?= $contato['telefone']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="grupoContato" class="form-label">Grupo</label>
            <select class="form-select" name="grupoContato" id="grupoContato">
                <option value="#">Selecione o grupo</option>

            </select>
        </div>
        <div>
            <button class="btn btn-success">Alterar</button>
        </div>
    </form>
</div>


<footer>


    <div class="copyrights">

        <p>&copy; Desenvolvido por Márcio Fenandes</p>

    </div>

</footer>

<!-- SCRIPTS -->
<script src="<?php echo base_url('/assets/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/jquery.mask.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous">

</script>
<script>
    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".adicionarEmail"); //Fields wrapper
        var add_button = $("#adicionaEmail"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="text" name="emailContato[]" class="form-control"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
        $('#telefoneContato').mask('(00)00000-0000;(00)00000-0000', {placeholder: "EX. (81)99999-9999;"});
        load_grupo();
    });

    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".adicionarTelefone"); //Fields wrapper
        var add_button = $("#adicionaTelefone"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="text" name="telefoneContato[]" class="form-control"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })

    });

    function load_grupo() {
        $.ajax({
            url: "<?php echo base_url('Home/ajax_load_grupo') ?>",
            type: 'get',
            dataType: 'json',
            cache: false,
            success: (data) => {
                console.log(data);
                const select = data.map((grupo) => {
                    return '<option value="' + grupo.id + '">' + grupo.nome + '</option>'
                })
                $('#grupoContato').append(select)
            },
            error: () => {
                alert('error')
            }
        });
    }
</script>

<!-- -->

</body>
</html>
