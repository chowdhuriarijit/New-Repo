<?php
/**
 * @file
 * Template to display a view as a mini calendar month.
 * 
 * @see template_preprocess_calendar_mini.
 *
 * $day_names: An array of the day of week names for the table header.
 * $rows: An array of data for each day of the week.
 * $view: The view.
 * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * 
 * $show_title: If the title should be displayed. Normally false since the title is incorporated
 *   into the navigation, but sometimes needed, like in the year view of mini calendars.
 * 
 */
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. $max_date_formatted);dsm($day_names);
$params = array(
  'view' => $view,
  'granularity' => 'month',
  'link' => FALSE,
);
?>dasdasdasdasdasdas
<div class="calendar-calendar"><div class="month-view">
<?php if ($show_title): ?>
<div class="date-nav-wrapper clear-block">
  <div class="date-nav">
    <div class="date-heading">
      <?php print theme('date_nav_title', $params) ?>
    </div>
  </div>
</div> 
<?php endif; ?> 
<table class="mini">
  <thead>
    <tr>
      <?php foreach ($day_names as $cell): ?>
        <th class="<?php print $cell['class']; ?>">
          <?php print $cell['data']; ?>
        </th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ((array) $rows as $row): ?>
      <tr>
        <?php foreach ($row as $cell): ?>
          <td id="<?php print $cell['id']; ?>" class="<?php print $cell['class']; ?>">
            <?php print $cell['data']; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div></div>

This is an alternative template for this style.

<?php
/**
 * @file
 * Template to display a view as a calendar day, grouped by time
 * and optionally organized into columns by a field value.
 * 
 * @see template_preprocess_calendar_day.
 *
 * $rows: The rendered data for this day.
 * $rows['date'] - the date for this day, formatted as YYYY-MM-DD.
 * $rows['datebox'] - the formatted datebox for this day.
 * $rows['empty'] - empty text for this day, if no items were found.
 * $rows['all_day'] - an array of formatted all day items.
 * $rows['items'] - an array of timed items for the day.
 * $rows['items'][$time_period]['hour'] - the formatted hour for a time period.
 * $rows['items'][$time_period]['ampm'] - the formatted ampm value, if any for a time period.
 * $rows['items'][$time_period][$column]['values'] - An array of formatted 
 *   items for a time period and field column.
 * 
 * $view: The view.
 * $columns: an array of column names.
 * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * 
 * The width of the columns is dynamically set using <col></col> 
 * based on the number of columns presented. The values passed in will
 * work to set the 'hour' column to 10% and split the remaining columns 
 * evenly over the remaining 90% of the table.
 */
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. $max_date_formatted);
?>
<div class="calendar-calendar"><div class="day-view">
<table class="full">
  <col width="<?php print $first_column_width?>"></col>
  <thead>
    <?php foreach ($columns as $column): ?>
    <col width="<?php print $column_width; ?>%"></col>
    <?php endforeach; ?>
    <tr>
      <th class="calendar-dayview-hour"><?php print $by_hour_count > 0 ? t('Time') : ''; ?></th>
      <?php foreach ($columns as $column): ?>
      <th class="calendar-agenda-items"><?php print $column; ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="<?php print $agenda_hour_class ?>">
         <span class="calendar-hour"><?php print $by_hour_count > 0 ? t('All day', array(), array('context' => 'datetime')) : ''; ?></span>
       </td>
      <?php foreach ($columns as $column): ?>
       <td class="calendar-agenda-items multi-day">
         <div class="calendar">
         <div class="inner">
           <?php print isset($rows['all_day'][$column]) ? implode($rows['all_day'][$column]) : '&nbsp;';?>
         </div>
         </div>
       </td>
      <?php endforeach; ?>   
    </tr>
    <?php foreach ($rows['items'] as $hour): ?>
    <tr>
      <td class="calendar-agenda-hour">
        <span class="calendar-hour"><?php print $hour['hour']; ?></span><span class="calendar-ampm"><?php print $hour['ampm']; ?></span>
      </td>
      <?php foreach ($columns as $column): ?>
        <td class="calendar-agenda-items single-day">
          <div class="calendar">
          <div class="inner">
            <?php print isset($hour['values'][$column]) ? implode($hour['values'][$column]) : '&nbsp;'; ?>
          </div>
          </div>
        </td>
      <?php endforeach; ?>   
    </tr>
   <?php endforeach; ?>   
  </tbody>
</table>
</div></div>

This is an alternative template for this style.

<?php
/**
 * @file
 * Template to display a view as a calendar week.
 * 
 * @see template_preprocess_calendar_week.
 *
 * $day_names: An array of the day of week names for the table header.
 * $rows: The rendered data for this week.
 * 
 * For each day of the week, you have:
 * $rows['date'] - the date for this day, formatted as YYYY-MM-DD.
 * $rows['datebox'] - the formatted datebox for this day.
 * $rows['empty'] - empty text for this day, if no items were found.
 * $rows['all_day'] - an array of formatted all day items.
 * $rows['items'] - an array of timed items for the day.
 * $rows['items'][$time_period]['hour'] - the formatted hour for a time period.
 * $rows['items'][$time_period]['ampm'] - the formatted ampm value, if any for a time period.
 * $rows['items'][$time_period]['values'] - An array of formatted items for a time period.
 * 
 * $view: The view.
 * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * 
 */
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. $max_date_formatted);
//dsm($rows);
//dsm($items);
$index = 0;
$header_ids = array();
foreach ($day_names as $key => $value) {
  $header_ids[$key] = $value['header_id'];
}
?>
<div class="calendar-calendar"><div class="week-view">
<table class="full">
  <thead>
    <tr>
      <?php if($by_hour_count > 0 || !empty($start_times)) :?>
      <th class="calendar-agenda-hour"><?php print t('Time')?></th>
      <?php endif;?>
      <?php foreach ($day_names as $cell): ?>
        <th class="<?php print $cell['class']; ?>" id="<?php print $cell['header_id']; ?>">
          <?php print $cell['data']; ?>
        </th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < $multiday_rows; $i++): ?>
    <?php 
      $colpos = 0; 
      $rowclass = "all-day";
      if( $i == 0) {
        $rowclass .= " first";
      }
      if( $i == $multiday_rows - 1) {
        $rowclass .= " last";
      }
    ?>
    <tr class="<?php print $rowclass?>">
      <?php if($i == 0 && ($by_hour_count > 0 || !empty($start_times))) :?>
      <td class="<?php print $agenda_hour_class ?>" rowspan="<?php print $multiday_rows?>">
        <span class="calendar-hour"><?php print t('All day', array(), array('context' => 'datetime'))?></span>
      </td>
      <?php endif; ?>
      <?php for($j = 0; $j < 6; $j++): ?>
        <?php $cell = (empty($all_day[$j][$i])) ? NULL : $all_day[$j][$i]; ?>
        <?php if($cell != NULL && $cell['filled'] && $cell['wday'] == $j): ?>
          <?php for($k = $colpos; $k < $cell['wday']; $k++) : ?>
          <td class="multi-day no-entry"><div class="inner">&nbsp;</div></td>
          <?php endfor;?>
          <td colspan="<?php print $cell['colspan']?>" class="multi-day">
            <div class="inner">
            <?php print $cell['entry']?>
            </div>
          </td>
          <?php $colpos = $cell['wday'] + $cell['colspan']; ?>
        <?php endif; ?>
      <?php endfor; ?>  
      <?php for($j = $colpos; $j < 7; $j++) : ?>
      <td class="multi-day no-entry"><div class="inner">&nbsp;</div></td>
      <?php endfor;?>
    </tr>
    <?php endfor; ?>  
    <?php foreach ($items as $time): ?>
    <tr class="not-all-day">
      <td class="calendar-agenda-hour">
        <span class="calendar-hour"><?php print $time['hour']; ?></span><span class="calendar-ampm"><?php print $time['ampm']; ?></span>
      </td>
      <?php $curpos = 0; ?>
      <?php foreach ($columns as $index => $column): ?>
        <?php $colpos = (isset($time['values'][$column][0])) ? $time['values'][$column][0]['wday'] : $index; ?>
        <?php for ($i = $curpos; $i < $colpos; $i++): ?>
        <td class="calendar-agenda-items single-day">
          <div class="calendar">
            <div class="inner">&nbsp</div>
          </div>
        </td>
        <?php endfor; ?>   
        <?php $curpos = $colpos + 1;?>
        <td class="calendar-agenda-items single-day" headers="<?php print $header_ids[$index] ?>">
          <div class="calendar">
          <div class="inner">
            <?php if(!empty($time['values'][$column])) :?>
              <?php foreach($time['values'][$column] as $item) :?>
                <?php print $item['entry'] ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          </div>
        </td>
      <?php endforeach; ?>   
      <?php for ($i = $curpos; $i < 7; $i++): ?>
        <td class="calendar-agenda-items single-day">
          <div class="calendar">
            <div class="inner">&nbsp</div>
          </div>
        </td>
      <?php endfor; ?>   
    </tr>
   <?php endforeach; ?>   
  </tbody>
</table>
</div></div>

This is an alternative template for this style.

<?php
/**
 * @file
 * Template to display a view as a calendar month.
 * 
 * @see template_preprocess_calendar_month.
 *
 * $day_names: An array of the day of week names for the table header.
 * $rows: An array of data for each day of the week.
 * $view: The view.
 * $calendar_links: Array of formatted links to other calendar displays - year, month, week, day.
 * $display_type: year, month, day, or week.
 * $block: Whether or not this calendar is in a block.
 * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $date_id: a css id that is unique for this date, 
 *   it is in the form: calendar-nid-field_name-delta
 * 
 */
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. $max_date_formatted);
?>
<div class="calendar-calendar"><div class="month-view">
<table class="full">
  <thead>
    <tr>
      <?php foreach ($day_names as $id => $cell): ?>
        <th class="<?php print $cell['class']; ?>" id="<?php print $cell['header_id'] ?>">
          <?php print $cell['data']; ?>
        </th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ((array) $rows as $row) {
        print $row['data'];
      } ?>
  </tbody>
</table>
</div></div>
<script>
try {
  // ie hack to make the single day row expand to available space
  if ($.browser.msie ) {
    var multiday_height = $('tr.multi-day')[0].clientHeight; // Height of a multi-day row
    $('tr[iehint]').each(function(index) {
      var iehint = this.getAttribute('iehint');
      // Add height of the multi day rows to the single day row - seems that 80% height works best
      var height = this.clientHeight + (multiday_height * .8 * iehint); 
      this.style.height = height + 'px';
    });
  }
}catch(e){
  // swallow 
}
</script>

This is an alternative template for this style.

<?php
/**
 * @file
 * Template to display a view as a calendar year.
 * 
 * @see template_preprocess_calendar_year.
 *
 * $view: The view.
 * $months: An array with a formatted month calendar for each month of the year.
 * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * 
 */
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. $max_date_formatted);
?>

<div class="calendar-calendar"><div class="year-view">
<table <?php if ($mini): ?> class="mini"<?php endif; ?>>
  <tbody>
    <tr><td><?php print $months[1] ?></td><td><?php print $months[2] ?></td><td><?php print $months[3] ?></td></tr>  
    <tr><td><?php print $months[4] ?></td><td><?php print $months[5] ?></td><td><?php print $months[6] ?></td></tr>  
    <tr><td><?php print $months[7] ?></td><td><?php print $months[8] ?></td><td><?php print $months[9] ?></td></tr>  
    <tr><td><?php print $months[10] ?></td><td><?php print $months[11] ?></td><td><?php print $months[12] ?></td></tr>  
  </tbody>
</table>
</div></div>

This is an alternative template for this style.

<?php
/**
 * @file
 * Template to display a view as a calendar day, grouped by time with overlapping items
 * 
 * @see template_preprocess_calendar_day.
 *
 * $rows: The rendered data for this day.
 * $rows['date'] - the date for this day, formatted as YYYY-MM-DD.
 * $rows['datebox'] - the formatted datebox for this day.
 * $rows['empty'] - empty text for this day, if no items were found.
 * $rows['all_day'] - an array of formatted all day items.
 * $rows['items'] - an array of timed items for the day.
 * $rows['items'][$time_period]['hour'] - the formatted hour for a time period.
 * $rows['items'][$time_period]['ampm'] - the formatted ampm value, if any for a time period.
 * $rows['items'][$time_period][$column]['values'] - An array of formatted 
 *   items for a time period and field column.
 * 
 * $view: The view.
 * $columns: an array of column names.
 * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * 
 * The width of the columns is dynamically set using <col></col> 
 * based on the number of columns presented. The values passed in will
 * work to set the 'hour' column to 10% and split the remaining columns 
 * evenly over the remaining 90% of the table.
 */
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. $max_date_formatted);
?>
<div class="calendar-calendar"><div class="day-view">
<div id="multi-day-container">
  <table class="full">
    <tbody>
      <tr class="holder">
        <td class="calendar-time-holder"></td>
        <td class="calendar-day-holder"></td>
      </tr>
      <tr>
        <td class="<?php print $agenda_hour_class ?> first">
           <span class="calendar-hour"><?php print t('All day', array(), array('context' => 'datetime')) ?></span>
        </td>
        <td class="calendar-agenda-items multi-day last">
          <?php foreach ($columns as $column): ?>
          <div class="calendar">
            <div class="inner">
             <?php print isset($rows['all_day'][$column]) ? implode($rows['all_day'][$column]) : '&nbsp;';?>
            </div>
          </div>
          <?php endforeach; ?>   
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="header-body-divider">&nbsp;</div>
<div id="single-day-container">
  <?php if (!empty($scroll_content)) : ?>
  <script>
    try {
  	  // Hide container while it renders...  Degrade w/o javascript support
      jQuery('#single-day-container').css('visibility','hidden');
    }catch(e){ 
      // swallow 
    }
  </script>
  <?php endif; ?>
  <table class="full">
    <tbody>
      <tr class="holder">
        <td class="calendar-time-holder"></td>
        <td class="calendar-day-holder"></td>
      </tr>
      <tr>
        <td class="first">
          <?php $is_first = TRUE; ?>
          <?php foreach ($rows['items'] as $time_cnt => $hour): ?>
            <?php 
              if ($time_cnt == 0) {
                $class = 'first ';
              }
              elseif ($time_cnt == count($start_times) - 1) {
                $class = 'last ';
              }
              else {
                $class = '';
              } ?>
            <div class="<?php print $class?>calendar-agenda-hour">
              <span class="calendar-hour"><?php print $hour['hour']; ?></span><span class="calendar-ampm"><?php print $hour['ampm']; ?></span>
            </div>
          <?php endforeach; ?>   
        </td>
        <td class="last">
          <?php foreach ($rows['items'] as $time_cnt => $hour): ?>
            <?php 
              if ($time_cnt == 0) {
                $class = 'first ';
              }
              elseif ($time_cnt == count($start_times) - 1) {
                $class = 'last ';
              }
              else {
                $class = '';
              } ?>
          <div class="<?php print $class?>calendar-agenda-items single-day">
            <div class="half-hour">&nbsp;</div>
            <?php if ($is_first && isset($hour['values'][$column])) :?>
            <div class="calendar item-wrapper first_item">
            <?php $is_first = FALSE; ?>
            <?php else : ?>
            <div class="calendar item-wrapper">
            <?php endif; ?>
              <div class="inner">
               <?php if (!empty($hour['values']) && is_array($hour['values']) && array_key_exists($column, $hour['values'])): ?>
                 <?php foreach ($hour['values'][$column] as $item): ?>
                   <?php print $item; ?>
                 <?php endforeach; ?>
               <?php else: ?>
                 <?php print '&nbsp;'; ?>
               <?php endif; ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>   
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="single-day-footer">&nbsp;</div>
</div></div>
<?php if (!empty($scroll_content)) : ?>
<script>
try {
  // Size and position the viewport inline so there are no delays
  calendar_resizeViewport(jQuery);
  calendar_scrollToFirst(jQuery);
  jQuery('#single-day-container').css('visibility','visible');
}catch(e){ 
  // swallow 
}
</script>
<?php endif; ?>

This is an alternative template for this style.

<?php
/**
 * @file
 * Template to display a view as a calendar week with overlapping items
 * 
 * @see template_preprocess_calendar_week.
 *
 * $day_names: An array of the day of week names for the table header.
 * $rows: The rendered data for this week.
 * 
 * For each day of the week, you have:
 * $rows['date'] - the date for this day, formatted as YYYY-MM-DD.
 * $rows['datebox'] - the formatted datebox for this day.
 * $rows['empty'] - empty text for this day, if no items were found.
 * $rows['all_day'] - an array of formatted all day items.
 * $rows['items'] - an array of timed items for the day.
 * $rows['items'][$time_period]['hour'] - the formatted hour for a time period.
 * $rows['items'][$time_period]['ampm'] - the formatted ampm value, if any for a time period.
 * $rows['items'][$time_period]['values'] - An array of formatted items for a time period.
 * 
 * $view: The view.
 * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * 
 */
$header_ids = array();
foreach ($day_names as $key => $value) {
  $header_ids[$key] = $value['header_id'];
}
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. $max_date_formatted);
?>

<div class="calendar-calendar"><div class="week-view">
  <div id="header-container">
  <table class="full">
  <tbody>
    <tr class="holder"><td class="calendar-time-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder margin-right"></td></tr>
    <tr>
      <th class="calendar-agenda-hour">&nbsp;</th>
      <?php foreach ($day_names as $cell): ?>
        <th class="<?php print $cell['class']; ?>" id="<?php print $cell['header_id']; ?>">
          <?php print $cell['data']; ?>
        </th>
      <?php endforeach; ?>
      <th class="calendar-day-holder margin-right"></th>
    </tr>
  </tbody>
  </table>
  </div>
  <div id="multi-day-container">
  <table class="full">
  <tbody>
  <tr class="holder"><td class="calendar-time-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td></tr>
    <?php for ($i = 0; $i < $multiday_rows; $i++): ?>
    <?php 
      $colpos = 0; 
      $rowclass = "all-day";
      if ($i == 0) {
        $rowclass .= " first";
      }
      if ($i == $multiday_rows - 1) {
        $rowclass .= " last";
      }
    ?>
    <tr class="<?php print $rowclass?>">
      <?php if($i == 0 && ($by_hour_count > 0 || !empty($start_times))) :?>
      <td class="<?php print $agenda_hour_class ?>" rowspan="<?php print $multiday_rows?>">
        <span class="calendar-hour"><?php print t('All day', array(), array('context' => 'datetime'))?></span>
      </td>
      <?php endif; ?>
      <?php for($j = 0; $j < 7; $j++): ?>
        <?php $cell = (empty($all_day[$j][$i])) ? NULL : $all_day[$j][$i]; ?>
        <?php if($cell != NULL && $cell['filled'] && $cell['wday'] == $j): ?>
          <?php for($colpos; $colpos < $cell['wday']; $colpos++) : ?>
          <?php 
            $colclass = "calendar-agenda-items multi-day";
            if ($colpos == 0) {
              $colclass .= " first";
            }
            if ($colpos == 6) {
              $colclass .= " last";
            }
          ?>
          <td class="<?php print $colclass?>"><div class="inner">&nbsp;</div></td>
          <?php endfor;?>
          <?php 
            $colclass = "calendar-agenda-items multi-day";
            if ($colpos == 0) {
              $colclass .= " first";
            }
            if ($colpos == 6) {
              $colclass .= " last";
            }
          ?>
          <td colspan="<?php print $cell['colspan']?>" class="<?php print $colclass?>">
            <div class="inner">
            <?php print $cell['entry']?>
            </div>
          </td>
          <?php $colpos += $cell['colspan']; ?>
        <?php endif; ?>
      <?php endfor; ?>  
      <?php while($colpos < 7) : ?>
      <?php 
        $colclass = "calendar-agenda-items multi-day no-entry";
        if ($colpos == 0) {
          $colclass .= " first";
        }
        if ($colpos == 6) {
          $colclass .= " last";
        }
      ?>
      <td class="<?php print $colclass?>"><div class="inner">&nbsp;</div></td>
      <?php $colpos++; ?>
      <?php endwhile;?>
    </tr>
    <?php endfor; ?>
    <?php if ($multiday_rows == 0) :?>
    <tr>
      <td class="<?php print $agenda_hour_class ?>">
        <span class="calendar-hour"><?php print t('All day', array(), array('context' => 'datetime'))?></span>
      </td>
      <?php for($j = 0; $j < 7; $j++): ?>
      <?php 
        $colclass = "calendar-agenda-items multi-day no-entry";
        if ($j == 0) {
          $colclass .= " first";
        }
        if ($j == 6) {
          $colclass .= " last";
        }
      ?>
      <td class="<?php print $colclass?>"><div class="inner">&nbsp;</div></td>
      <?php endfor; ?>
    </tr>
    <?php endif; ?>
    <tr class="expand">
      <td class="<?php print $agenda_hour_class ?>">
        <span class="calendar-hour">&nbsp;</span>
      </td>
      <?php for($j = 0; $j < 7; $j++): ?>
      <?php 
        $colclass = "calendar-agenda-items multi-day no-entry";
        if ($j == 0) {
          $colclass .= " first";
        }
        if ($j == 6) {
          $colclass .= " last";
        }
      ?>
      <td class="<?php print $colclass?>"><div class="inner">&nbsp;</div></td>
      <?php endfor; ?>
     </tr>
  </thead> 
  </table>
  </div>
  <div class="header-body-divider">&nbsp;</div>
  <div id="single-day-container">
    <?php if (!empty($scroll_content)) : ?>
    <script>
      try {
        // Hide container while it renders...  Degrade w/o javascript support
        jQuery('#single-day-container').css('visibility','hidden');
      }catch(e){ 
        // swallow 
      }
    </script>
    <?php endif; ?>
    <table class="full">
      <tbody>
        <tr class="holder"><td class="calendar-time-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td></tr>
        <tr>
          <?php for ($index = 0; $index < 8; $index++): ?>
          <?php if ($index == 0 ): ?>
          <td class="first" headers="<?php print $header_ids[$index]; ?>">
          <?php elseif ($index == 7 ) : ?>
          <td class="last"">
          <?php else : ?>
          <td headers="<?php print $header_ids[$index]; ?>">
          <?php endif; ?>
            <?php foreach ($start_times as $time_cnt => $start_time): ?>
              <?php 
                if ($time_cnt == 0) {
                  $class = 'first ';
                }
                elseif ($time_cnt == count($start_times) - 1) {
                  $class = 'last ';
                }
                else {
                  $class = '';
                } ?>
              <?php if( $index == 0 ): ?>
              <?php $time = $items[$start_time];?>
              <div class="<?php print $class?>calendar-agenda-hour">
                <span class="calendar-hour"><?php print $time['hour']; ?></span><span class="calendar-ampm"><?php print $time['ampm']; ?></span>
              </div>
              <?php else: ?>
              <div class="<?php print $class?>calendar-agenda-items single-day">
                <div class="half-hour">&nbsp;</div>
                <div class="calendar item-wrapper">
                  <div class="inner">
                    <?php if(!empty($items[$start_time]['values'][$index - 1])) :?>
                      <?php foreach($items[$start_time]['values'][$index - 1] as $item) :?>
                        <?php if (isset($item['is_first']) && $item['is_first']) :?>
                        <div class="item <?php print $item['class']?> first_item">
                        <?php else : ?>
                        <div class="item <?php print $item['class']?>">
                        <?php endif; ?>
                        <?php print $item['entry'] ?>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            <?php endforeach;?>
          </td>
          <?php endfor;?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="single-day-footer">&nbsp;</div>
</div></div>
<?php if (!empty($scroll_content)) : ?>
<script>
try {
  // Size and position the viewport inline so there are no delays
  calendar_resizeViewport(jQuery);
  calendar_scrollToFirst(jQuery);

  // Show it now that it is complete and positioned
  jQuery('#single-day-container').css('visibility','visible');
}catch(e){ 
  // swallow 
}
</script>
<?php endif; ?>
