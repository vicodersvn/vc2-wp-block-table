<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'table-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'table-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];                                                      
}
if( $is_preview ) {
    $className .= ' is-admin';
}
$table_title = get_field('table_title');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    
    <?php if (!empty($table_title)): ?>
        <h3 class="table-title"><?php echo esc_html($table_title); ?></h3>
    <?php endif ?>
    <?php if( have_rows('table_row') ): ?>
        <table class="table-content">
            <tbody>
                <tr class="table-row first-row">
                    <th class="table-order"><?php echo esc_html('STT'); ?></th>
                    <th class="table-name"><?php echo esc_html('Tên sản phẩm'); ?></th>
                    <th class="table-specifications"><?php echo esc_html('Quy Cách sản phẩm'); ?></th>
                </tr>
                <?php $i =1; ?>
                <?php while( have_rows('table_row') ): the_row(); 
                    $table_name = get_sub_field('table_name');
                    $table_specifications = get_sub_field('table_specifications');
                    $table_color = get_sub_field('table_color');
                ?>
                    <tr class="table-row" style="color: <?php echo esc_html($table_color); ?>">
                        <td class="table-order"><?php echo esc_html($i); ?></td>
                        <td class="table-name"><?php echo esc_html($table_name); ?></td>
                        <td class="table-specifications"><?php echo esc_html($table_specifications); ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Please add some field.</p>
    <?php endif; ?>
</div> 