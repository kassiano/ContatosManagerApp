
<h4>Novo contato</h4>
<hr/>
<?php if(isset($mensagem)){ ?>

    <div class="alert alert-success"> <?php echo $mensagem; ?> </div>

<?php } ?>

<form method="post" action="novo">
    <input class="form-control" type="text" name="nome"  placeholder="Nome"/>
    <input class="form-control" type="text" name="telefone" placeholder="Telefone"/>
    <input type="submit" class="btn btn-primary btn-block" value="Adicionar contato"/>
</form>