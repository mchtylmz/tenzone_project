<?php

use \App\Models\User;

/**
 * @param \App\Models\User $user
 * @param bool $name
 * @return string
 */
function dashboard(User $user, bool $name = false): string
{
    if ($user->hasAnyRole('superadmin', 'admin')) {
        $route = 'admin.dashboard';
    } elseif ($user->hasRole('parent')) {
        $route = 'parent.dashboard';
    } elseif ($user->hasRole('therapy')) {
        $route = 'therapy.dashboard';
    } elseif ($user->hasRole('user')) {
        $route = 'user.dashboard';
    }

    if ($name) {
        return $route ?? 'index';
    }
    return route($route ?? 'index');
}
