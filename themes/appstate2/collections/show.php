k<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));?>

<h1><?php echo $collectionTitle; ?></h1>

<div id="collection-description"><?php echo strip_formatting(metadata('collection', array('Dublin Core', 'Description'))); ?></div>

<div id="collection-items">
    <h3><?php echo link_to_items_browse(__('See all items in the %s Collection', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></h3>
    <?php if (metadata('collection', 'total_items') > 0): ?>
        <?php foreach (loop('items') as $item): ?>
        <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
        <div class="item entry">
            <h3><?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?></h3>

            <?php if (metadata('item', 'has thumbnail')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail', array('alt' => $itemTitle))); ?>
            </div>
            <?php endif; ?>

        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p><?php echo __("There are currently no items within this collection."); ?></p>
    <?php endif; ?>
</div><!-- end collection-items -->

<?php //fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>

<?php echo foot(); ?>
