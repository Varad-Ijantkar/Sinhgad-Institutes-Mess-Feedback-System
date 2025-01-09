<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Credential</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-[60vh] px-4">
        <div class="bg-white border border-purple-300 rounded-lg p-6 w-full max-w-lg md:max-w-md" style="box-shadow: 0 4px 6px rgba(139, 92, 246, 0.5);">
            <h2 class="text-center text-2xl font-bold mb-6 text-violet-950">Get Credential</h2>

            <!-- Flash Messages -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4">
				  <?= $this->session->flashdata('success') ?>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="text-red-700 mt-4 rounded mb-4">
				⚠️ <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('getcredentials/send_credentials'); ?>">
                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-sm  text-gray-700 mb-2 font-medium">Enter your registered email</label>
                    <input type="email" class="w-full border border-purple-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-violet-700" id="email" name="email" placeholder="example@domain.com" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-violet-900 text-white py-2 rounded-lg hover:bg-violet-700 transition duration-300">
                    Send Credential
                </button>
            </form>
        </div>
    </div>

</body>

</html>
