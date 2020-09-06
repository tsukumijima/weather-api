<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConvertDate extends Model
{

    // 西暦を和暦に変換する
    public static function convertGtJDate($src) {

        list($year, $month, $day) = explode('/', $src);

        // 月・日を0埋め
        $month = str_pad($month, 2, 0, STR_PAD_LEFT);
        $day = str_pad($day, 2, 0, STR_PAD_LEFT);

        // 日付が正しくない・1869年より前・年が4桁ではない・月が2桁ではない・日が2桁ではない
        if (!@checkdate($month, $day, $year) || $year < 1869 || strlen($year) !== 4 || strlen($month) !== 2 || strlen($day) !== 2) {
            return false;
        }

        $date = str_replace('/', '', $year.$month.$day);

        // 西暦年から元号を算出
        if ($date >= 20190501) {
            $gengo = '令和';
            $wayear = $year - 2018;
        }elseif ($date >= 19890108) {
            $gengo = '平成';
            $wayear = $year - 1988;
        } elseif ($date >= 19261225) {
            $gengo = '昭和';
            $wayear = $year - 1925;
        } elseif ($date >= 19120730) {
            $gengo = '大正';
            $wayear = $year - 1911;
        } else {
            $gengo = '明治';
            $wayear = $year - 1868;
        }

        switch ($wayear) {
            case 1:
                $wadate = $gengo.'元年'.$month.'月'.$day.'日';
                break;
            default:
                $wadate = $gengo.sprintf("%02d", $wayear).'年'.$month.'月'.$day.'日';
        }

        return $wadate;
    }


    // 和暦を西暦に変換する
    public static function convertJtGDate($src) {
        
        $number = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
        
        $gengo = mb_substr($src, 0, 2, 'UTF-8');
        array_unshift($number, $gengo);
        
        // 元号が 明治・大正・昭和・平成・令和 のいずれにもあてはまらない・数字を抜いたときに年月日か元年月日が含まれていない
        if (($gengo !== '明治' && $gengo !== '大正' && $gengo !== '昭和' && $gengo !== '平成'&& $gengo !== '令和')
                || (str_replace($number, '', $src) !== '年月日' && str_replace($number, '', $src) !== '元年月日')){
            return false;
        }

        $year = strtok(str_replace($gengo, '', $src), '年月日');
        $month = strtok('年月日');
        $day = strtok('年月日');
        
        // 元号から西暦年を算出
        if (mb_strpos($src, '元年') !== false) {
            $year = 1;
        }
        if ($gengo === '令和') {
            $year += 2018;
        } else if ($gengo === '平成') {
            $year += 1988;
        } else if ($gengo === '昭和') {
            $year += 1925;
        } else if ($gengo === '大正') {
            $year += 1911;
        } else if ($gengo === '明治') {
            $year += 1868;
        }

        // 月・日を0埋め
        $month = str_pad($month, 2, 0, STR_PAD_LEFT);
        $day = str_pad($day, 2, 0, STR_PAD_LEFT);

        // 日付が正しくない・年が4桁ではない・月が2桁ではない・日が2桁ではない
        if (!@checkdate($month, $day, $year) || strlen($year) !== 4 || strlen($month) !== 2 || strlen($day) !== 2){
            return false;
        }
        
        return $year.'/'.$month.'/'.$day;
    }
}
