
<div class="persona view large-9 medium-8 columns content">
    <h3><?= h($persona->Nombre) ?>  <?= h($persona->Apellido_Paterno) ?></h3>
    <table class="vertical-table">
         <tr>
            <th scope="row"><?= __('IdPersona') ?></th>
            <td><?= $this->Number->format($persona->idPersona) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($persona->Nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido Paterno') ?></th>
            <td><?= h($persona->Apellido_Paterno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido Materno') ?></th>
            <td><?= h($persona->Apellido_Materno) ?></td>
        </tr>        
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <!--<td><?= $this->Number->format($persona->sexo) ?></td> -->

            <td><?= h($sexo) ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('FechaNacimiento') ?></th>
            <td><?= h($persona->FechaNacimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correo') ?></th>
            <td><?= h($persona->Correo) ?></td>
        </tr>
       
    </table>
</div>