<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {

    # Profile Route
    Route::group(['prefix' => 'history'], function () {
        Route::get('/', [App\Http\Controllers\Mobile\Profile\HistoryController::class, 'getHistory']);
    });

    Route::group(['prefix' => 'regional'], function () {
        Route::get('/', [App\Http\Controllers\Mobile\Profile\RegionalController::class, 'getRegional']);
    });

    Route::group(['prefix' => 'community'], function () {
        Route::get('/', [App\Http\Controllers\Mobile\Profile\CommunityController::class, 'getCommunity']);
    });

    Route::group(['prefix' => 'potention'], function () {
        Route::get('/', [App\Http\Controllers\Mobile\Profile\PotentionController::class, 'getPotention']);
    });

    Route::group(['prefix' => 'vission-mission'], function () {
        Route::get('/', [App\Http\Controllers\Mobile\Profile\VissionMissionController::class, 'getVissionMission']);
    });

    Route::group(['prefix' => 'staff'], function () {
        Route::get('/', [App\Http\Controllers\Mobile\Profile\StaffController::class, 'getStaff']);
    });

    Route::group(['prefix' => 'village'], function () {
        Route::get('/', [App\Http\Controllers\Mobile\Profile\VillageController::class, 'getVillages']);
    });

    Route::group(['prefix' => 'online-letter'], function () {

        Route::group(['prefix' => 'birth'], function () {
            Route::post('/', [App\Http\Controllers\Mobile\OnlineLetter\BirthController::class, 'send']);
        });

        Route::group(['prefix' => 'death'], function () {
            Route::post('/', [App\Http\Controllers\Mobile\OnlineLetter\DeathController::class, 'send']);
        });

        Route::group(['prefix' => 'domicile'], function () {
            Route::post('/', [App\Http\Controllers\Mobile\OnlineLetter\DomicileController::class, 'send']);
        });

        Route::group(['prefix' => 'incapacity'], function () {
            Route::post('/', [App\Http\Controllers\Mobile\OnlineLetter\IncapacityController::class, 'send']);
        });

        Route::group(['prefix' => 'income'], function () {
            Route::post('/', [App\Http\Controllers\Mobile\OnlineLetter\IncomeController::class, 'send']);
        });

        Route::group(['prefix' => 'marital-status'], function () {
            Route::post('/', [App\Http\Controllers\Mobile\OnlineLetter\MaritalStatusController::class, 'send']);
        });

        Route::group(['prefix' => 'parent-income'], function () {
            Route::post('/', [App\Http\Controllers\Mobile\OnlineLetter\ParentIncomeController::class, 'send']);
        });
    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('/', [App\Http\Controllers\Mobile\Publication\NewsController::class, 'findAll']);
        Route::get('/{slug}', [App\Http\Controllers\Mobile\Publication\NewsController::class, 'findBySlug']);
    });
});
