<?php
$posts = $this->requestAction(array('controller' => 'posts', 'action' => 'index', 'page' => '1', 'limit' => 5, 'admin' => false, 'prefix' => ''));
?>
<div class="lastPosts">
    <ul>
    <?php foreach ($posts as $post): ?>
        <li><?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])
                );
            ?></li>
    <?php endforeach ?>
    </ul>
</div>