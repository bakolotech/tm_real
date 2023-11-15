<?php

namespace App\Http\Controllers;

use App\Models\NotificationConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class NotificationConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotificationConfig  $notificationConfig
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationConfig $notificationConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotificationConfig  $notificationConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(NotificationConfig $notificationConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotificationConfig  $notificationConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificationConfig $notificationConfig)
    {
        $request->validate(
            [
                'email_notification' => ['required', 'integer', Rule::in([0, 1])],
                'livraison_encours' => ['required', 'integer', Rule::in([0, 1])],
                'message_prive' => ['required', 'integer', Rule::in([0, 1])],
                'newslatter' => ['required', 'integer', Rule::in([0, 1])],
                'notification_bureau' => ['required', 'integer', Rule::in([0, 1])],
                'nouvelle_promo' => ['required', 'integer', Rule::in([0, 1])],
                'panier_plein' => ['required', 'integer', Rule::in([0, 1])],
                'success_achat' => ['required', 'integer', Rule::in([0, 1])]

            ]
        );

        $notificationConfig->email_notification = $request->get('email_notification');
        $notificationConfig->bureau_notification = $request->get('notification_bureau');
        $notificationConfig->achat_notification = $request->get('success_achat');
        $notificationConfig->livraison_notification = $request->get('livraison_encours');
        $notificationConfig->promotion_notification = $request->get('nouvelle_promo');
        $notificationConfig->message_notification = $request->get('message_prive');
        $notificationConfig->panier_plein_notification = $request->get('panier_plein');
        $notificationConfig->newslatter_notification = $request->get('newslatter');

        $notificationConfig->save();

        Auth::user()->refreshAuthUser();

        $data = [
            'error' => 0
        ];

        return response()->json([$data]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotificationConfig  $notificationConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationConfig $notificationConfig)
    {
        //
    }
}
