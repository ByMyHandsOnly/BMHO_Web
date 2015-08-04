<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<section id="breadcrumb">
    <?php echo "<?php\n"; ?>
    <?php echo "echo \$this->Html->breadcrumb(array(\n"; ?>
    <?php echo "\t\$this->Html->link('List all $pluralVar', '/admin/$pluralVar'),\n"; ?>
    <?php echo "\t'" . Inflector::humanize(str_replace('admin', '', $action)) . ' ' . $singularVar . "',\n"; ?>
    <?php echo "));\n"; ?>
    ?>
</section>
<div class="<?php echo $pluralVar; ?> form">
    <?php echo "<?php echo \$this->Form->create('{$modelClass}', array('class' => 'form-horizontal'));?>\n"; ?>
    <fieldset>
        <legend><?php echo $singularHumanName; ?> <small><?php echo Inflector::humanize(str_replace('admin', '', $action)) . ' ' . $singularVar; ?></small></legend>
        <?php
        echo "\t<?php\n";
        foreach ($fields as $field) {
            if (strpos($action, 'add') !== false && $field == $primaryKey) {
                continue;
            } elseif (!in_array($field, array('created', 'modified', 'updated'))) {

                if ($this->templateVars['schema'][$field]['null'] == false) {
                    $required = '<span class="label label-important">' . __('Required') . '</span>&nbsp;';
                } else {
                    $required = 'help in line here';
                }

                echo "\t\techo \$this->Form->input('{$field}', array (\n\t\t'label' => '" . Inflector::humanize($field) . "',\n\t\t 'class' => 'input-xlarge span2',\n\t\t 'helpInline' => '{$required}',\n\t\t 'helpBlock' => 'help block here.'\n\t\t));\n";
            }
        }
        if (!empty($associations['hasAndBelongsToMany'])) {
            foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                echo "\t\techo \$this->Form->input('{$assocName}', array (\n\t\t'label' => '" . Inflector::humanize($field) . "',\n\t\t 'class' => 'input-xlarge span2',\n\t\t 'helpInline' => 'help in line here',\n\t\t 'helpBlock' => 'help block here.'\n\t\t));\n";
            }
        }
        echo "\t?>\n";
        ?>
        <?php
        if (strpos($action, 'add') !== false) {
            $btn_name = 'Add';
        } elseif (strpos($action, 'edit') !== false) {
            $btn_name = 'Save';
        } else {
            $btn_name = 'Submit';
        }
        ?>
        <?php echo "<?php echo \$this->Form->submit('{$btn_name}', array('class' => 'btn btn-primary')); ?>"; ?>
    </fieldset>
    <?php
    echo "<?php echo \$this->Form->end();?>\n";
    ?>
</div>