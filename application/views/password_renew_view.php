<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Renewal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white border border-purple-300 rounded-lg p-6 w-full max-w-lg md:max-w-md" style="box-shadow: 0 4px 6px rgba(139, 92, 246, 0.5);">
            <h2 class="text-center text-2xl font-bold mb-6 text-violet-950">Renew Your Password</h2>

        
            <?php if ($this->session->flashdata('error')): ?>
                <div class="text-red-700   mb-4">
				⚠️ <?= $this->session->flashdata('error') ?> 
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="  text-green-700 p-4 mb-4">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('passwordrenew/update_password'); ?>">
           
                <div class="mb-4">
                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                    <input type="password" class="w-full border border-purple-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-700" id="new_password" name="new_password" required>
                </div>

          
                <div class="">
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 ">Confirm Password</label>
                    <input type="password" class="w-full border border-purple-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-700" id="confirm_password" name="confirm_password" required>
                </div>

             
                <div class="mb-4 flex items-center gap-2">
                    <input class="accent-violet-700" type="checkbox" id="show_password" class="mr-2">
                    <label for="show_password" class="mt-2 text-sm font-medium text-gray-700">Show Password</label>
                </div>

                <button type="submit" class="w-full bg-violet-900 text-white py-2 rounded-lg hover:bg-violet-700 transition duration-300">
                    Update Password
                </button>
            </form>
        </div>
    </div>

    <script>
        const showPasswordCheckbox = document.getElementById('show_password');
        const newPasswordField = document.getElementById('new_password');
        const confirmPasswordField = document.getElementById('confirm_password');

        showPasswordCheckbox.addEventListener('change', () => {
            const type = showPasswordCheckbox.checked ? 'text' : 'password';
            newPasswordField.type = type;
            confirmPasswordField.type = type;
        });
    </script>

</body>

</html>
