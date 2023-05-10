<?php echo $this->extend('Admin/layout/principal'); ?>

<?= $this->section('titulo'); ?>

<?= $titulo ?>

<?= $this->endsection(); ?>


<!-- Aqui enviamos para o template principal os estilos -->

<?= $this->section('estilos'); ?>

<link rel="stylesheet" href="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.css'); ?>">

<?= $this->endsection(); ?>


<!-- Aqui enviamos para o template principal o conteudo -->

<?= $this->section('conteudo'); ?>

<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $titulo ?></h4>

                <div class="uiwidget">
                    <label for="tags"> Tags: </label>
                    <input id="query" name="query" placeholder="Pesquise um usuário" class="form-control bg-light mb-5">
                </div>

                <a href="<?php echo site_url('admin/usuarios/criar/'); ?>" class="btn btn-success float-right mb-5">

                    <i class="mdi mdi-plus btn-icon-prepend"></i>
                    Cadastrar

                </a>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>CPF</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>

                                    <td>
                                        <a href="<?= site_url('admin/usuarios/show/' . $usuario->id); ?>"> <?php echo $usuario->nome; ?></a>
                                    </td>
                                    <td><?php echo $usuario->email; ?></td>
                                    <td><?php echo $usuario->cpf; ?></td>
                                    <td><?php echo ($usuario->ativo ? '<label class="badge badge-primary">Sim</label>' : '<label class="badge badge-danger">Não</label>'); ?> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endsection(); ?>

<!-- Aqui enviamos para o template principal os scripts -->

<?= $this->section('scripts'); ?>

<script src="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.js'); ?>"></script>
<script>
    $(function() {

        $("#query").autocomplete({

            source: function(request, response) {

                $.ajax({

                    url: "<?php echo site_url('admin/usuarios/procurar'); ?>",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {

                        if (data.length < 1) {

                            var data = [{
                                label: 'Usuario não encontrado',
                                value: -1
                            }];

                        }
                        response(data); // Aqui temos valor no data

                    },

                }); // fim ajax

            },
            minLenght: 1,
            select: function(event, ui) {

                if (ui.item.value == -1) {

                    $(this).val("");
                    return false;

                } else {

                    window.location.href = '<?php echo site_url('admin/usuarios/show/'); ?>' + ui.item.id;
                }

            }

        }); // fim autocomplete



    });
</script>

<?= $this->endsection(); ?>