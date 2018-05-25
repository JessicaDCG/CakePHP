<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Persona[]|\Cake\Collection\CollectionInterface $persona
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="persona index large-9 medium-8 columns content">
    <h3><?= __('Persona') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idPersona') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Apellido_Paterno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Apellido_Materno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FechaNacimiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sexo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Correo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($persona as $persona): ?>
            <tr>
                <td><?= $this->Number->format($persona->idPersona) ?></td>
                <td><?= h($persona->Nombre) ?></td>
                <td><?= h($persona->Apellido_Paterno) ?></td>
                <td><?= h($persona->Apellido_Materno) ?></td>
                <td><?= h($persona->FechaNacimiento) ?></td>
                <td><?= $this->Number->format($persona->sexo) ?></td>
                <td><?= h($persona->Correo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $persona->idPersona]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $persona->idPersona]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $persona->idPersona], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->idPersona)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
