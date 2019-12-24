<?php

Auth::loginUsingId(1);

Route::get('/lists', 'AttendenceListController@index')->name('lists.index');
Route::get('/lists/create', 'AttendenceListController@create')->name('lists.create');
Route::post('/lists/create', 'AttendenceListController@store')->name('lists.store');

Route::post('/change-attendee-status', 'AttendeeStatusChangeController')->name('change-status');

Route::get('/dashboard', function () {
    return redirect('lists');
})->name('welcome');

Route::get('/audience', 'AttendeeController@index')->name('audience.index');
Route::get('/audience/create', 'AttendeeController@create')->name('audience.create');

Route::get('/settings', 'SettingsController@index')->name('settings.index');
