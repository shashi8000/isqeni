<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getPage')) {

  function getPage($var = '') {
    if ($var == "a1") {
      $result = "موظفين السفارة <br /> مجتمع";
    } else if ($var == "a2") {
      $result = "قسم العسكريين <br /> مجتمع";
    } else if ($var == "a3") {
      $result = "موفدين الدراسات العليا <br /> مجتمع";
    } else if ($var == "b1") {
      $result = "افراد <br /> خاص";
    } else if ($var == "b2") {
      $result = "شركات <br /> مجتمع";
    } else {
      $result = "";
    }
    return $result;
  }

}