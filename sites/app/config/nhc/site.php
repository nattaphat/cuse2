<?php
/**
 * Path to the 'app' folder
 */
// app_path();// /Library/WebServer/Documents/lv_nhc/sites/app
/**
 * Path to the project's root folder
 */
// base_path(); // /Library/WebServer/Documents/lv_nhc/sites
/**
 * Path to the 'public' folder
 */
// public_path();// /Library/WebServer/Documents/lv_nhc/sites/public
/**
 * Path to the 'app/storage' folder
 */
// storage_path();// /Library/WebServer/Documents/lv_nhc/sites/app/storage

return array(
    /**
     * Package URI
     *
     * @type string
     */    
    'asset_url' => Request::root()."/packages/",
    'policy_perpage' => 3,
    'role_perpage' => 10,
    'data_perpage' => 6,
    'action_perpage' => 6,
    'purpose_perpage' => 6,
    'obligation_perpage' => 6,
    'condition_perpage' => 6,
    'perpage' => 10,
    'perpage_datalist' => 20,
    'perpage_training'=>6,
    'debug_db'=>true, //set data mode
    'debug'=> array(
                'rainfall24h_date'=>'2013-10-08',
                'rainfall_today_date'=>'2013-10-08',
                'rainfall_yesterday_date'=>'2013-10-07',
                'rainfall_date'=>'2013-10-08',
                'wl_tele_date'=>'2013-10-01',
                'dam_date'=>'2013-10-08',
                'solar_date'=>'2013-10-08',
                'humid_date'=>'2013-10-08',
                'pressure_date'=>'2013-10-08',
                'temp_date'=>'2013-10-08'
                ),
    'debug_data'=>true,
    'download_paht'=>app_path().'/downloads/',
    //'download_paht'=>'/tmp/',
    'init_privacy' => array(
                'fname' => true,
                'lname' => false,
                'email' => false,
                'telno' => false,
                'agency' => false,
                'ministry' => false,
                'role' => false
        )
    );