<?php
// Super Admin
//  Admin 
// Editor 
// Receptionist 
// Accounting 
// Monitor

/************************************************************************
                        redirect
 ************************************************************************/


function true_then_redirect($role)
{
    global $log_info;
    if ($log_info['Roles'] === $role) {
        redirect_to('403.php');
    }
}
/************************************************************************
                        hide
 ************************************************************************/


function true_then_display_none($role)
{
    global $log_info;
    if ($log_info['Roles'] === $role) {
        echo "style='display:none;'";
    }
}
function false_then_display_none($role)
{
    global $log_info;
    if (!($log_info['Roles'] === $role)) {
        echo "style='display:none;'";
    }
}
/************************************************************************
                        hash
 ************************************************************************/


function true_then_hash($role)
{
    global $log_info;
    if ($log_info['Roles'] === $role) {
        echo "#";
    }
}
/************************************************************************
                       Show title
 ************************************************************************/


function true_then_show_title($role)
{
    global $log_info;
    if ($log_info['Roles'] === $role) {
        echo "Access denied";
    }
}
/************************************************************************
                       Disabled
 ************************************************************************/


function true_then_disabled($role)
{
    global $log_info;
    if ($log_info['Roles'] === $role) {
        echo "disabled";
    }
}


/************************************************************************
                       return true
 ************************************************************************/


function return_true($role)
{
    global $log_info;
    if ($log_info['Roles'] === $role) {
        return true;
    }
}
