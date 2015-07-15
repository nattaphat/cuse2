<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Language Route */
Route::get('lang/{lang}',array(
	'as'=>'language',
 	'uses'=>'LanguageController@setLang'
));

/*Authication Route Section */
Route::get('/',array(
	'as'=>'home',
 	'uses'=>'AuthController@showLoginfrm'
));

Route::get('/login', array(
	'as'=>'login',
	'uses'=>'AuthController@showLoginfrm'
));

Route::post('/loginaction', array(
	'as' => 'loginaction',
	'uses' => 'AuthController@loginAction'
));

Route::get('/logout', array(
	'as' => 'logout',
	'uses' => 'AuthController@logoutAction'
));

Route::get('/register', array(
	'as' => 'regis',
	'uses' => 'AuthController@registerFrmAction'
));

Route::post('/register/action', array(
	'as' => 'regisaction',
	'uses' => 'AuthController@registerAction'
));

Route::get('/resetpassword', array(
	'as' => 'resetpwdfrm',
	'uses' => 'AuthController@resetpwdFrmAction'
));

Route::post('/resetpassword', array(
	'as' => 'pwdremind',
	'uses' => 'AuthController@remindpwdAction'
));

Route::get('password/reset/{token}', function($token)
{
    return View::make('auth.reset')->with('token', $token);
});

Route::post('password/reset/{token}', array(
//Route::post('password/reset/', array(
	'as' => 'resetpwd',
	'uses' => 'AuthController@resetpwdAction'
));

Route::get('/admin', array(
	'before'=>'auth',
	'as' => 'admin',
	'uses' => 'AdminController@showWelcome'
));


/*Policy Route Section */
Route::get('/policy-content', array(
	'before'=>'auth',
	'as' => 'policy',
	'uses' => 'PolicyController@policyAction'
));

Route::get('/policy-add', array(
	'before'=>'auth_superadmin',
	'as' => 'policyadd',
	'uses' => 'PolicyController@policyAddAction'
));

Route::post('/policy-save', array(
	'before'=>'auth_superadmin',
	'as' => 'policysave',
	'uses' => 'PolicyController@policySaveAction'
));

Route::get('/policy-show/{id?}', array(
	'before'=>'auth',
	'as' => 'policyshow',
	'uses' => 'PolicyController@policyShowAction'
))
->where('id', '[0-9]+');

Route::get('/policy-del/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'policydel',
	'uses' => 'PolicyController@policyDelAction'
))
->where('id', '[0-9]+');

Route::post('/policy-edit/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyedit',
	'uses' => 'PolicyController@policyEditAction'
));

Route::get('/policy-search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'policysearch',
	'uses' => 'PolicyController@policySearchAction'
));

Route::get('/policyduty/userinfo/{id}', array(
	'before'=>'auth',
	'as' => 'policyduty_userinfo',
	'uses' => 'PolicyController@policyDutyUserinfo'
));

Route::get('/policyduty/add', array(
	'before'=>'auth_superadmin',
	'as' => 'policyduty_add',
	'uses' => 'PolicyController@policyDutyAdd'
));

Route::get('/policyduty/list', array(
	'before'=>'auth_superadmin',
	'as' => 'policyduty_list',
	'uses' => 'PolicyController@policyDutyList'
));

Route::post('/policyduty/save', array(
	'before'=>'auth_superadmin',
	'as' => 'policyduty_save',
	'uses' => 'PolicyController@policyDutySave'
));

Route::get('/policyduty/edit/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyduty_edit',
	'uses' => 'PolicyController@policyDutyEdit'
));

Route::post('/policyduty/edited/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyduty_edited',
	'uses' => 'PolicyController@policyDutyEdited'
));

Route::get('/policyduty/del/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyduty_del',
	'uses' => 'PolicyController@policyDutyDel'
));

Route::get('/policyduty/search/{keyword}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyduty_search',
	'uses' => 'PolicyController@policyDutySearch'
));

/*PbD-IA*/
Route::get('/pbdiapolicy/{id?}', array(
	'before'=>'auth',
	'as' => 'pbaid_policy',
	'uses' => 'PbdiaController@pbdiaPolicy'
));
Route::get('/pbdia', array(
	'before'=>'auth',
	'as' => 'pbaid',
	'uses' => 'PbdiaController@pbdiaAll'
));

/*RBAC Route Section */
Route::get('/policy-rbac/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyrbac',
	'uses' => 'PolicyController@policyRBACAction'
))
->where('id', '[0-9]+');

//use when login in user or admin
Route::get('/policy-rbac/user/{id?}', array(
	'before'=>'auth',
	'as' => 'policyrbac_user',
	'uses' => 'PolicyController@policyRBACUser'
))
->where('id', '[0-9]+');

Route::post('/policy-rbac/save/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyrbac_save',
	'uses' => 'PolicyController@policyRBACSaveAction'
))
->where('id', '[0-9]+');

Route::get('/policy-rbac/edit/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyrbac_edit',
	'uses' => 'PolicyController@policyRBACEditFrmAction'
))
->where('id', '[0-9]+');

Route::post('/policy-rbac/edited/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyrbac_saveedit',
	'uses' => 'PolicyController@policyRBACEditedAction'
))
->where('id', '[0-9]+');

Route::get('/policy-rbac/del/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'policyrbac_del',
	'uses' => 'PolicyController@policyRBACDelAction'
))
->where('id', '[0-9]+');

Route::get('/policy-rbac/rolelist', array(
	'before'=>'auth',
	'as' => 'rolelist',
	'uses' => 'PolicyController@listRoleFrm'
));

Route::get('/policy-rbac/rolelist/search/{roleid}', array(
	'before'=>'auth',
	'as' => 'rolelistsearch',
	'uses' => 'PolicyController@getListRole'
));

Route::get('/policy-rbac/datalist', array(
	'before'=>'auth',
	'as' => 'datalist',
	'uses' => 'PolicyController@listDataFrm'
));

Route::get('/policy-rbac/datalist/search/{tablename}', array(
	'before'=>'auth',
	'as' => 'datalistsearch',
	'uses' => 'PolicyController@getDataList'
));


/*Rolebased Route Section */
/*Role Route Section */
Route::get('/role', array(
	'before'=>'auth',
	'as' => 'roleshow',
	'uses' => 'RoleController@showRoleAction'
));

Route::get('/role-add', array(
	'before'=>'auth_superadmin',
	'as' => 'roleadd',
	'uses' => 'RoleController@addRoleAction'
));

Route::get('/role-search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'rolesearch',
	'uses' => 'RoleController@roleSearchAction'
));

Route::get('/role-edit/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'roleedit',
	'uses' => 'RoleController@editRoleAction'
));

Route::post('/role-save', array(
	'before'=>'auth_superadmin',
	'as' => 'rolesave',
	'uses' => 'RoleController@saveRoleAction'
));

Route::post('/role-edited/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'roleedited',
	'uses' => 'RoleController@editedRoleAction'
));

Route::get('/role-del/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'roledel',
	'uses' => 'RoleController@delRoleAction'
));

/*Data Route Section */
Route::get('/data', array(
	'before'=>'auth',
	'as' => 'datashow',
	'uses' => 'DataController@showDataAction'
));

Route::get('/data-add', array(
	'before'=>'auth_superadmin',
	'as' => 'dataadd',
	'uses' => 'DataController@addDataAction'
));

Route::get('/data-search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'datasearch',
	'uses' => 'DataController@searchDataAction'
));

Route::get('/data-edit/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'dataedit',
	'uses' => 'DataController@editDataAction'
));

Route::post('/data-save', array(
	'before'=>'auth_superadmin',
	'as' => 'datasave',
	'uses' => 'DataController@saveDataAction'
));

Route::post('/data-edited/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'dataedited',
	'uses' => 'DataController@editedDataAction'
));

Route::get('/data-del/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'datadel',
	'uses' => 'DataController@delDataAction'
));

Route::get('/data-agency/{type}', array(
	'before'=>'auth',
	'as' => 'dataagency',
	'uses' => 'DataController@testDataAgency'
));

/*Action Route Section */
Route::get('/action', array(
	'before'=>'auth',
	'as' => 'actionshow',
	'uses' => 'ActionController@showAction'
));

Route::get('/action-add', array(
	'before'=>'auth_superadmin',
	'as' => 'actionadd',
	'uses' => 'ActionController@addAction'
));

Route::get('/action-search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'actionsearch',
	'uses' => 'ActionController@searchAction'
));

Route::get('/action-edit/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'actionedit',
	'uses' => 'ActionController@editAction'
));

Route::post('/action-save', array(
	'before'=>'auth_superadmin',
	'as' => 'action_save',
	'uses' => 'ActionController@saveAction'
));

Route::post('/action-edited/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'actionedited',
	'uses' => 'ActionController@editedAction'
));

Route::get('/action-del/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'datadel',
	'uses' => 'ActionController@delAction'
));


/*Condition Route Section */
Route::get('/condition', array(
	'before'=>'auth',
	'as' => 'conditionshow',
	'uses' => 'ConditionController@showAction'
));

Route::get('/condition-add', array(
	'before'=>'auth_superadmin',
	'as' => 'conditionadd',
	'uses' => 'ConditionController@addAction'
));

Route::get('/condition-search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'conditionsearch',
	'uses' => 'ConditionController@searchAction'
));

Route::get('/condition-edit/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'conditionedit',
	'uses' => 'ConditionController@editAction'
));

Route::post('/condition-save', array(
	'before'=>'auth_superadmin',
	'as' => 'conditionsave',
	'uses' => 'ConditionController@saveAction'
));

Route::post('/condition-edited/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'conditionedited',
	'uses' => 'ConditionController@editedAction'
));

Route::get('/condition-del/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'conditiondel',
	'uses' => 'ConditionController@delAction'
));


/*Obligation Route Section */
Route::get('/obligation', array(
	'before'=>'auth',
	'as' => 'obligationshow',
	'uses' => 'ObligationController@showAction'
));

Route::get('/obligation-add', array(
	'before'=>'auth_superadmin',
	'as' => 'obligationadd',
	'uses' => 'ObligationController@addAction'
));

Route::get('/obligation-search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'obligationsearch',
	'uses' => 'ObligationController@searchAction'
));

Route::get('/obligation-edit/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'obligationedit',
	'uses' => 'ObligationController@editAction'
));

Route::post('/obligation-save', array(
	'before'=>'auth_superadmin',
	'as' => 'obligationsave',
	'uses' => 'ObligationController@saveAction'
));

Route::post('/obligation-edited/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'obligationedited',
	'uses' => 'ObligationController@editedAction'
));

Route::get('/obligation-del/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'obligationdel',
	'uses' => 'ObligationController@delAction'
));

/*Purpose Route Section */
Route::get('/purpose', array(
	'before'=>'auth',
	'as' => 'purposeshow',
	'uses' => 'PurposeController@showAction'
));

Route::get('/purpose-add', array(
	'before'=>'auth_superadmin',
	'as' => 'purposeadd',
	'uses' => 'PurposeController@addAction'
));

Route::get('/purpose-search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'purposesearch',
	'uses' => 'PurposeController@searchAction'
));

Route::get('/purpose-edit/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'purposeedit',
	'uses' => 'PurposeController@editAction'
));

Route::post('/purpose-save', array(
	'before'=>'auth_superadmin',
	'as' => 'purposesave',
	'uses' => 'PurposeController@saveAction'
));

Route::post('/purpose-edited/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'purposeedited',
	'uses' => 'PurposeController@editedAction'
));

Route::get('/purpose-del/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'purposedel',
	'uses' => 'PurposeController@delAction'
));

/*User List Route Section */
Route::get('/userlist', array(
	'before'=>'auth',
	'as' => 'userlist',
	'uses' => 'UsernhcController@userList'
));

Route::get('/userlist/approval/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'user_approval',
	'uses' => 'UsernhcController@userInfo'
));

Route::post('/userlist/approval/save/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'user_approval_save',
	'uses' => 'UsernhcController@userApprovalSave'
));

Route::get('/userlist-search/{keyword?}', array(
	'before'=>'auth_superadmin',
	'as' => 'userlistsesearch',
	'uses' => 'UsernhcController@searchAction'
));

Route::get('/userlist-del/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'userlistdel',
	'uses' => 'UsernhcController@userDeleteAction'
));

/*-----------------------------User*/
Route::get('/user/account/{id}', array(
	'before'=>'auth',
	'as' => 'useraccount',
	'uses' => 'UsernhcController@accountInfo'
));

Route::post('/user/account/save/{id}', array(
	'before'=>'auth',
	'as' => 'useraccount_save',
	'uses' => 'UsernhcController@saveUpdateAccount'
));

Route::get('/user/account/security/{id}', array(
	'before'=>'auth',
	'as' => 'usersecurity',
	'uses' => 'UsernhcController@userSecurityFrm'
));

Route::get('/user/account/role/{id}', array(
	'before'=>'auth',
	'as' => 'user_getrole',
	'uses' => 'UsernhcController@getRole'
));

Route::post('/user/account/security/save/{id}', array(
	'before'=>'auth',
	'as' => 'usersecuritysave',
	'uses' => 'UsernhcController@userChangePassword'
));

/*Agency Section*/
Route::get('/agency', array(
	'before'=>'auth',
	'as' => 'agency',
	'uses' => 'AgencyController@agencyList'
));

Route::get('/agencydata', array(
	'before'=>'auth',
	'as' => 'agencydata',
	'uses' => 'AgencyController@agencyData'
));

Route::get('/agencydata/{id}', array(
	'before'=>'auth',
	'as' => 'agencydata_id',
	'uses' => 'AgencyController@agencyDataByAgencyId'
));

Route::get('/agencydata/form/add', array(
	'before'=>'auth',
	'as' => 'agencydata_add',
	'uses' => 'AgencyController@agencyDataFormAdd'
));

Route::post('/agencydata/form/save', array(
	'before'=>'auth',
	'as' => 'agencydata_save',
	'uses' => 'AgencyController@agencyDataAdd'
));

Route::get('/agency/add/{flag?}', array(
	'before'=>'auth',
	'as' => 'agency_add',
	'uses' => 'AgencyController@agencyAdd'
));

Route::post('/agency/add/{flag?}', array(
	'before'=>'auth',
	'as' => 'agency_add',
	'uses' => 'AgencyController@agencyAdd'
));

Route::get('/agency/edit/{id}', array(
	'before'=>'auth',
	'as' => 'agency_edit',
	'uses' => 'AgencyController@agencyEdit'
));

Route::get('/agency/del/{id}', array(
	'before'=>'auth',
	'as' => 'agency_del',
	'uses' => 'AgencyController@agencyDel'
));

Route::get('/agency/department/{ministry_id}', array(
	'before'=>'auth',
	'as' => 'agency_dempartment',
	'uses' => 'AgencyController@getDepartment'
));

/*Privacy Route Section */
Route::get('/privacy/{id}', array(
	'before'=>'auth',
	'as' => 'privacy',
	'uses' => 'PrivacyController@privacyFrm'
));

Route::get('/privacy/search/{privacytype}', array(
	'before'=>'auth',
	'as' => 'privacy_search',
	'uses' => 'PrivacyController@privacyInitList'
));

Route::get('/privacy-add', array(
	'before'=>'auth_superadmin',
	'as' => 'privacy_add',
	'uses' => 'PrivacyController@privacyAddFrm'
));

Route::get('/privacy-edit/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'privacy_edit',
	'uses' => 'PrivacyController@privacyEditFrm'
));

Route::post('/privacy-save', array(
	'before'=>'auth_superadmin',
	'as' => 'privacy_save',
	'uses' => 'PrivacyController@privacySave'
));

Route::get('/privacy-del/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'privacy_del',
	'uses' => 'PrivacyController@privacyDelete'
));


Route::post('/privacy-edited/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'privacy_edited',
	'uses' => 'PrivacyController@privacyEdited'
));

Route::post('/privacy/user/{id}', array(
	'before'=>'auth',
	'as' => 'privacyuser',
	'uses' => 'PrivacyController@privacyUserSave'
));

Route::post('/privacy/data/{agency_id}/{user_id}', array(
	'before'=>'auth',
	'as' => 'privacydata',
	'uses' => 'PrivacyController@privacyDataSave'
));

/*Retain Route Section */
Route::post('/retain/data/save', array(
	'before'=>'auth_superadmin',
	'as' => 'save_retain',
	'uses' => 'PrivacyController@retainDataSave'
));

Route::get('/retain/search/', array(
	'before'=>'auth_superadmin',
	'as' => 'search_retain',
	'uses' => 'PrivacyController@retainSearch'
));


/*Peer Route Section */
Route::get('/peer/role', array(
	'before'=>'auth',
	'as' => 'peer_role',
	'uses' => 'PeerController@peerRoleFrm'
));

Route::get('/peer/agency', array(
	'before'=>'auth',
	'as' => 'peer_agency',
	'uses' => 'PeerController@peerAgencyFrm'
));

Route::get('/peer/agencylist/{agencyid}', array(
	'before'=>'auth',
	'as' => 'peer_agencylist',
	'uses' => 'PeerController@peerAgencyList'
));

Route::get('/peer/rolelist/{roleid}', array(
	'before'=>'auth',
	'as' => 'peer_rolelist',
	'uses' => 'PeerController@peerRoleList'
));

Route::get('/peer/userprivacy/{userid}', array(
	'before'=>'auth',
	'as' => 'peer_userprivacy',
	'uses' => 'PeerController@userPeerPrivacy'
));

Route::get('/peer/data', array(
	'before'=>'auth',
	'as' => 'peer_data',
	'uses' => 'PeerController@peerDataFrm'
));

Route::get('/peer/datalist/{dataid}', array(
	'before'=>'auth',
	'as' => 'peer_datalist',
	'uses' => 'PeerController@peerDataList'
));

Route::get('/peer/dataprivacy/{agencyid}', array(
	'before'=>'auth',
	'as' => 'peer_dataprivacy',
	'uses' => 'PeerController@dataPeerPrivacy'
));

/*Usage Route Section */
Route::get('/usage', array(
	'before'=>'auth_superadmin',
	'as' => 'usage',
	'uses' => 'UsageController@usageAction'
));

Route::get('/usage/chart/role', array(
	'before'=>'auth_superadmin',
	'as' => 'role_chart',
	'uses' => 'UsageController@usageRoleChart'
));

Route::get('/usage/chart/data', array(
	'before'=>'auth_superadmin',
	'as' => 'data_chart',
	'uses' => 'UsageController@usageDataChart'
));

/*Report Route Section */
Route::get('/report', array(
	'before'=>'auth_superadmin',
	'as' => 'usage',
	'uses' => 'ReportController@getReport'
));

Route::get('/report/log/export/{type}/{startdt}/{enddt}', array(
	'before'=>'auth_superadmin',
	'as' => 'logreport_export',
	'uses' => 'ReportController@logsReport'
));

Route::get('/report-search/{type}/{startdt}/{enddt}', array(
	'before'=>'auth',
	'as' => 'report_search',
	'uses' => 'ReportController@getSearchReport'
));



/*Query data Route Section */
Route::get('/querydata', array(
	'before'=>'auth',
	'as' => 'querydata',
	'uses' => 'QueryDataController@queryFrmAction'
));

Route::get('/querydata/get/{data_id?}/{cond_id}/{flag}/{agency_id}', array(
	'before'=>'auth',
	'as' => 'querydata_get',
	'uses' => 'QueryDataController@queryDataAction'
));

/* Request Data*/	
	/* Request Data*/
Route::get('/reqdata', array(
	'before'=>'auth',
	'as' => 'reqdata_frm',
	'uses' => 'RequestDataController@reqFrmAction'
));

Route::get('/reqdata/databyagency/{agencyid}', array(
	'before'=>'auth',
	'as' => 'reqdata_agencydata',
	'uses' => 'RequestDataController@getDataByAgencyId'
));

Route::post('/reqdata/send', array(
	'before'=>'auth',
	'as' => 'reqdata_send',
	'uses' => 'RequestDataController@reqSaveAction'
));

Route::get('/reqdata/reqlist', array(
	'before'=>'auth',
	'as' => 'reqdata_reqlist',
	'uses' => 'RequestDataController@reqListAction'
));

Route::get('/reqdata/reqlist/edit/{id}', array(
	'before'=>'auth',
	'as' => 'reqdata_reqlistedit',
	'uses' => 'RequestDataController@reqListEditAction'
));

Route::post('/reqdata/reqlist/save/{id}', array(
	'before'=>'auth',
	'as' => 'reqdata_reqlistsave',
	'uses' => 'RequestDataController@reqListSaveAction'
));

Route::get('/req-search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'reqdata_reqlistsearch',
	'uses' => 'RequestDataController@reqListSearchAction'
));


	/* Result Request Data*/
Route::get('/reqdata/resultlist', array(
	'before'=>'auth',
	'as' => 'reqdata_resultlist',
	'uses' => 'RequestDataController@resultListAction'
));

Route::get('/reqdata/resultlist/download/{id}', array(
	'before'=>'auth',
	'as' => 'reqdata_resultdownload',
	'uses' => 'RequestDataController@resultRequestDownload'
));

Route::get('/reqdata/resultlist/search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'result_search',
	'uses' => 'RequestDataController@resultSearchAction'
));


/*Training Route Section */
Route::get('/training', array(
	'before'=>'auth',
	'as' => 'trining_list',
	'uses' => 'TrainingController@getAllTraining'
));

Route::get('/training/add', array(
	'before'=>'auth_superadmin',
	'as' => 'trining_add',
	'uses' => 'TrainingController@addTraining'
));

Route::post('/training/add/save/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'trining_save',
	'uses' => 'TrainingController@saveTraining'
));

Route::get('/training/edit/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'trining_edit',
	'uses' => 'TrainingController@editTraining'
));

Route::get('/training/del/{id}', array(
	'before'=>'auth_superadmin',
	'as' => 'trining_del',
	'uses' => 'TrainingController@delTraining'
));

Route::get('/training/user/list', array(
	'before'=>'auth',
	'as' => 'trining_userlist',
	'uses' => 'TrainingController@getListUserTraining'
));

Route::post('/training/user/save', array(
	'before'=>'auth',
	'as' => 'trining_usersave',
	'uses' => 'TrainingController@getSaveUserTraining'
));

Route::get('/training/num', array(
	'before'=>'auth',
	'as' => 'trining_num',
	'uses' => 'TrainingController@numCourse'
));

Route::get('/training/report/{id?}', array(
	'before'=>'auth',
	'as' => 'trining_report',
	'uses' => 'TrainingController@getReport'
));

Route::get('/training/man/report/{id?}/{flag?}/{type?}', array(
	'before'=>'auth',
	'as' => 'trining_manreport',
	'uses' => 'TrainingController@manReport'
));

Route::get('/training/role/report/{id?}/{flag?}/{type?}', array(
	'before'=>'auth',
	'as' => 'trining_rolereport',
	'uses' => 'TrainingController@roleReport'
));

Route::get('/training/date/report/{dtstart?}/{dtend?}/{flag?}/{type?}', array(
	'before'=>'auth',
	'as' => 'trining_datereport',
	'uses' => 'TrainingController@dateReport'
));

Route::get('/training/course/report/{keyword?}/{flag?}/{type?}', array(
	'before'=>'auth',
	'as' => 'trining_coursereport',
	'uses' => 'TrainingController@courseReport'
));

Route::get('/training-search/{keyword?}', array(
	'before'=>'auth',
	'as' => 'trainingsearch',
	'uses' => 'TrainingController@searchAction'
));

Route::post('/training/download', array(
	'before'=>'auth',
	'as' => 'training_download',
	'uses' => 'TrainingController@downloadFile'
));

//Help
Route::get('/help', array(
	'before'=>'auth',
	'as' => 'help',
	'uses' => 'HelpController@helpDocument'
));

Route::get('/functional', array(
	'before'=>'auth',
	'as' => 'help',
	'uses' => 'HelpController@functionalDocument'
));

Route::get('glossary', array(
	'before'=>'auth',
	'as' => 'glossary',
	'uses' => 'HelpController@glossary'
));

//Other
Route::get('/other', array(
	'before'=>'auth_superadmin',
	'as' => 'other',
	'uses' => 'OtherController@checklist'
));

Route::get('/other/proactive/commitment/{id?}', array(
	'before'=>'auth_superadmin',
	'as' => 'proac_commmitupload',
	'uses' => 'OtherController@proactiveCommitUpload'
));

//PDF Example download
Route::get('/pdf/download', function()
{
	$html = '<html><body>'
			. '<p>Put your html here, or generate it with your favourite '
			. 'templating system.</p>'
			. '</body></html>';
	return PDF::load($html, 'A4', 'portrait')->download('my_pdf');
});

//PDF Example show
Route::get('/pdf/show', function()
{
    $html = '<html><body>'
            . '<p>Put your html here, or generate it with your favourite '
            . 'templating system.</p>'
            . '</body></html>';
    return PDF::load($html, 'A4', 'portrait')->show();
});