<?php

namespace App\Enums;

enum Role:string
{
    case SUPERADMIN = 'superadmin';
    case ADMIN = 'admin';
    case VIEWER = 'viewer';
    case EMPLOYEE = 'employee';
    case SUPERIOR = 'superior';
}
