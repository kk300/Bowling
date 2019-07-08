
﻿<div id="schedulecontents">
<br>
<font size="2">
<b>※スケジュールはブログなどからの転記です。<br>　最新の情報に追い付いていないこともありますのでご了承ください。</b>
</font>
<form name="form1" action="./index.php" method="get">
<?php
    $month = substr($_GET['category'], 8);
    echo '<input type="hidden" name="category" value="schedule' . $month . '">';
?>
<div>
<p id="namegrep">
<br>
選手名を選択すると、その選手のスケジュールのみを表示します。<br>
  <select name="player">
    <option value="-">(選手名)</option>
  </select>
<br>
<input type="submit" value="絞り込み"><br>
</p>
</div>
</form>

<?php
    $month = substr($_GET['category'], 10);
    if ($month[0] == '0') {
        $month = substr($month, 1);
    }
    echo '<h3 id="schedule-top">' . $month . '月のスケジュール</h3>';
?>
<div align="center">
<?php
    $year = substr($_GET['category'], 8, 2);
    $bYear = $year;
    $aYear = $year;
    $bMonth = $month - 1;
    $aMonth = $month + 1;
    if ($bMonth == '0') {
        $bMmonth = '12';
        $bYear = $bYear - 1;
    }
    if ($aMonth == '13') {
        $aMonth = '1';
        $aYear = $aYear + 1;
    }
    $bMonthzero = $bMonth;
    $aMonthzero = $aMonth;
    if (strlen($bMonthzero) == 1) {
        $bMonthzero = '0' . $bMonthzero;
    }
    if (strlen($aMonthzero) == 1) {
        $aMonthzero = '0' . $aMonthzero;
    }
    if (file_exists('./schedule' . $bYear . $bMonthzero . '.json' ) == TRUE) {
        echo '<a href="./index.php?category=schedule' . $bYear . $bMonthzero . '">' . $bYear . '年' . $bMonth . '月<<</a>　　　　　';
    }
    else {
        echo $bYear . '年' . $bMonth . '月<<　　　　　';
    }
    if (file_exists('./schedule' . $aYear . $aMonthzero . '.json' ) == TRUE) {
        echo '<a href="./index.php?category=schedule' . $aYear . $aMonthzero . '">>>' . $aYear . '年' . $aMonth . '月</a>　　　　';
    }
    else {
        echo '>>' . $aYear . '年' . $aMonth . '月';
    }
?>
</div>
<table id="tbl" class="table class">
  <tbody>
    <tr><th class="score">日</th><th class="score">スケジュール</th></tr>
  </tbody>
</table>
</div>

