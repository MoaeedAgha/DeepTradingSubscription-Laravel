<?php

function getStocks($ids) {
    $str = '';
    $ids = explode(',', $ids);
    $stocks = \App\Stock::whereIn('id', $ids)->get();
    if($stocks) {
        foreach ($stocks as $s) {
            $str .= $s->Ticker.', ';
        }
        $str = rtrim($str, ', ');
    }
    return $str;
}
