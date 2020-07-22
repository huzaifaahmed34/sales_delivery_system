<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'admin/UpdateOrders','admin/UpdateCylinderOrders','admin/Update2CMachine',
'admin/Update4CMachine',
'admin/Update6CMachine',
'admin/Update8CMachine',
'admin/UpdateLamSMachine',
'admin/UpdateLamBMachine',
'admin/UpdateFlexoSMachine',
'admin/UpdateFlexoBMachine'
    ];
}
