<?php

namespace App\Traits;

use App\Models\Admin\Auditlog;
use Illuminate\Database\Eloquent\Model;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

trait UserJetstream
{
    use  HasApiTokens , HasProfilePhoto , TwoFactorAuthenticatable , Auditable;

    public static function bootUserJetstreamAttributes()
    {
        static::retrieved(function ($model) {
            // Agrega aquí los atributos adicionales que deseas ocultar
            $additionalHidden = ['two_factor_recovery_codes', 'two_factor_secret'];

            // Combina los atributos existentes con los adicionales y elimina duplicados
            $mergedHidden = array_unique(array_merge($model->hidden, $additionalHidden));

            // Actualiza la propiedad $hidden del modelo
            $model->hidden = $mergedHidden;

            // Agrega aquí los atributos adicionales que deseas castear
            $additionalHidden = ['email_verified_at', 'datetime'];

            // Combina los atributos existentes con los adicionales y elimina duplicados
            $mergedHidden = array_unique(array_merge($model->hidden, $additionalHidden));

            // Actualiza la propiedad $hidden del modelo
            $model->casts = $mergedHidden;
        });
    }
}
