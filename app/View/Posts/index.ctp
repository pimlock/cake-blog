<div class="posts">
    <?php foreach ($posts as $post): ?>
    <div class="post">
        <h3><?php echo Sanitize::html($post['Post']['title']); ?></h3>

        <div class="info"><?php echo $this->Time->nice($post['Post']['created']); ?></div>
        <p class="intro"><?php echo Sanitize::html($post['Post']['intro']); ?></p>

        <div class="more">
            <?php
                echo $this->Html->link(
                    __('Read more') . '...',
                    array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])
                );
            ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<p>
    <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
    ?>
</p>

<div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
</div>
