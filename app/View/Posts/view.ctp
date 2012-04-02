<div class="post">
    <h1><?php echo $post['Post']['title']?></h1>
    <div class="info"><?php echo __('Added on %s', $this->Time->nice($post['Post']['created'])); ?></div>
    <p class="body"><?php echo Sanitize::stripScripts($post['Post']['body']); ?></p>
</div>

<p>
    <?php
        echo $this->Html->link(__('Return to posts list'), array('controller' => 'posts', 'action' => 'index'));
        // inne opcje:
        // 1. javascript:history.back();
        // 2. przy przechodzeniu do strony zapisać w url'u numer strony
    ?>
</p>