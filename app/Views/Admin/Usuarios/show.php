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
    
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-header bg-primary pb-2 pt-2">
                <h4 class="card-text text-white"> <?=  esc($titulo); ?></h4>
            </div>
            <p class="card-text">
                <span class="font-weight-bold">Nome:</span>
                <?php echo esc($usuario->nome); ?>
            </p>
                
            <p class="card-text">
                <span class="font-weight-bold">E-mail:</span>
                <?php echo esc($usuario->email); ?>
            </p>
            <p class="card-text">
                <span class="font-weight-bold">Ativo:</span>
                <?php echo esc($usuario->ativo ? "Sim" : "Não"); ?>
            </p>
            <p class="card-text">
                <span class="font-weight-bold">Perfil:</span>
                <?php echo esc($usuario->is_admin ? "Administrador" : "Cliente"); ?>
            </p>
            <p class="card-text">
                <span class="font-weight-bold">Criado:</span>
                <?php echo esc($usuario->criado_em->humanize()); ?>
            </p>
            <p class="card-text">
                <span class="font-weight-bold">Atualizado:</span>
                <?php echo esc($usuario->atualizado_em->humanize()); ?>
            </p>

            <div class="mt-4">
            <a href="<?php echo site_url('admin/usuarios/editar/' .$usuario->id); ?>" class="btn btn-dark btn-sm">Editar</a>
            
            <a href="<?php echo site_url('admin/usuarios/excluir/' .$usuario->id); ?>" class="btn btn-danger btn-sm">Excluir</a>
            
            <a href="<?= site_url('admin/usuarios'); ?>" class="btn btn-light text-dark btn-sm">Voltar</a>
            </div>



       </div>
    </div>

</div>

<?= $this->endsection(); ?>

<!-- Aqui enviamos para o template principal os scripts -->

<?= $this->section('scripts'); ?>


<?= $this->endsection(); ?>