<?php
require('../model/model_course.php');
require('../model/model_student.php');
session_start();

//create session student_list and course_list if not exist
if (
    !isset($_SESSION['student_list']) ||
    !isset($_SESSION['course_list'])
) {
    $_SESSION['student_list'] = array();
    $_SESSION['course_list'] = array();
}

#region Function

#region Create

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

function getStudentWithID($student_id){
    return $_SESSION['student_list'][$student_id];
}

function getAllCourses()
{
    return $_SESSION['course_list'];
}

function getCourseWithID($course_id){
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
