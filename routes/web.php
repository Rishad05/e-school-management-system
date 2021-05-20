<?php

use App\Http\Controllers\Backend\AssignmentController;
use App\Http\Controllers\Backend\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\enrollingCourseList;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\LessonAddController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\SellReportController;
use App\Http\Controllers\Backend\SubmittedController;
use App\Http\Controllers\Frontend\EnrollingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\TopicController;

Route::group(['prefix' => 'student'], function (){

    Route::group(['middleware'=>'student-auth'],function(){
        Route::get('/enroll/course/{id}',[EnrollingController::class, 'enrollCourse'])->name('enroll.course');
        // Route::get('/enroll/course/book/{id}',[EnrollingController::class, 'create'])->name('buy.course');
        Route::get('/studentViewLesson/{id}', [StudentController::class, 'studentViewLesson'])->name('studentViewLesson');
        Route::get('/studentViewTopic/{id}', [StudentController::class, 'studentViewTopic'])->name('studentViewTopic');
        Route::get('/studentViewAssignment/{id}', [StudentController::class, 'studentViewAssignment'])->name('studentViewAssignment');
        Route::get('/submitAssignment/{id}', [CourseController::class, 'submitAssignment'])->name('submitAssignment');
        Route::post('/submitAssignment/{id}', [CourseController::class, 'submitCreate'])->name('submitAssignment.create');

        Route::get('/buyCourse/{id}',[EnrollingController::class, 'buyCourse'])->name('buyCourse');
        Route::post('/confirmBuyCourse',[EnrollingController::class, 'confirmBuyCourse'])->name('confirmBuyCourse');
    });


});
Route::get('/',[HomeController::class,'home'])->name('homepage');
Route::get('/login-registration',[UserController::class, 'userLoginRegistration'])->name('login.registration.form');
Route::post('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/userLogin',[UserController::class, 'userLogin'])->name('userLogin');
Route::get('/userLogout',[UserController::class,'userLogout'])->name('userLogout');
Route::get('/userProfile', [StudentController::class, 'userProfile'])->name('userProfile');



Route::get('/viewAllCourses',[HomeController::class, 'viewAllCourse'])->name('viewAllCourse');




// Admin Panel
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/accessLogin',[LoginController::class,'accessLogin'])->name('accessLogin.create');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware'=>'admin-auth'],function(){

    Route::get('/courses',[CourseController::class, 'course'] )-> name('course');
    Route::post('/courses',[CourseController::class, 'create'] )-> name('course.create');
    Route::get('/courses/delete/{id}',[CourseController::class,'delete'])->name('course.delete');
    Route::get('/courses/edit/{id}',[CourseController::class,'editCourse'])->name('course.edit');
    Route::put('/courses/update/{id}',[CourseController::class,'updateCourse'])->name('course.update');
    Route::get('courses/viewLesson/{id}',[CourseController::class, 'viewLesson'])->name('viewLesson');
    Route::get('/courses/{id}/{status}', [CourseController::class, 'completedUpdate'])->name('completedUpdate');
    Route::get('/enrollCourseList',[enrollingCourseList::class, 'enrollingCourseList'])->name('enrollingCourseList');
    Route::get('/enrollCourseList/{id}/{status}', [enrollingCourseList::class, 'statusUpdate'])->name('statusUpdate');
    Route::get('/viewAssignment/{id}',[CourseController::class, 'viewAssignment'])->name('viewAssignment');
    Route::get('/submittedAssignment',[SubmittedController::class, 'submittedAssignment'])->name('submittedAssignment');





    Route::get('/dashboard', [DashboardController::class, 'dashboard'] )-> name('dashboard');



    Route::get('/studentList', [StudentController::class, 'student'] )-> name('student');
    Route::post('/studentList', [StudentController::class, 'create'] )-> name('student.create');

    Route::get('/authorList', [AuthorController::class, 'author'] )-> name('author');
    Route::post('/authorList', [AuthorController::class, 'create'] )-> name('author.create');
    Route::get('/author/delete/{id}',[AuthorController::class,'delete'])->name('author.delete');




    Route::get('/topicList',[TopicController::class, 'topic'])-> name('topic');
    Route::post('/topicList', [TopicController::class, 'create'] )-> name('topic.create');
    Route::get('/topic/delete/{id}',[TopicController::class,'delete'])->name('topic.delete');





    Route::get('/lessonsAdd', [LessonAddController::class, 'lesson'] )-> name('lesson');
    Route::post('/lessonsAdd', [LessonAddController::class, 'create'])->name('lesson.create');
    Route::get('lesson/viewTopic/{id}',[LessonAddController::class, 'viewTopic'])->name('view.topic');
    Route::get('/lesson/delete/{id}',[LessonAddController::class,'delete'])->name('lesson.delete');


    Route::get('/assignmentAdd', [AssignmentController::class, 'assignment'])->name('assignment');
    Route::post('/assignmentAdd', [AssignmentController::class, 'create'])->name('assignment.create');
    Route::get('/assignment/delete/{id}',[AssignmentController::class,'delete'])->name('assignment.delete');





    Route::get('/Sell-Report', [SellReportController::class, 'report'])-> name('report');
});


});



