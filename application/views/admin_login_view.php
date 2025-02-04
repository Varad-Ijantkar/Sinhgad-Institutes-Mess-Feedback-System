<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-grey-100">

    <div class="flex flex-col items-center justify-center gap-0 min-h-[78vh]">

        <div class="bg-white border border-purple-300 rounded-lg p-4 max-w-md w-1/4" style="box-shadow: 0 4px 6px rgba(139, 92, 246, 0.5);">
            <h2 class="text-center text-2xl font-bold mb-3 text-violet-950">Admin Login</h2>

            <form action="<?php echo base_url('Admin_Login/login'); ?>" method="POST">

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full border border-purple-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-300"
                        placeholder="Enter Sinhgad Email"
                        value="<?php echo set_value('email'); ?>" required pattern=".+@sinhgad\.edu">
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-purple-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-300"
                        placeholder="Enter Password" required>
                </div>


                <!-- Error Message -->
                <?php if (!empty($login_error)): ?>
                    <div class="text-sm text-red-700">
                        ⚠️ <?php echo $login_error; ?>
                    </div>
                <?php endif; ?>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-violet-900 text-white py-2 rounded-lg hover:bg-violet-700 transition mt-3">
                    Login
                </button>
            </form>

            <!-- Links -->
            <div class="text-center mt-3">
                <a href="<?php echo base_url('login'); ?>" class="text-blue-800 hover:underline hover:text-blue-600"> Student?</a>
            </div>
            <div class="text-center mt-1">
                <a href="<?php echo base_url('getcredentials'); ?>" class="text-blue-800 hover:underline hover:text-blue-600">Get Credentials</a>
            </div>
        </div>
    </div>

</body>

</html>
