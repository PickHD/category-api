<?php

namespace App\Helpers;

function ResponseJSONHelper($message, $data, $status, $error)
{
  if ($status >= 400) {
    return response()->json([
      "error" => $error,
    ], $status);
  }

  return response()->json([
    "message"=> $message,
    "data"=> $data,
    "status"=> $status
  ], $status);
}
