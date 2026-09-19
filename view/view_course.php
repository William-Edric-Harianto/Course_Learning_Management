<?php require('../controller/controller.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
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
                        <a class="inline-block p-4 text-blue-600 bg-white border border-b-0 border-gray-200 rounded-t-lg active" href="../view/view_course.php">Course List</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg" href="../view_add/view_add_course.php">New Course</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg" href="../view/view_enrollment.php">Enrollment List</a>
                    </li>
                </ul>
            </div>
            <div class="p-6">
                <h1 class="text-5xl my-[2rem] font-semibold">Courses</h1>
                <table class="w-full bg-white even:bg-gray-100 border-collapse">
                    <thead>
                        <tr class="bg-black text-white border-b">
                            <th scope="col" class="py-[1rem] px-[1rem]">No</th>
                            <th scope="col" class="py-[1rem] px-[8rem]">Name</th>
                            <th scope="col" class="py-[1rem] px-[6rem]">Description</th>
                            <th scope="col" class="py-[1rem] px-[7rem]">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $all_courses = getAllCourses();
                        foreach ($all_courses as $index => $course) {
                            $i++;
                        ?>
                            <tr>
                                <th class="py-[0.5rem]" scope="row"><?= $i ?></th>
                                <td class="py-[0.5rem]"><?= $course->name ?></td>
                                <td class="py-[0.5rem]"><?= $course->description ?></td>
                                <td class="py-[0.5rem]">
                                    <a href="../view_update/view_update_course.php?update_course_id=<?= $index ?>">
                                        <button class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600">Update</button>
                                    </a>
                                    <a href="../controller/controller.php?delete_course_id=<?= $index ?>">
                                        <button class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>