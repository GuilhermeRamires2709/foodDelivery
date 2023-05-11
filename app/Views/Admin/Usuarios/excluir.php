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

    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-header bg-primary pb-2 pt-2">
                <h4 class="card-text text-white"> <?= esc($titulo); ?></h4>
            </div>
            <div class="card-body">

                <?php if (session()->has('errors_model')) : ?>

                    <ul>
                        <?php foreach (session('errors_model') as $error) : ?>
                            <li class="text-danger"><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>

                <?php endif; ?>

                <?php echo form_open("admin/usuarios/excluir/" . $usuario->id); ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Atenção!</strong> Tem certeza que quer excluir o usuário <?php echo esc($usuario->nome) ?>?.
                </div>
                <button type="submit" class="btn btn-danger mr-2 btn-sm">
                    <i class="mdi mdi-trash-can btn-icon-prepend"></i>
                    Excluir usuário!
                </button>

                <a href="<?php echo site_url('admin/usuarios/show/' . $usuario->id); ?>" class="btn btn-light text-dark btn-sm">
                    <i class="mdi mdi-arrow-left btn-icon-prepend"></i>
                    Voltar
                </a>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>

</div>





<?= $this->endsection(); ?>

<!-- Aqui enviamos para o template principal os scripts -->

<?= $this->section('scripts'); ?>

<script src="<?php echo site_url('admin/vendors/mask/jquery.mask.min.js'); ?>"></script>
<script src="<?php echo site_url('admin/vendors/mask/app.js'); ?>"></script>


<?= $this->endsection(); ?>