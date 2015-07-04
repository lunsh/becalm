<div class="row">
    <div class="small-10 columns">
        <h2>Events</h2>
    </div>
    <div class="small-2 columns">
        <?php echo $this->Html->link("+ Add Event", array('action' => 'add'), array('class' => 'button round small')); ?>
    </div>
    <div class="columns small-12">
        <table class="full-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?php echo $event['Event']['id']; ?></td>
                <td>
                    <?php echo $event['Event']['title']; ?>
                </td>
                <td>
                    <?php echo $event['Event']['start']; ?>
                </td>
                <td>
                    <?php echo $event['Event']['end']; ?>
                </td>
                <td>
                    <?php
                        echo $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete', $event['Event']['id']),
                            array('confirm' => 'Are you sure?')
                        );
                    ?>
                    <?php
                        echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $event['Event']['id'])
                        );
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>