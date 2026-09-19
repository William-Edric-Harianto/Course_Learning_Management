<?php require('../controller/controller.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="container py-[1rem] px-[3rem]">
        <div class="bg-white border border-gray-200 rounded-lg shadow text-center">
            <div class="bg-gray-50 border-b border-gray-200 px-4 pt-3 rounded-t-lg">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="mr-2">
                        <a class="inline-block p-4 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg" href="../view/view_student.php">Student List</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg" href="../view_add/view_add_student.php">New Student</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg" href="../view/view_course.php">Course List</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg" href="../view_add/view_add_course.php">New Course</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 text-blue-600 bg-white border border-b-0 border-gray-200 rounded-t-lg active" href="../view/view_enrollment.php">Enrollment List</a>
                    </li>
                </ul>
            </div>
            <form method="POST" action="../controller/controller.php">
                <div class="p-6">
                    <h1 class="text-7xl my-[2rem] font-semibold">Enrollment List</h1>
                    <div class="p-6">
                        <button name="button_update_enrollment" type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update Enrollment</button>
                    </div>
                    <?php
                    $i = 0;
                    $all_courses = getAllCourses();
                    foreach ($all_courses as $course_index => $course) {
                        $i++;
                    ?>
                        <div class="bg-white border border-gray-200 rounded-lg shadow text-center p-6">
                            <h2 class="text-5xl my-[1rem] font-semibold"><?= $course->name ?></h2>
                            <p class="text-1xl my-[1rem] font-normal">Amount of enrolled enrolled_list: <?= count($course->enrolled_list ?? []) ?></p> <!-- kalau null jadi 0 basically -->
                            <table class="w-full bg-white even:bg-gray-100 border-collapse">
                                <thead>
                                    <tr class="bg-black text-white border-b">
                                        <th scope="col" class="py-[1rem] px-[1rem]">No</th>
                                        <th scope="col" class="py-[1rem] px-[8rem]">Username</th>
                                        <th scope="col" class="py-[1rem] px-[6rem]">Phone</th>
                                        <th scope="col" class="py-[1rem] px-[6rem]">Email</th>
                                        <th scope="col" class="py-[1rem] px-[7rem]">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $all_enrolled_list = getAllStudents();
                                    foreach ($all_enrolled_list as $student_index => $student) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <th class="py-[0.5rem]" scope="row"><?= $i ?></th>
                                            <td class="py-[0.5rem]"><?= $student->username ?></td>
                                            <td class="py-[0.5rem]"><?= $student->phone ?></td>
                                            <td class="py-[0.5rem]"><?= $student->email ?></td>
                                            <td class="py-[0.5rem]">
                                                <?php if (in_array($student, $course->enrolled_list)) //kalau student sudah ada
                                                {
                                                ?><!--sudah dicentang-->
                                                    <input type="checkbox" name="course=<?= $course_index ?>,student=<?= $student_index ?>" checked>
                                                <?php
                                                } else {
                                                ?><!--enggak dicentang-->
                                                    <input type="checkbox" name="course=<?= $course_index ?>,student=<?= $student_index ?>">
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>

</body>

</html>