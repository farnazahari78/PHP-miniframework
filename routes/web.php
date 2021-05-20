<?php

\App\Facades\Route::get("/",[\App\Http\Controllers\homeController::class,'index'],
    \App\Http\Middlewares\homeSecurity::class
);

\App\Facades\Route::get("/about",[\App\Http\Controllers\aboutController::class,'index'],
    \App\Http\Middlewares\homeSecurity::class
);
\App\Facades\Route::get("/contact",[\App\Http\Controllers\contactController::class,'index'],

    \App\Http\Middlewares\homeSecurity::class
);
\App\Facades\Route::put("/contact",[\App\Http\Controllers\contactController::class,'store'],

    \App\Http\Middlewares\homeSecurity::class
);
\App\Facades\Route::get("/login",[\App\Http\Controllers\loginController::class,'index'],

    \App\Http\Middlewares\loginMiddleware::class
);

\App\Facades\Route::post("/login",[\App\Http\Controllers\loginController::class,'store'],

    \App\Http\Middlewares\homeSecurity::class
);

\App\Facades\Route::get("/dashboard",[\App\Http\Controllers\loginController::class,'show'],

    \App\Http\Middlewares\dashboardMiddleware::class
);

\App\Facades\Route::get("/logout",[\App\Http\Controllers\loginController::class,'delete'],

    \App\Http\Middlewares\homeSecurity::class
);