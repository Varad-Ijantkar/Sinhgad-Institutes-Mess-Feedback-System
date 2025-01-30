<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Complaint Report</title>
</head>
<body class="bg-purple-100 font-sans text-gray-800">
  <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg">
    
    <!-- Header -->
    <header class="bg-purple-800 text-white p-4 md:p-6 text-center">
      <div class="flex flex-row justify-center relative items-center">
        <img src="https://cms.sinhgad.edu/SIM_Web_Assets/images/sinhgad-logo-colour-1.png" 
             alt="Sinhgad Technical Education Society, Pune" 
             class="w-12 h-12  md:w-20 md:h-20  left-0 absolute md:top-[-10px] top-0">
        <!-- Header Title -->
        <div class="flex flex-col justify-center items-center ml-2">
          <h4 class="hidden text-white text-sm md:text-base">Sinhgad Technical Education Society, Pune</h4>
          <h1 class="text-xl md:text-2xl font-bold">Mess Complaint Report</h1>
        </div>
      </div>
      <p class="text-xs md:text-sm mt-1 ml-2">Report ID: <?php echo $id; ?> | Generated: <?php echo $created_at; ?></p>
    </header>

    <!-- Status -->
    <div class="p-4 text-center">
      <div class="flex items-center justify-center bg-yellow-500 text-white py-2 px-4 rounded font-semibold">
        <span>Status: <strong><?php echo ucfirst($status); ?></strong></span>
      </div>
    </div>

    <!-- Main Content: Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 LG gap-4 p-4">
      <!-- Complainant Information -->
      <section class="bg-white rounded-lg  p-2">
        <h2 class="text-xl sm:text-2xl font-bold pb-2 mb-4 text-center text-purple-700">
          Complainant Information
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Email:</strong>
            <p class="text-gray-700 mt-1"><?php echo $email; ?></p>
          </div>
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Phone:</strong>
            <p class="text-gray-700 mt-1"><?php echo $phone; ?></p>
          </div>
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Campus:</strong>
            <p class="text-gray-700 mt-1"><?php echo $campus; ?></p>
          </div>
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">College:</strong>
            <p class="text-gray-700 mt-1"><?php echo $college; ?></p>
          </div>
        </div>
      </section>

      <!-- Incident Details -->
      <section class="bg-white rounded-lg  p-4">
        <h2 class="text-xl sm:text-2xl font-bold pb-2 mb-4 text-center text-purple-700">
          Incident Details
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Date:</strong>
            <p class="text-gray-700 mt-1"><?php echo $date; ?></p>
          </div>
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Meal Time:</strong>
            <p class="text-gray-700 mt-1"><?php echo $meal_time; ?></p>
          </div>
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Mess:</strong>
            <p class="text-gray-700 mt-1"><?php echo $mess; ?></p>
          </div>
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Category:</strong>
            <p class="text-gray-700 mt-1"><?php echo $category; ?></p>
          </div>
        </div>
      </section>

      <!-- Facility Assessment -->
      <section class="bg-white rounded-lg  p-4">
        <h2 class="text-xl sm:text-2xl font-bold pb-2 mb-4 text-center text-purple-700">
          Facility Assessment
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Hygiene:</strong>
            <p class="text-gray-700 mt-1"><?php echo $hygiene; ?></p>
          </div>
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Pest Control:</strong>
            <p class="text-gray-700 mt-1"><?php echo $pest_control; ?></p>
          </div>
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Safety Protocols:</strong>
            <p class="text-gray-700 mt-1"><?php echo $protocols; ?></p>
          </div>
        </div>
      </section>

      <!-- Complaint Description -->
      <section class="bg-white rounded-lg  p-4">
        <h2 class="text-xl sm:text-2xl font-bold pb-2 mb-4 text-center text-purple-700">
          Complaint Description
        </h2>
        <div class="space-y-4">
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Nature of Complaint:</strong>
            <p class="text-gray-700 mt-2"><?php echo nl2br($food_complaints); ?></p>
          </div>
          <div class="bg-purple-50 p-2 rounded-lg shadow hover:bg-purple-100 transition">
            <strong class="text-purple-800">Recommendations:</strong>
            <p class="text-gray-700 mt-2"><?php echo nl2br($suggestions); ?></p>
          </div>
        </div>
      </section>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-200 py-4 text-center text-sm">
      <p>Reference: <?php echo $id; ?></p>
      <strong>Sinhgad Institutes - Mess Complaint</strong>
    </footer>

    <!-- Print Button -->
    <div class="fixed bottom-4 right-4">
      <button 
        class="bg-purple-800 text-white py-2 px-4 rounded shadow-md hover:bg-purple-700 focus:outline-none focus:ring focus:ring-purple-300" 
        id="print-button">
        🖨️ Print
      </button>
    </div>
  </div>

  <script>
    document.getElementById("print-button").addEventListener("click", function () {
      window.print();
    });
  </script>
</body>

</html>