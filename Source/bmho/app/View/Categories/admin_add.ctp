<h1>Add a new category</h1>
<?php
echo $this->Form->create('Category');
echo $this->Form->input('parent_id',array('label'=>'Parent', 'empty' => '--- [Top] ---'));
echo $this->Form->input('name',array('label'=>'Name'));
echo $this->Form->end('Add');
?>
