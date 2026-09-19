<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
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
                        <a class="inline-block p-4 text-blue-600 bg-white border border-b-0 border-gray-200 rounded-t-lg active" href="../view_add/view_add_course.php">New Course</a>
                    </li>
                    <li class="mr-2">
                        <a class="inline-block p-4 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg" href="../view/view_enrollment.php">Enrollment List</a>
                    </li>
                </ul>
            </div>
            <div class="p-6 px-50">
                <h1 class="text-5xl my-[1rem] font-semibold">New Course</h1>
                <form method="POST" action="../controller/controller.php">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-700" for="inputName">Name</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="inputName" placeholder="example: Intro to Javanese Language">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-700" for="inputDescription">Description</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" name="inputDescription" placeholder="example: the Ha, Na, and the Ca, Ra , Kas">
                    </div>
                    <button name="button_create_course" type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create New Course</button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>