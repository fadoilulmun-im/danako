<?php

return [
  'key_auth' => base64_encode(env('XENDIT_SECRET_KEY') . ':'),
  'url' => env('XENDIT_API_URL'),
];