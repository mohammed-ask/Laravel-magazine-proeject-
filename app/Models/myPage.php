<?php

namespace App\Models;


class myPage
{
    public function make_links($url,$curpage,$butno=2){
        
        $curpage = $curpage ? (int)$curpage : 1;
        $start = $curpage - $butno;
        $end = $curpage + $butno;
        if($start < 1){$start = 1;}

        $buttons = array();
        $buttons[]= [
            'First',
            preg_replace('/page=[0-9]+/','page=1',$url),
            0]
            ;

         $num = $curpage+1;   
        for($i=$start;$i<=$end;$i++){
            if($i == 1){continue;}
            $myurl = preg_replace('/page=[0-9]+/','page='.$i,$url);
            $active = 0;
            if($i == $curpage){$active = 1;}
            $buttons[] = [$i,$myurl,$active];
            $num = $i;
        }
        $buttons[]= [
            'Next',
            preg_replace('/page=[0-9]+/','page='.($num + $butno),$url),
             0]
        ;
        return $buttons;
    }
}