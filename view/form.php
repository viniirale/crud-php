<div class="container">
    <form class="needs-validation" action="?controller=ClientsController&<?php echo isset($client->id) ? "method=refresh&id={$client->id}" : "method=save"; ?>" method="post">
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Clientes</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Nome:</label>
                <input type="text" class="form-control col-sm-8" name="name" id="name" value="<?php
                echo isset($client->name) ? $client->name : null;
                ?>" required>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Telefone:</label>
                <input type="text" class="form-control col-sm-8 ddd_telform" name="phone" id="phone" value="<?php
                echo isset($client->phone) ? $client->phone : null;
                ?>" required>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">E-mail:</label>
                <input type="email" class="form-control col-sm-8" name="email" id="email" value="<?php
                echo isset($client->email) ? $client->email : null;
                ?>" required>
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($client->id) ? $client->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <a class="btn btn-danger" href="?controller=ClientsController&method=list">Cancelar</a>
            </div>
        </div>
    </form>
</div>