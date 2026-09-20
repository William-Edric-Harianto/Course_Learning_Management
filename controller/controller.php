<?php

#region preset
require('../model/model_course.php');
require('../model/model_student.php');

//uncomment kalau mau reset session
// session_start();
// $_SESSION = array(); //empty session
// session_destroy();

session_start();

//create session student_list and course_list if not exist
if (
    !isset($_SESSION['student_list']) ||
    !isset($_SESSION['course_list'])
) {
    $_SESSION['student_list'] = array();
    $_SESSION['course_list'] = array();
    createDummyData();
}

#endregion

#region Function

#region Create

function createDummyData()
{
    //harus bikin student dulu karena nanti array course bakal diisi
    //bikin 5 student 3 course aja

    //bikin student
    $budi_student = new model_student('budi_cepat-01', '123-555-6767', 'buanter@ishow.speed');
    $john_student = new model_student('John turn us', '999-555-9999', 'engineer@abble.co');
    $gaben_student = new model_student('Gaben^New3ll', '123-555-1234', 'owner@falve.com');
    $siska_student = new model_student('siska', '031-555-1234', 'siskaIni@npc.id');
    $tono_student = new model_student('Ton0', '031-000-1234', 'Toh_noh@npc.id');
    //create course
    $ai_course = new model_course('Intro to Innovation in AI Era', 'Leverage AI!');
    $archery_course = new model_course('Advanced Archery', 'Special class by Olympic Champion');
    $crypto_course = new model_course('Intro to Crypto Market', 'Kepp Grinding');
    //enroll student
    array_push($ai_course->enrolled_list,
        $budi_student,
        $john_student,
        $gaben_student
    );
    array_push($archery_course->enrolled_list,
        $budi_student,
        $siska_student,
        $tono_student
    );
    array_push($crypto_course->enrolled_list,
        $budi_student,
        $tono_student
    );
    //masukin student
    array_push($_SESSION['student_list'],
        $budi_student,
        $john_student,
        $gaben_student,
        $siska_student,
        $tono_student
    );
    //masukin course
    array_push($_SESSION['course_list'],
        $ai_course,
        $archery_course,
        $crypto_course
    );
}

function createStudent()
{
    $username = $_POST['inputUsername'];
    $phone = $_POST['inputPhone'];
    $email = $_POST['inputEmail'];
    $student = new model_student($username, $phone, $email);
    array_push($_SESSION['student_list'], $student);
}

function createCourse()
{
    $name = $_POST['inputName'];
    $description = $_POST['inputDescription'];
    $course = new model_course($name, $description);
    array_push($_SESSION['course_list'], $course);
}

#endregion

#region Read

function getAllStudents()
{
    return $_SESSION['student_list'];
}

function getStudentWithID($student_id)
{
    return $_SESSION['student_list'][$student_id];
}

function getAllCourses()
{
    return $_SESSION['course_list'];
}

function getCourseWithID($course_id)
{
    return $_SESSION['course_list'][$course_id];
}

#endregion

#region Update

function updateStudent($student_id)
{
    $student = $_SESSION['student_list'][$student_id];
    $student->username = $_POST['inputUsername'];
    $student->phone = $_POST['inputPhone'];
    $student->email = $_POST['inputEmail'];
}

function updateCourse($course_id)
{
    $course = $_SESSION['course_list'][$course_id];
    $course->name = $_POST['inputName'];
    $course->description = $_POST['inputDescription'];
}

function updateCourseEnrollment() // ini penting lipp
{
    foreach (getAllCourses() as $course_index => $course) { //setiap course
        $student_in_course = array(); // sempty array
        foreach (getAllStudents() as $student_index => $student) { //setiap student
            if (isset($_POST["course={$course_index},student={$student_index}"])) { //kalau dicentang masuk, (sesuai format inputName)
                array_push($student_in_course, $student);
            }
        }
        $_SESSION['course_list'][$course_index]->enrolled_list = $student_in_course; //save array ke session
    }
}

#endregion

#region Delete

function deleteStudent($student_id)
{
    unset($_SESSION['student_list'][$student_id]);
}

function deleteCourse($course_id)
{
    unset($_SESSION['course_list'][$course_id]);
}

#endregion


#endregion

#region OnEvent

#region Create

if (isset($_POST['button_create_student'])) {
    createStudent();
    header('Location:../view/view_student.php');
}

if (isset($_POST['button_create_course'])) {
    createCourse();
    header('Location:../view/view_course.php');
}

#endregion

#region Update

if (isset($_POST['button_update_student'])) {
    updateStudent($_POST['student_id']);
    header('Location:../view/view_student.php');
}

if (isset($_POST['button_update_course'])) {
    updateCourse($_POST['course_id']);
    header('Location:../view/view_course.php');
}

if (isset($_POST['button_update_enrollment'])) {
    updateCourseEnrollment();
    header('Location:../view/view_enrollment.php');
}

#endregion

#region Delete

if (isset($_GET['delete_student_id'])) {
    deleteStudent($_GET['delete_student_id']);
    header('Location:../view/view_student.php');
}

if (isset($_GET['delete_course_id'])) {
    deleteCourse($_GET['delete_course_id']);
    header('Location:../view/view_course.php');
}

#endregion

#endregion
