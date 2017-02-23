<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app;

/**
 * Description of Util
 *
 * @author ezaul.moreira
 */
class Util {

    public static function changekeyname($array, $newkey, $oldkey) {
        foreach ($array as $key => $value) {
            if (is_array($value))
                $array[$key] = changekeyname($value, $newkey, $oldkey);
            else {
                $array[$newkey] = $array[$oldkey];
            }
        }
        unset($array[$oldkey]);
        return $array;
    }

    public static function geraDataTimeStamp() {
        return date('Y-m-d H:i:s');
    }

    public static function geraData() {
        return date('d/m/Y');
    }

    public static function geraEstampaDeTempo() {
        return date('dmYHis');
    }

    public static function moedaBRLtoUSD($valor) {
        $busca = ['.', ','];
        $troca = ['', '.'];
        return str_replace($busca, $troca, $valor);
    }

    public static function moedaBancoToView($valor) {
        $busca = [','];
        $troca = ['.'];
        return str_replace($busca, $troca, $valor);
    }

    public static function encodeSEOString($string) {
        $string = preg_replace('`\[.*\]`U', '', $string);
        $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $string);
        $string = preg_replace(array("`[^a-z0-9]`i", "`[-]+`"), '-', $string);
        return strtolower(trim($string, '-'));
    }

    public static function urlDeRetorno($idtipodocumento) {
        $url = [4 => 'quatrienal/view',
            5 => 'anual/view',
            6 => 'anual/view'];

        return $url[$idtipodocumento];
    }

    public static function DataAMDtoDMA($data) {
        return implode('/', array_reverse(explode('-', $data)));
    }

    public static function DataPonto($data) {
        return implode('.', explode('/', $data));
    }

    public static function DataAno($data) {
        $arr_data = explode('/', $data);
        return $arr_data[2];
    }

    public static function DataDmaToAmd($data) {
        $arr_data = explode('/', $data);
        return $data = $arr_data[2] . '-' . $arr_data[1] . '-' . $arr_data[0];
    }

    public static function DataDmaToDma($data) {
        $arr_data = explode('/', $data);
        return $data = $arr_data[0] . '-' . $arr_data[1] . '-' . $arr_data[2];
    }

    public static function limpaArray($array) {
        foreach ($array as $valor) {
            array_pop($array);
        }
    }

}
