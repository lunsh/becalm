<div class="row">
    <div class="small-10 columns">
        <h2>Journal entries</h2>
    </div>
    <div class="small-2 columns">
        <?php echo $this->Html->link("+ Add Journal", array('action' => 'add'), array('class' => 'button round small')); ?>
    </div>
    <div class="columns small-12">
        <table class="full-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td><?php echo $post['Post']['id']; ?></td>
                <td>
                    <?php
                        echo $this->Html->link(
                            $post['Post']['title'],
                            array('action' => 'view', $post['Post']['id'])
                        );
                    ?>
                </td>
                <td>
                    <?php echo $post['Post']['created']; ?>
                </td>
                <td>
                    <?php
                        echo $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete', $post['Post']['id']),
                            array('confirm' => 'Are you sure?')
                        );
                    ?>
                    <?php
                        echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $post['Post']['id'])
                        );
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>