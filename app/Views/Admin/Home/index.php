<?php echo $this->extend('Admin/layout/principal'); ?>

<?= $this->section('titulo'); ?>

<?= $titulo ?>

<?= $this->endsection(); ?>
<!-- C:\xampp\htdocs\foodDelivery\public\ -->


<?= $this->section('estilos'); ?>

<?= $this->endsection(); ?>


<!-- Aqui enviamos para o template principal o conteudo -->


<?= $this->section('conteudo'); ?>

<?= $titulo ?>

<?= $this->endsection(); ?>

<!-- Aqui enviamos para o template principal os scripts -->

<?= $this->section('scripts'); ?>
    

<?= $this->endsection(); ?>
