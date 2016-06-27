
<h4>Editar contato</h4>
<hr/>
<?php if(isset($mensagem)){ ?>

    <div class="alert alert-success"> <?php echo $mensagem; ?> </div>

<?php } ?>

<form method="post" action="">

    <input type="hidden" name="id" value="<?php echo $contato->id; ?>" />
    <input class="form-control" type="text" name="nome" value="<?php echo $contato->nome; ?>"  placeholder="Nome"/>
    <input class="form-control" type="text" name="telefone" value="<?php echo $contato->telefone; ?>" placeholder="Telefone"/>
    <input type="submit" class="btn btn-primary btn-block" value="Atualizar contato"/>
</form>