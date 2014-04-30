<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


function UCWord( $str )
{
		return ucwords(strtolower($str));
}

function UPWord( $str )
{
		return strtoupper($str);
}

function deleteSpecialChr($str , $limiter = 30)
{
	$str = strip_tags($str); // ตัด tag html
	$str = preg_replace('~[^a-z0-9ก-๙\.\-\_]~iu', " ", $str); // ตัดอักขระพิเศษ
	$str = strtolower($str); // ทำให้เป็นตัวพิมพ์เล็ก
	$str = trim($str); // ตัดช่องว่างหน้าและหลัง
	$str = @ereg_replace('[[:space:]]+', ' ', $str); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
	return ($limiter == 0)? $str : mb_substr($str, 0,$limiter);
}

function trimSpecial( $str )
{
	$str = trim($str); // ตัดช่องว่างหน้าและหลัง
	$str = @ereg_replace('[[:space:]]+', ' ', $str); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
	return $str;	
}

function trimCross( $str , $uc = true , $space = "-")
{
	$str = trim($str); // ตัดช่องว่างหน้าและหลัง
	$str = @ereg_replace('[[:space:]]+', ' ', $str); // ตัดช่วงว่างระหว่างคำให้เหลือแค่ 1 ช่อง
	
	if($uc){
		$str = ucwords(strtolower($str));
	} else {
		$str = strtolower($str);	
	}
	
	$str = str_replace(" ", $space , $str);	
	return $str;	
}

function chkDisclaimer( $str )
{
	$disclaimer = array('admin', 'administrator', 'mod', 'moderator', 'intendant', 'warden', 'attendant', 'custodian');
	
	foreach($disclaimer as $value){
		if($str == $value){
		    return true;		
		}
		else
		{
		    return false;
		}
	}
}

function dmy( $option = "day" )
{
    $year = date('Y');
    $start = round($year - 5);
    $stop = round($year - 55);
    
    switch ($option){
	case "day": for($i=1;$i<=31;$i++){ $result[$i] = $i; } break;
	case "month": for($i=1;$i<=12;$i++){ $result[$i] = $i;} break;
	case "year": for($i=$start;$i >= $stop;$i--){ $result[$i] = $i;} break;
    }
    
    return $result;
}

function getDMY( $timestamp , $dmy = 'd' )
{
    $time = idate($dmy, strtotime($timestamp));
    return ($time == 0)? 1: $time;
}

function national(  $option )
{
    $language = array('en'=>'English', 'fr'=>'French');
    $country = array('en'=>'English', 'fr'=>'French');
    
    switch( $option ){
	case "lang": foreach($language as $key => $value){ $result[$key] = $value; } break;
	case "country": foreach($country as $key => $value){ $result[$key] = $value; } break;
    }
    
     return $result;

}

//ฟังก์ชั่นสำหรับแบ่งข้อความเป็น Array (ปกติใช้ str_split() แต่สำหรับภาษาไทยแบบ UTF-8 จะมีปัญหาการแบ่ง)
// Convert a string to an array with multibyte string
function getMBStrSplit($string, $split_length = 1){
	mb_internal_encoding('UTF-8');
	mb_regex_encoding('UTF-8'); 
	
	$split_length = ($split_length <= 0) ? 1 : $split_length;
	$mb_strlen = mb_strlen($string, 'utf-8');
	$array = array();
	$i = 0; 
	
	while($i < $mb_strlen)
	{
		$array[] = mb_substr($string, $i, $split_length);
		$i = $i+$split_length;
	}
	
	return $array;
}

//ฟังก์ชั่นสำหรับหาความยาวของข้อความสำหรับภาษาไทยแบบ UTF-8 โดยจะไม่นับวรรณยุกต์หรือสระด้านบนกับด้านล่างข้อความ
// (ปกติใช้ strlen() แต่สำหรับภาษาไทยแบบ UTF-8 จะมีปัญหาการนับจำนวนที่เกิน และนับวรรณยุกต์หรือสระด้วย)
// Get string length for Character Thai
function getStrLenTH($string)
{
	$array = getMBStrSplit($string);
	$count = 0;
	
	foreach($array as $value)
	{
		$ascii = ord(iconv("UTF-8", "TIS-620", $value ));
		
		if( !( $ascii == 209 ||  ($ascii >= 212 && $ascii <= 218 ) || ($ascii >= 231 && $ascii <= 238 )) )
		{
			$count += 1;
		}
	}
	return $count;
}

//ฟังก์ชั่นสำหรับตัดตำแหน่งตัวอักษรที่ต้องการสำหรับภาษาไทยแบบ UTF-8 โดยจะนับตำแหน่งเฉพาะพยัญชนะ สระ อักขระพิเศษที่อยู่ในบรรทัด ไม่นับสระหรือวรรณยุกต์ ที่อยู่ด้านบนหรือล่างบรรทัด
//(ปกติใช้ strlen() แต่สำหรับภาษาไทยแบบนับจำนวนที่เกิน และนับสระหรือวรรณยุกต์ ที่อยู่ด้านบนหรือล่างบรรทัดด้วย ทำให้ข้อความสั้นกว่าข้อความที่เป็นภาษาอังกฤษ)
// Get part of string for Character Thai
function getSubStrTH($string, $start, $length)
{			
	$length = ($length+$start)-1;
	$array = getMBStrSplit($string);
	$count = 0;
	$return = "";
		
	for($i=$start; $i < count($array); $i++)
	{
		$ascii = ord(iconv("UTF-8", "TIS-620", $array[$i] ));
		
		if( $ascii == 209 ||  ($ascii >= 212 && $ascii <= 218 ) || ($ascii >= 231 && $ascii <= 238 ) )
		{
			//$start++;
			$length++;
		}
		
		if( $i >= $start )
		{
			$return .= $array[$i];
		}
		
		if( $i >= $length )
			break;
		}
	
	return $return;
}


