<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Menu Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        :root {
            --primary: #5e35b1;
            --primary-light: #7e57c2;
            --primary-dark: #4527a0;
            --accent: #ff9800;
            --light-bg: #f5f0ff;
            --white: #ffffff;
            --text-dark: #333333;
            --text-light: #666666;
            --border: #dddddd;
            --success: #4caf50;
            --error: #f44336;
        }

        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f0f0f5;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .page-title {
            color: var(--primary);
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--accent);
            border-radius: 2px;
        }

        .sub-title {
            color: var(--text-light);
            font-size: 16px;
        }

        .card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .filter-form {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 25px;
            padding: 20px;
            background: var(--light-bg);
            border-radius: 12px;
            border-left: 4px solid var(--primary);
        }

        .form-group {
            display: flex;
            align-items: center;
            flex: 1;
            min-width: 250px;
        }

        .form-label {
            margin-right: 15px;
            font-weight: 600;
            color: var(--primary);
        }

        .form-label i {
            margin-right: 8px;
        }

        select,
        input[type="date"],
        input[type="text"],
        input[type="number"] {
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            min-width: 200px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        select:focus,
        input[type="date"]:focus,
        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(94, 53, 177, 0.2);
        }

        .select2-container--default .select2-selection--multiple {
            padding: 8px;
            min-height: 120px;
            border-color: var(--border);
            border-radius: 8px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(94, 53, 177, 0.2);
        }

        .section-title {
            color: var(--primary);
            font-size: 22px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-bg);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 2px;
            background-color: var(--primary);
        }

        .menu-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .menu-table th {
            background-color: var(--primary);
            color: var(--white);
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        .menu-table td {
            padding: 15px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        .menu-table tr:nth-child(even) {
            background-color: var(--light-bg);
        }

        .menu-table tr:last-child td {
            border-bottom: none;
        }

        .menu-table .meal-type {
            font-weight: 600;
            color: var(--primary-dark);
            font-size: 16px;
        }

        .menu-table .food-items {
            color: var(--text-dark);
        }

        .menu-table .nutrition {
            color: var(--primary);
            font-weight: 600;
            text-align: right;
        }

        .no-menu {
            text-align: center;
            padding: 40px 20px;
            font-style: italic;
            color: var(--text-light);
            background: var(--light-bg);
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .management-section {
            background: var(--light-bg);
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            border-left: 4px solid var(--primary);
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
            align-items: flex-end;
        }

        .form-control {
            flex: 1;
            min-width: 250px;
        }

        .form-control label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .form-control select,
        .form-control input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control select[multiple] {
            height: 150px;
            padding: 10px;
        }

        .btn {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 150px;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(94, 53, 177, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        .divider {
            height: 2px;
            background-color: var(--border);
            margin: 40px 0;
            position: relative;
        }

        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            background-color: var(--white);
            border: 2px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .food-item-form {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .food-details {
            display: flex;
            gap: 10px;
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            align-items: center;
        }

        .nutrition-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .nutrient-field {
            flex: 1;
            min-width: 120px;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            margin-right: 5px;
            color: white;
            background-color: var(--primary-light);
        }

        .meal-badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            margin-right: 10px;
        }

        .breakfast-badge {
            background-color: #ff9800;
            color: white;
        }

        .lunch-badge {
            background-color: #4caf50;
            color: white;
        }

        .dinner-badge {
            background-color: #2196f3;
            color: white;
        }

        .food-item-chip {
            display: inline-flex;
            align-items: center;
            background-color: var(--light-bg);
            border-radius: 16px;
            padding: 5px 12px;
            margin: 3px;
            font-size: 14px;
            color: var(--primary-dark);
            font-weight: 500;
        }

        .food-item-chip .nutrition {
            margin-left: 5px;
            font-size: 12px;
            color: var(--text-light);
        }

        @media (max-width: 768px) {
            .form-group,
            .form-control {
                min-width: 100%;
            }
            
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn {
                width: 100%;
            }
            
            .menu-table th,
            .menu-table td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="page-title">Mess Menu Management</h1>
            <p class="sub-title">Plan and organize your mess meals with ease</p>
        </div>
        
        <div class="card">
            <!-- Filter Form -->
            <form class="filter-form" method="get" action="<?php echo base_url('vendor_menu'); ?>">
                <div class="form-group">
                    <label class="form-label"><i class="far fa-calendar-alt"></i> Date:</label>
                    <input 
                        type="date" 
                        name="date" 
                        value="<?php echo $selected_date; ?>" 
                        onchange="this.form.submit();"
                    >
                </div>
                
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-utensils"></i> Mess:</label>
                    <select name="mess_id" onchange="this.form.submit();">
                        <?php foreach ($messes as $mess): ?>
                            <option value="<?php echo $mess['mess_id']; ?>" <?php echo ($mess['mess_id'] == $selected_mess_id) ? 'selected' : ''; ?>>
                                <?php echo $mess['mess_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
            
            <!-- Current Menu Display -->
            <div class="menu-display">
                <h2 class="section-title">
                    <i class="fas fa-clipboard-list"></i> 
                    Menu for <?php echo date('F d, Y', strtotime($selected_date)); ?>
                </h2>
                
                <?php if (empty($menu_items)): ?>
                    <div class="no-menu">
                        <i class="fas fa-empty-plate" style="font-size: 48px; color: #ccc; display: block; margin-bottom: 15px;"></i>
                        No menu available for this date and mess. Please add items below.
                    </div>
                <?php else: ?>
                    <table class="menu-table">
                        <thead>
                            <tr>
                                <th width="15%"><i class="fas fa-clock"></i> Meal</th>
                                <th width="65%"><i class="fas fa-hamburger"></i> Food Items</th>
                                <th width="20%"><i class="fas fa-fire-alt"></i> Nutrition</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $grouped_menu = [];
                            foreach ($menu_items as $item) {
                                if (!isset($grouped_menu[$item['meal_type']])) {
                                    $grouped_menu[$item['meal_type']] = [
                                        'items' => [],
                                        'total_nutrition' => 0,
                                        'item_details' => []
                                    ];
                                }
                                $grouped_menu[$item['meal_type']]['items'][] = $item['food'];
                                $grouped_menu[$item['meal_type']]['total_nutrition'] += (int)$item['nutrition'];
                                $grouped_menu[$item['meal_type']]['item_details'][] = [
                                    'name' => $item['food'],
                                    'nutrition' => $item['nutrition']
                                ];
                            }
                            foreach ($grouped_menu as $meal_type => $data): 
                                $badge_class = strtolower($meal_type) . '-badge';
                            ?>
                                <tr>
                                    <td class="meal-type">
                                        <span class="meal-badge <?php echo $badge_class; ?>"><?php echo $meal_type; ?></span>
                                    </td>
                                    <td class="food-items">
                                        <?php foreach ($data['item_details'] as $food): ?>
                                            <span class="food-item-chip">
                                                <?php echo $food['name']; ?>
                                                <span class="nutrition">(<?php echo $food['nutrition']; ?> Kcal)</span>
                                            </span>
                                        <?php endforeach; ?>
                                    </td>
                                    <td class="nutrition">
                                        <i class="fas fa-fire-alt"></i> <?php echo number_format($data['total_nutrition']); ?> Kcal
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            
            <!-- Menu Management Section -->
            <div class="management-section">
                <h2 class="section-title"><i class="fas fa-edit"></i> Update Menu</h2>
                <form action="<?php echo base_url('vendor_menu/update_menu'); ?>" method="post" id="updateMenuForm">
                    <input type="hidden" name="date" value="<?php echo $selected_date; ?>">
                    <input type="hidden" name="mess_id" value="<?php echo $selected_mess_id; ?>">
                    
                    <div class="form-row">
                        <div class="form-control">
                            <label for="meal_type"><i class="fas fa-utensils"></i> Meal Type:</label>
                            <select name="meal_type" id="meal_type" required>
                                <option value="">Select Meal Type</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                            </select>
                        </div>
                        
                        <div class="form-control">
                            <label for="food_items"><i class="fas fa-apple-alt"></i> Select Food Items:</label>
                            <select name="food_ids[]" id="food_items" class="select2-multiple" multiple required>
                                <?php foreach ($menu_items_all as $item): ?>
                                    <option value="<?php echo $item['food_id']; ?>">
                                        <?php echo $item['food']; ?> (<?php echo $item['nutrition']; ?> Kcal)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div>
                            <button type="submit" class="btn">
                                <i class="fas fa-save"></i> Update Menu
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="divider"></div>
            
            <!-- Add New Food Item Section with Nutrition Fields -->
            <div class="management-section">
                <h2 class="section-title"><i class="fas fa-plus-circle"></i> Add New Food Item</h2>
                <div class="food-item-form">
                    <form action="<?php echo base_url('vendor_menu/add_food'); ?>" method="post" id="addFoodForm">
                        <div class="form-row">
                            <div class="form-control">
                                <label for="food_name"><i class="fas fa-hamburger"></i> Food Name:</label>
                                <input type="text" name="food_name" id="food_name" required placeholder="Enter food name...">
                            </div>
                            
                            <div class="form-control">
                                <label for="nutrition"><i class="fas fa-fire-alt"></i> Calories:</label>
                                <input type="number" name="nutrition" id="nutrition" required min="0" placeholder="Calories (Kcal)">
                            </div>
                        </div>
                        
                        <div class="form-row nutrition-info">
                            <div class="nutrient-field">
                                <label for="proteins"><i class="fas fa-dumbbell"></i> Proteins (g):</label>
                                <input type="number" name="proteins" id="proteins" min="0" step="0.1" placeholder="Proteins in grams">
                            </div>
                            
                            <div class="nutrient-field">
                                <label for="carbs"><i class="fas fa-bread-slice"></i> Carbs (g):</label>
                                <input type="number" name="carbs" id="carbs" min="0" step="0.1" placeholder="Carbohydrates in grams">
                            </div>
                            
                            <div class="nutrient-field">
                                <label for="fats"><i class="fas fa-cheese"></i> Fats (g):</label>
                                <input type="number" name="fats" id="fats" min="0" step="0.1" placeholder="Fats in grams">
                            </div>
                            
                            <div class="nutrient-field">
                                <label for="fiber"><i class="fas fa-seedling"></i> Fiber (g):</label>
                                <input type="number" name="fiber" id="fiber" min="0" step="0.1" placeholder="Dietary fiber in grams">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div>
                                <button type="submit" class="btn">
                                    <i class="fas fa-plus"></i> Add Food Item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 for better multiple selection
            $('.select2-multiple').select2({
                placeholder: 'Select food items...',
                allowClear: true,
                closeOnSelect: false,
                templateResult: formatFoodItem,
                templateSelection: formatFoodItem
            });
            
            // Format food items in dropdown
            function formatFoodItem(food) {
                if (!food.id) return food.text;
                
                var $container = $(
                    '<div class="food-details">' +
                        '<span>' + food.text + '</span>' +
                    '</div>'
                );
                
                return $container;
            }
            
            // Preview total nutrition when food items are selected
            $('#food_items').on('change', function() {
                updateNutritionSummary();
            });
            
            function updateNutritionSummary() {
                // This would typically use AJAX to get nutrition values of selected items
                // and show a summary, but for demonstration we'll just count selections
                var selectedCount = $('#food_items').select2('data').length;
                if (selectedCount > 0) {
                    // Display some feedback about selections
                    console.log(selectedCount + ' items selected');
                }
            }
        });
    </script>
</body>
</html>