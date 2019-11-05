<div class="container grade-css">
    <h1>Clientes</h1>
    <hr>
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th><a href="?controller=ClientsController&method=create" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($clients) {
                foreach ($clients as $client) {
                    ?>
                    <tr>
                        <td><?php echo $client->name; ?></td>
                        <td><?php echo $client->phone; ?></td>
                        <td><?php echo $client->email; ?></td>
                        <td>
                            <a href="?controller=ClientsController&method=edit&id=<?php echo $client->id; ?>" class="btn btn-primary btn-sm">Editar</a>

                            <a href="?controller=ClientsController&method=delete&id=<?php echo $client->id; ?>" class="btn btn-danger btn-sm">Deletar</a>


                        </td>
                    </tr>
                <?php
                    }
                } else {
                    ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>