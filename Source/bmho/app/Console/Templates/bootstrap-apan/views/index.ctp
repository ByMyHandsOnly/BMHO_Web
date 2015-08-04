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
<div class="row-fluid">
    <div class="span12">
        <h3><?php echo "<?php echo __('All {$pluralHumanName}');?>"; ?></h3>
        <hr />
        <div class="btn-group">
            <?php echo "<?php echo \$this->Html->link(__('Add New " . $singularHumanName . "'), array('action' => 'add'), array('class' => 'btn btn-primary', 'icon' => 'plus white')); ?>"; ?>
        </div>
        <br />
        <?php echo "<?php if (count(\${$pluralVar}) > 0) : ?>\n"; ?>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <?php if ($field == 'id') : ?>
                            <th style="width: 30px"><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>"; ?></th>
                        <?php elseif (($field == 'name') || ($field == 'title')) : ?>
                            <th style="width: 300px"><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>"; ?></th>
                        <?php else : ?>
                            <th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>"; ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <th class="actions" style="width: 80px"><?php echo "<?php echo __('Actions');?>"; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                echo "<?php
	foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                echo "\t<tr>\n";
                foreach ($fields as $field) {
                    $isKey = false;
                    if (!empty($associations['belongsTo'])) {
                        foreach ($associations['belongsTo'] as $alias => $details) {
                            if ($field === $details['foreignKey']) {
                                $isKey = true;
                                echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                break;
                            }
                        }
                    }
                    if ($isKey !== true) {
                        if (($field == 'name') || ($field == 'title')) {
                            echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$modelClass}']['{$field}'], array('action' => 'view', \${$singularVar}['{$modelClass}']['id'])); ?>&nbsp;</td>";
                        } else {
                            echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                        }
                    }
                }

                echo "\t\t<td class=\"actions\">\n";
                echo "\t\t\t\t<div class=\"btn-group\">\n";
                echo "\t\t\t\t\t<?php echo \$this->Html->link(null, array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-small', 'icon' => 'pencil')); ?>\n";
                echo "\t\t\t\t\t<?php echo \$this->Form->postLink(null, array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-danger btn-small', 'icon' => 'trash white'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
                
                
                /**
                echo " <?php\n"; 
                echo "             echo \$this->Html->link(\n";
                echo "              null, '#{$pluralHumanName}Modal', array(\n";
                echo "              'class' => 'btn btn-small btn-danger btn-remove-modal',\n";
                echo "                    'icon' => 'trash white',\n";
                echo "                    'data-toggle' => 'modal',\n";
                echo "                    'role' => 'button',\n";
                echo "                    'data-uid' => \${$singularVar}['{$singularHumanName}']['id'],\n";
                echo "                    'data-uname' => \${$singularVar}['{$singularHumanName}']['name']\n";
                echo "                ));";
                echo "                ?>\n";
                **/
                
                echo "\t\t\t\t</div>\n";
                echo "\t\t</td>\n";
                echo "\t</tr>\n";

                echo "<?php endforeach; ?>\n";
                ?>
            </tbody>
        </table>
        <div class="pull-right">
            <p>
                <?php echo "<?php\n
	echo \$this->Paginator->counter(array(\n
	'format' => __('Page {:page} of {:pages}, total records: {:count}.')\n
	));\n
	?>\n"; ?>
            </p>
            <?php echo "<?php \$paging = \$this->Paginator->params(); ?>\n"; ?>
            <?php echo "\t<?php if (\$paging['pageCount'] > 1) : ?>\n"; ?>
            <?php echo "<?php echo \$this->Paginator->pagination(); ?>\n"; ?>
            <?php echo "<?php endif; ?>\n"; ?>
        </div>
        <?php echo "<?php else : ?>\n"; ?>
        <?php echo "\tNo record(s) found.\n"; ?>
        <?php echo "<?php endif; ?>\n"; ?>
    </div>
</div>