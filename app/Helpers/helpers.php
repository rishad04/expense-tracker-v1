<?php

if (!function_exists('money_format_usd')) {
  function money_format_usd($amount)
  {
    return '$' . number_format($amount, 2);
  }
}


if (!function_exists('categoryColorClass')) {
  function categoryColorClass($category = null)
  {
    $map = [
      'transport' => 'bg-green-500',
      'food' => 'bg-orange-500',
      'shopping' => 'bg-blue-500',
      'other' => 'bg-purple-500',
    ];

    if ($category) {
      $key = strtolower($category);
      return $map[$key] ?? 'bg-gray-400'; // Fallback if category is not found
    }

    return $map;
  }
}
