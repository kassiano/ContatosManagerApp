



    
    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th></th>
            <th></th>
        </tr>

        <?php foreach ($listaContatos as $contato){ ?>

            <tr>
                <td><?php echo $contato->nome; ?></td>
                <td><?php echo $contato->telefone; ?></td>
                <td>
                    <a href="editar/<?php echo $contato->id;?>">editar</a>
                </td>
                <td>
                    <a href="remover/<?php echo $contato->id;?>">remover</a>
                </td>
            </tr>

        <?php } ?>

    </table>

    <div>
        <a href="novo" class="btn btn-primary" role="button">Novo contato</a>
    </div>



