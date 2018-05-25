<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sexo $sexo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sexo->idSexo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sexo->idSexo)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sexo'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sexo form large-9 medium-8 columns content">
    <?= $this->Form->create($sexo) ?>
    <fieldset>
        <legend><?= __('Edit Sexo') ?></legend>
        <?php
            echo $this->Form->control('sexo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
