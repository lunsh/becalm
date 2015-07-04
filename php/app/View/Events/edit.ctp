<h1>Edit Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('title');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('start');
echo $this->Form->input('end');
echo $this->Form->input('all_day');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end(array(
    'label' => 'Save',
    'class' => 'button small round',
    ));
?>