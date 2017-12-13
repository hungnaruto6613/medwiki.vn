<?php
function time_stamp($time)
{
	$time_difference = time() - $time;
	$seconds = $time_difference;
	$minutes = round($time_difference / 60);
	$hours = round($time_difference / 3600);
	$days = round($time_difference/86400);
	$weeks = round($time_difference / 604800);
	$months = round($time_difference / 2419200);
	$years = round($time_difference / 29030400);

	if($seconds<=30)
	{
		echo "mới đây";
	}
	else if($seconds<=60)
	{
		echo "$seconds giây trước";
	}
	else if($minutes <=60)
	{
		if($minutes ==1)
		{
			echo "1 phút trước";
		}
		else
		{
			echo "$minutes phút trước";
		}
	}
	else if($hours <=24)
	{
		if($hours == 1)
		{
			echo "1 giờ trước";
		}
		else
		{
			echo "$hours giờ trước";
		}
	}
	else if($days <=7)
	{
		if($days == 1)
		{
			echo "1 ngày trước";
		}
		else
		{
			echo "$days ngày trước";
		}
	}
	else if($weeks <=4)
	{
		if($weeks == 1)
		{
			echo "1 tuần trước";
		}
		else
		{
			echo "$weeks tuần trước";
		}
	}
	else if($months <=12)
	{
		if($months == 1)
		{
			echo "1 tháng trước";
		}
		else
		{
			echo "$months tháng trước";
		}
	}



}


?>