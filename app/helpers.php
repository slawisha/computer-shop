<?php

if ( !function_exists('is_admin') )
{
    function is_admin()
    {
        if ( \Auth::user()->role->name == 'admin' ) return true;

        return false;
    }
}

