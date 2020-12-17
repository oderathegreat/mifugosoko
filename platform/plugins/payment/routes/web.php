<?php

Route::group(['namespace' => 'Botble\Payment\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(['prefix' => 'payments'], function () {
        Route::post('checkout', 'PaymentController@postCheckout')->name('payments.checkout');

        Route::get('status', 'PaymentController@getPayPalStatus')->name('payments.paypal.status');
    });

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'payments/methods', 'permission' => 'payment.index'], function () {
            Route::get('', [
                'as'         => 'payments.methods',
                'uses'       => 'PaymentController@methods',
            ]);

            Route::post('settings', [
                'as'         => 'payments.settings',
                'uses'       => 'PaymentController@updateSettings',
                'middleware' => 'preventDemo',
            ]);

            Route::post('', [
                'as'         => 'payments.methods.post',
                'uses'       => 'PaymentController@updateMethods',
                'middleware' => 'preventDemo',
            ]);

            Route::post('update-status', [
                'as'         => 'payments.methods.update.status',
                'uses'       => 'PaymentController@updateMethodStatus',
                'middleware' => 'preventDemo',
            ]);
        });

        Route::group(['prefix' => 'payments/transactions', 'as' => 'payment.'], function () {
            Route::group(['permission' => 'payment.index'], function () {
                Route::resource('', 'PaymentController')->parameters(['' => 'payment'])->only(['index', 'destroy']);
                Route::get('{chargeId}', 'PaymentController@show')->name('show');
                Route::put('{chargeId}', 'PaymentController@update')->name('update');
            });

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'PaymentController@deletes',
                'permission' => 'payment.destroy',
            ]);
        });

    });
});
