<h1>Add Event</h1>
<?php
echo $this->Form->create('Event');
echo $this->Form->input('title');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('start');
echo $this->Form->input('end');
echo $this->Form->input('all_day');
echo $this->Form->end(array(
    'label' => 'Create',
    'class' => 'button small round',
    ));
?>