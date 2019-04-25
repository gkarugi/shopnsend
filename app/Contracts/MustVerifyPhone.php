<?php

namespace App\Contracts;

interface MustVerifyPhone
{
    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedPhone();

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markPhoneAsVerified();

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendPhoneVerificationNotification();
}
