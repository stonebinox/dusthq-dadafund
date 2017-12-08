<?php
/*------------------------------------
Author: Anoop Santhanam
Date created: 6/12/17 11:44
Last modified: 6/12/17 11:44
Comments: Main class file admin_master
table.
------------------------------------*/
class adminMaster
{
    public $app=NULL;
    private $admin_id=NULL;
    public $adminValid=false;
    function __construct($adminID=NULL)
    {
        $this->app=$GLOBALS['app'];
        if($adminID!=NULL)
        {
            $this->admin_id=addslashes(htmlentities($adminID));
            $this->adminFlag=$this->verifyAdmin();
        }
    }
    function verifyAdmin()
    {
        if($this->admin_id!=NULL)
        {
            $app=$this->app;
            $adminID=$this->admin_id;
            echo $adminID.'<br>';
            $am="SELECT idadmin_master FROM admin_master WHERE stat='1' AND idadmin_master='$adminID'";
            $am=$app['db']->fetchAssoc($am);
            if(($am!="")&&($am!=NULL))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}
?>