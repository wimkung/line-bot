 <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('hello', 'Controller@hello');
Route::get('welcome/hello','Controller@hello');

Route::get('check-connect', function() {
	if(DB::connection()->getDatabaseName()) { 
		return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
	} else {
		return 'Connection False !!';
	}
}); 

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function() {
	Route::get('/health', 'UserHealthController@index');
	Route::get('/health/{id}', 'UserHealthController@show');
	Route::get('/search/health', 'UserHealthController@search');

	Route::get('/food', 'UserFoodController@index');
	Route::get('/food/{id}', 'UserFoodController@show');
	Route::get('/search/food', 'UserFoodController@search');

	Route::get('/exercise', 'UserExerciseController@index');
	Route::get('/exercise/{id}', 'UserExerciseController@show');
	Route::get('/search/exercise', 'UserExerciseController@search');

	Route::get('/medicine', 'UserMedicineHerbController@index');
	Route::get('/medicine/{id}', 'UserMedicineHerbController@show');
	Route::get('/search/medicine', 'UserMedicineHerbController@search');

	Route::get('/dhamma', 'UserDhammaController@index');
	Route::get('/dhamma/{id}', 'UserDhammaController@show');
	Route::get('/search/dhamma', 'UserDhammaController@search');

	Route::get('/bmi', 'BmiController@index');
	Route::post('/bmi', 'BmiController@calculate');

	Route::get('/evaluation', 'EvaluationFormController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::prefix('admin')->group(function() {
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::resource('/health', 'AdminHealthController');
	// Route::get('/health/destroy/{id}', 'AdminHealthController@destroy');
	Route::get('/health/pic/{id}', 'AdminHealthPicController@showpic');
	Route::PUT('/health/editpic/{id}', 'AdminHealthPicController@update');
	Route::delete('/health/pic/destroy/{id}', 'AdminHealthPicController@destroy');

	Route::resource('/food', 'AdminFoodController');
	Route::get('/food/pic/{id}', 'AdminFoodPicController@showpic');
	Route::PUT('/food/editpic/{id}', 'AdminFoodPicController@update');
	Route::delete('/food/pic/destroy/{id}', 'AdminFoodPicController@destroy');

	Route::resource('/exercise', 'AdminExerciseController');
	Route::get('/exercise/pic/{id}', 'AdminExercisePicController@showpic');
	Route::PUT('/exercise/editpic/{id}', 'AdminExercisePicController@update');
	Route::delete('/exercise/pic/destroy/{id}', 'AdminExercisePicController@destroy');

	Route::resource('/medicine', 'AdminMedicineHerbController');
	Route::get('/medicine/pic/{id}', 'AdminMedicineHerbPicController@showpic');
	Route::PUT('/medicine/editpic/{id}', 'AdminMedicineHerbPicController@update');
	Route::delete('/medicine/pic/destroy/{id}', 'AdminMedicineHerbPicController@destroy');

	Route::resource('/dhamma', 'AdminDhammaController');
	Route::get('/dhamma/pic/{id}', 'AdminDhammaPicController@showpic');
	Route::PUT('/dhamma/editpic/{id}', 'AdminDhammaPicController@update');
	Route::delete('/dhamma/pic/destroy/{id}', 'AdminDhammaPicController@destroy');

	Route::get('/share', 'AdminShareController@index');
	Route::get('/share/{id}', 'AdminShareController@show');
	Route::delete('/share/destroy/{id}', 'AdminShareController@destroy');
	Route::get('/notify', 'AdminNotificationController@index');
	Route::delete('/notify/destroy/{id}', 'AdminNotificationController@destroy');
});

Route::prefix('member')->group(function() {
	Route::get('/health', 'MemberHealthController@index');
	Route::get('/health/{id}', 'MemberHealthController@show');
	Route::get('/search/health', 'MemberHealthController@search');

	Route::get('/food', 'MemberFoodController@index');
	Route::get('/food/{id}', 'MemberFoodController@show');
	Route::get('/search/food', 'MemberFoodController@search');

	Route::get('/exercise', 'MemberExerciseController@index');
	Route::get('/exercise/{id}', 'MemberExerciseController@show');
	Route::get('/search/exercise', 'MemberExerciseController@search');

	Route::get('/medicine', 'MemberMedicineHerbController@index');
	Route::get('/medicine/{id}', 'MemberMedicineHerbController@show');
	Route::get('/search/medicine', 'MemberMedicineHerbController@search');

	Route::get('/dhamma', 'MemberDhammaController@index');
	Route::get('/dhamma/{id}', 'MemberDhammaController@show');
	Route::get('/search/dhamma', 'MemberDhammaController@search');

	Route::get('/bmi', 'MemberBmiController@index');
	Route::post('/bmi', 'MemberBmiController@calculate');
	Route::resource('/share', 'MemberShareController');
	Route::get('/evaluation', 'MemberEvaluationFormController@index');

	Route::get('/stress/form', 'StressFormController@index');
	// Route::get('/stress/form/{id}', 'StressFormController@show');
	Route::post('/stress/form', 'StressFormController@calculate');

	Route::get('/depress/form', 'DepressFormController@index');
	Route::post('/depress/form', 'DepressFormController@calculate');

	Route::get('/knee/form', 'KneeFormController@index');
	Route::post('/knee/form', 'KneeFormController@calculate');

	Route::get('/adl/form', 'ADLFormController@index');
	Route::post('/adl/form', 'ADLFormController@calculate');

	Route::get('/preDMHT/form', 'PreDMHTFormController@index');
	Route::post('/preDMHT/form', 'PreDMHTFormController@calculate');

	Route::get('/history', 'HistoryFormController@history');

	Route::get('/notification', 'NotificationController@index');
	Route::post('/notification', 'NotificationController@notification');
});