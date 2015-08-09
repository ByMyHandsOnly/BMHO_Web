<?php
echo $this->Html->link('Back',array('action'=>'index'));
echo $this->Form->create('Category');
  echo $this->Form->hidden('id');
  echo $this->Form->input('name');
  echo $this->Form->input('parent_id', array('selected'=>$this->data['Category']['parent_id']));
  echo $this->Form->end('Save');
?>
