<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$page_title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        :root {
            --primary: #3D215A;
            --primary-light: #5e35b1;
            --primary-dark: #2a1740;
            --primary-transparent: rgba(61, 33, 90, 0.05);
            --accent: #9c64e3;
            --white: #ffffff;
            --light-gray: #f8f5fd;
            --mid-gray: #e6e0f0;
            --text-dark: #222222;
            --text-medium: #555555;
            --text-light: #777777;
            --shadow-sm: 0 2px 8px rgba(61, 33, 90, 0.1);
            --shadow-md: 0 4px 12px rgba(61, 33, 90, 0.15);
            --shadow-lg: 0 8px 24px rgba(61, 33, 90, 0.18);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --transition: all 0.3s ease;
        }

        .page-container {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            line-height: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin-top: 8%;
        }

        .content {
            flex: 1;
            padding: 2rem 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-title {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--primary);
            font-weight: 600;
            font-size: 1.5rem;
        }

        .menu-card {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            position: relative;
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 100%);
        }

        .card-header {
            padding: 2rem;
            text-align: center;
            background-image: radial-gradient(circle at top right, var(--primary-transparent), transparent 70%);
        }

        .menu-title {
            color: var(--primary);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .menu-subtitle {
            color: var(--text-light);
            font-weight: 400;
            font-size: 1rem;
            opacity: 0.8;
        }

        .card-body {
            padding: 1.5rem 2rem 2.5rem;
        }

        .form-container {
            background-color: var(--light-gray);
            border-radius: var(--radius-md);
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--primary);
            font-size: 0.9rem;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            width: 100%;
            border: 2px solid var(--mid-gray);
            border-radius: var(--radius-sm);
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--white);
            color: var(--text-dark);
            font-family: 'Poppins', sans-serif;
        }

        select.form-control {
            width: 100%;
            text-overflow: ellipsis;
            padding-right: 2.5rem;
        }

        select.form-control option {
            padding: 0.5rem;
            white-space: normal;
            word-wrap: break-word;
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(61, 33, 90, 0.1);
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            pointer-events: none;
        }

        .menu-table-container {
            overflow-x: auto;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
        }

        .menu-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: var(--white);
        }

        .menu-table th {
            background-color: var(--primary);
            color: var(--white);
            text-align: left;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            border-bottom: 3px solid rgba(255, 255, 255, 0.1);
        }

        .menu-table th:first-child {
            border-top-left-radius: var(--radius-md);
        }

        .menu-table th:last-child {
            border-top-right-radius: var(--radius-md);
        }

        .menu-table td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--mid-gray);
            font-size: 0.95rem;
        }

        .menu-table tr:last-child td {
            border-bottom: none;
        }

        .menu-table tr:last-child td:first-child {
            border-bottom-left-radius: var(--radius-md);
        }

        .menu-table tr:last-child td:last-child {
            border-bottom-right-radius: var(--radius-md);
        }

        .menu-table tr:nth-child(even) {
            background-color: var(--light-gray);
        }

        .meal-type {
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            line-height: 2;
        }

        .meal-icon {
            font-size: 1.2rem;
        }

        .menu-items {
            color: var(--text-medium);
            line-height: 1.7;
        }

        .nutrition {
            text-align: right;
            font-weight: 600;
            color: var(--primary);
            white-space: nowrap;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .nutrition-badge {
            background-color: rgba(61, 33, 90, 0.1);
            padding: 0.4rem 0.75rem;
            border-radius: 100px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .empty-menu {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--text-light);
            font-style: italic;
        }

        .card-footer {
            padding: 1.5rem 2rem;
            background-color: var(--primary-transparent);
            display: flex;
            justify-content: center;
            border-top: 1px solid var(--mid-gray);
        }

        .footer-text {
            color: var(--text-medium);
            font-size: 0.85rem;
            text-align: center;
            max-width: 600px;
        }

        @media (max-width: 768px) {
            .menu-card {
                margin-top: 15%;
            }
            .menu-title {
                font-size: 1.75rem;
            }
            .form-group {
                min-width: 100%;
            }
            .card-header, .card-body, .card-footer {
                padding: 1.5rem 1.25rem;
            }
            .menu-table th, .menu-table td {
                padding: 1rem;
            }
            .menu-table {
                width: 700px;
            }
        }

        @media (max-width: 480px) {
            .menu-title {
                font-size: 1.5rem;
            }
            .form-container {
                padding: 1.25rem 1rem;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .menu-card {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body>
<div class="page-container">
    <div class="content">
        <div class="container">
            <div class="menu-card">
                <div class="card-header">
                    <h2 class="menu-title">Student Dining Menu</h2>
                    <p class="menu-subtitle">Nourishing your academic journey</p>
                </div>

                <div class="card-body">
                    <div class="form-container">
                        <form method="get" id="menuForm" action="<?php echo site_url('mess_menu'); ?>">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Select Date</label>
                                    <div class="input-wrapper">
                                        <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($selected_date); ?>" onchange="this.form.submit();">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Select Mess</label>
                                    <div class="input-wrapper">
                                        <select class="form-control" name="mess_id" onchange="this.form.submit();">
                                            <?php foreach ($messes as $mess): ?>
                                                <option value="<?php echo htmlspecialchars($mess['mess_id']); ?>" <?php echo $mess['mess_id'] == $selected_mess_id ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($mess['mess_name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <i class="fas fa-utensils input-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="menu-table-container">
                        <table class="menu-table">
                            <thead>
                            <tr>
                                <th width="15%">Meal</th>
                                <th width="65%">Menu Items</th>
                                <th width="20%">Nutrition</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($menu_items)) {
                                $meals = [
                                    'Breakfast' => ['icon' => 'fa-mug-hot'],
                                    'Lunch' => ['icon' => 'fa-sun'],
                                    'Dinner' => ['icon' => 'fa-moon']
                                ];

                                // Group menu items by meal type
                                $meal_items = [];
                                foreach ($menu_items as $item) {
                                    $meal_type = $item['meal_type'];
                                    if (!isset($meal_items[$meal_type])) {
                                        $meal_items[$meal_type] = [];
                                    }
                                    $meal_items[$meal_type][] = [
                                        'food' => $item['food'],
                                        'nutrition' => $item['nutrition']
                                    ];
                                }

                                // Display meals
                                foreach ($meals as $meal_type => $meal_data) {
                                    $items = $meal_items[$meal_type] ?? [];
                                    if (!empty($items)) {
                                        $food_list = implode(', ', array_map(function($item) {
                                            return $item['food'];
                                        }, $items));
                                        $total_nutrition = array_sum(array_map(function($item) {
                                            return $item['nutrition'] ?? 0;
                                        }, $items));

                                        echo "<tr>";
                                        echo "<td class='meal-type'><i class='fas {$meal_data['icon']} meal-icon'></i> $meal_type</td>";
                                        echo "<td class='menu-items'>$food_list</td>";
                                        echo "<td class='nutrition'><span class='nutrition-badge'><i class='fas fa-fire-alt'></i> $total_nutrition Kcal</span></td>";
                                        echo "</tr>";
                                    } else {
                                        echo "<tr>";
                                        echo "<td class='meal-type'><i class='fas {$meal_data['icon']} meal-icon'></i> $meal_type</td>";
                                        echo "<td class='menu-items'>No items scheduled</td>";
                                        echo "<td class='nutrition'><span class='nutrition-badge'><i class='fas fa-fire-alt'></i> 0 Kcal</span></td>";
                                        echo "</tr>";
                                    }
                                }
                            } else {
                                echo "<tr><td colspan='3' class='empty-menu'><i class='fas fa-info-circle'></i> No menu available for this date and dining facility.</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <p class="footer-text">Our menus are carefully crafted to provide a balanced and nutritious dining experience. Menu items may change based on seasonal availability.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.querySelector('input[type="date"]');
        if (!dateInput.value) {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            dateInput.value = `${yyyy}-${mm}-${dd}`;
        }
    });
</script>
</body>
</html>