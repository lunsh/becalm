<div class="row">
    <div class="small-10 columns">
        <h2><?php echo h($post['Post']['title']); ?></h2>
    </div>
    <div class="small-2 columns">
        <?php echo $this->Html->link("&larr; Back", array('action' => 'index'), array('class' => 'button round small', 'escape'=>false)); ?>
    </div>
    <div class="small-12 columns">
        <p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

        <p><?php echo h($post['Post']['body']); ?></p>
    </div>
</div>