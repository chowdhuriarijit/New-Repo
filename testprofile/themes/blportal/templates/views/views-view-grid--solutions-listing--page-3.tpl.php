<?php
/**
 * @file views-view-grid.tpl.php
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<table class="<?php print $class; ?>"<?php print $attributes; ?>>
  <tbody>
    <?php foreach ($rows as $row_number => $columns): ?>
      <tr class="<?php print $row_classes[$row_number];  //print '<pre>'; print_r($columns); ?>">
	<?php $colmCnt = 0; if(@$columns[1] == '' && @$columns[2] == '') $colmCnt = 3; elseif(@$columns[1] != '' && @$columns[2] == '') $colmCnt = 2; ?>
        <?php foreach ($columns as $column_number => $item): ?>
	<?php if(!empty($item)) : ?>
          <td class="<?php print $column_classes[$row_number][$column_number]; ?>" width="33%" colspan="<?php if($colmCnt == 2 && $column_number == 1) print $colmCnt; elseif($colmCnt == 3) print $colmCnt; ?>">
            <?php print $item; ?>
          </td>
	<?php endif; ?>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
