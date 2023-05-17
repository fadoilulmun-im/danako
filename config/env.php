<?php

return [
  'app_name' => env('APP_NAME', 'Laravel'),
  'app_env' => env('APP_ENV', 'production'),
  'default_password' => env('DEFAULT_PASSWORD', '123456'),
  'role' => [
    'admin' => env('ROLE_ADMIN', 1),
    'user' => env('ROLE_USER', 2),
  ],
  'token_api_wa' => env('TOKEN_API_WA'),
  'category_medis' => env('CATEGORY_MEDIS', 1),
];

?>