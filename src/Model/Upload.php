<?php
namespace GoLaw\Model;

class Upload
{
    public static function execute($key)
    {
        if(isset($_FILES[$key]))
        {
            date_default_timezone_set("Brazil/East");
            
            $ext = strtolower(substr($_FILES[$key]['name'],-4));
            $new_name = date("Y.m.d-H.i.s") . $ext; 
            $dir = __DIR__ . '/../../public/uploads/'; 
            
            move_uploaded_file($_FILES[$key]['tmp_name'], $dir.$new_name);
            $_FILES[$key]['tmp_name'] = $new_name;
        }
    }
   
}