<?php   
    /**
   * Return the total number of weeks of a given month.
   * @param int $year
   * @param int $month
   * @param int $start_day_of_week (0=Sunday ... 6=Saturday)
   * @return int
   */
  function weeks_in_month($year, $month, $start_day_of_week)
  {
    // Total number of days in the given month.
    $num_of_days = date("t", mktime(0,0,0,$month,1,$year));
 
    // Count the number of times it hits $start_day_of_week.
    $num_of_weeks = 0;
    for($i=1; $i<=$num_of_days; $i++)
    {
      $day_of_week = date('w', mktime(0,0,0,$month,$i,$year));
      if($day_of_week==$start_day_of_week)
        $num_of_weeks++;
    }
 
    return $num_of_weeks;
  }

  function get_start_day_of_week($year, $month) {
    // Mencari di hari apa tgl 1 dimulai?
    // (0=Minggu ... 6=Sabtu)
    return date('w', mktime(0, 0, 0, $month, 1, $year));
  }

  function generate_dates_of_weeks_in_month($year, $month) {
    // Peraturan yg diberlakukan untuk dari mana awal mulai menghitung 
    // jumlah minggu dalam sebuah bulan adalah dengan ketergantungan dengan di hari apa
    // tgl 1 dimulai. 
    // (0=Minggu ... 6=Sabtu)
    // Contoh: Jika tgl 1 dimulai di hari jumat, maka jumat == 5 . 
    // maka nilai variabel $start_day_of_week = 5
    $start_day_of_week = get_start_day_of_week($year, $month);
    $number_of_weeks_in_month = weeks_in_month($year, $month, $start_day_of_week);

    // number of days in the given month
    $number_of_days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));

  }

  /*$date_you_want = "2016-03-31";
  $date_you_want2time = strtotime($date_you_want);
  $week_of_the_year = date('W', $date_you_want2time);
  $week_of_the_month = $week_of_the_year - date('W', strtotime('2016-04-03'));

  echo weeks_in_month(2016, 4, 5);
  echo "<br />";
  echo get_start_day_of_week(2016, 4);
  echo "<br />";
  echo $week_of_the_month;
echo "<br />";
  echo date('Y-m-d', strtotime('last monday'));*/

  echo date('W', strtotime('last monday'));
echo "<br />";
echo date('W');



/*
 * LAST WEEK DATE RANGE
*/
$monday = strtotime("last monday");
$monday = date('W', $monday)==date('W') ? $monday-7*86400 : $monday;

$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
$this_week_sd = date("Y-m-d",$monday);
$this_week_ed = date("Y-m-d",$sunday);

echo "Last week range from $this_week_sd to $this_week_ed ";
///////////////////////////////////////////////////////////////////////


/*
 * CURRENT WEEK DATE RANGE
*/
$monday = strtotime("last monday");
$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

$sunday = strtotime(date("Y-m-d",$monday)." +6 days");

$this_week_sd = date("Y-m-d",$monday);
$this_week_ed = date("Y-m-d",$sunday);

echo "Current week range from $this_week_sd to $this_week_ed ";
///////////////////////////////////////////////////////////////////////


/*
 * NEXT WEEK DATE RANGE
*/
$monday = strtotime("next monday");
$monday = date('W', $monday)==date('W') ? $monday-7*86400 : $monday;

$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
$this_week_sd = date("Y-m-d",$monday);
$this_week_ed = date("Y-m-d",$sunday);

echo "Next week range from $this_week_sd to $this_week_ed ";
/////////////////////////////////////////////////////////////////////