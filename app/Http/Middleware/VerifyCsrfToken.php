<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
	/**
	 * The URIs that should be excluded from CSRF verification.
	 *
	 * @var array
	 */
	protected $except = [
		"/sadmin/check-current-pwd",
		"/sadmin/update-property-status",
		"/sadmin/update-category-status",
		"/sadmin/update-banner-status",
		"/sadmin/update-user-status",
		"/sadmin/update-page-status",
		"/sadmin/update-admin-status",
	];
}
