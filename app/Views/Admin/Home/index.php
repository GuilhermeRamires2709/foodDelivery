<?php echo $this->extend('Admin/layout/principal'); ?>

<?= $this->section('titulo'); ?>

<?= $titulo ?>

<?= $this->endsection(); ?>
<!-- C:\xampp\htdocs\foodDelivery\public\ -->

<link rel="styleseet" href="<?php site_url("admin/vendors/auto-complete/jquery-ui.css");?>" />

<?= $this->section('estilos'); ?>

<?= $this->endsection(); ?>


<!-- Aqui enviamos para o template principal o conteudo -->

<?= $this->section('conteudo'); ?>

<?= $titulo ?>

<?= $this->endsection(); ?>

<!-- Aqui enviamos para o template principal os scripts -->

<?= $this->section('scripts'); ?>

<script src="<?php echo site_url("admin/vendors/auto-complete/jquery-ui.js");?>"></script>
<script> 

    $ (function () {
        $("#query").autocomplete({
            source: function(request, response){

            $.ajax({
                url: "<?php echo site_url('admin/usuarios/procurar'); ?>",
                dataType: 'json',
                data: {
                    term:request.term
                },
                success: function (data) {
                    if(data.length<1){
                        var data = [
                            {
                            label: "Usuário não encontrado",
                            value: -1
                        }
                        ];
                    }
                    response(data); //Aqui temos valor no data
                },

            }); //Fim do Ajax
        },

        minLenght: 1,
        select: function (event, ui){
            if(ui.item.value==-1){
                $(this).val("");
                return false;
            } else{
                window.location.href='<?php echo site_url('admin/usuarios/show/'); ?>' + ui.item.id;
            }
        }

        });
    });

</script>
    

<?= $this->endsection(); ?>
