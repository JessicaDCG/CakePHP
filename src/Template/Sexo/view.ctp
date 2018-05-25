<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sexo $sexo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sexo'), ['action' => 'edit', $sexo->idSexo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sexo'), ['action' => 'delete', $sexo->idSexo], ['confirm' => __('Are you sure you want to delete # {0}?', $sexo->idSexo)]) ?> </li>
        <li><?= $this->Html->link(__('List Sexo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sexo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sexo view large-9 medium-8 columns content">
    <h3><?= h($sexo->idSexo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <td><?= h($sexo->sexo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdSexo') ?></th>
            <td><?= $this->Number->format($sexo->idSexo) ?></td>
        </tr>
    </table>
</div>
